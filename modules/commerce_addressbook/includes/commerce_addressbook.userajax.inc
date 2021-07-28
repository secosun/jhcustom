<?php

/**
 * @file
 * Page callbacks and form callbacks for user addressbook pages.
 */

/**
 * Page callback for creating a customer profile of a given type.
 */
function commerce_addressbook_profile_createajax($account, $profile_type) {
  // Add the breadcrumb for the form's location.
  //commerce_addressbook_set_breadcrumb($account, $profile_type);

  $profile = commerce_customer_profile_new($profile_type, $account->uid);
  // The submit handler needs an indication that the profile was just added.
  // The regular is_new property gets unset after save is complete.
  $profile->_is_new = TRUE;
  module_load_include('inc', 'commerce_customer', 'includes/commerce_customer_profile.formsajax');
  $addressInfo=$GLOBALS['HTTP_RAW_POST_DATA'];
  $arr = json_decode($addressInfo, true);  
  $form_state = array();
  $form_state['values']['field_customerphone']['und']['0']['value'] = $arr['customerphone'];
  $form_state['values']['field_receievername']['und']['0']['value'] = $arr['receievername'];
  $form_state['values']['field_addressprofile']['und']['0']['value']=$arr['detail2'];
  $form_state['values']['field_detail']['und']['0']['value']=$arr['detail'];
  $form_state['values']['field_detail2']['und']['0']['value']=$arr['detail2'];
  $form_state['values']['province']=$arr['province'];
  $form_state['values']['city']=$arr['city'];
  $form_state['values']['shop']=$arr['shop'];
  $form_state['values']['name']=$account->name;
  $form_state['values']['status']="1";
  $form_state['values']['additional_settings__active_tab']="edit-user";
  $form_state['values']['op'] = t('Save profile');
  $form_state['build_info']['args'] = array(&$profile);
  drupal_form_submit('commerce_addressbook_customer_profile_form', $form_state);
  
  
  $query = db_select('field_data_field_geofiledtest', 'cad')
    ->fields('cad', array('revision_id','field_geofiledtest_lat','field_geofiledtest_lon'))
    ->condition('bundle', 'billing')
    ->condition('entity_id', $profile->profile_id)
    ->execute();
  $record = $query->fetchObject();
  
  //$profilenew=commerce_customer_profile_load($profile->profile_id);
  $result=array("status"=>"OK","profile_id"=>$profile->profile_id,"lat"=>$record->field_geofiledtest_lat,"lon"=>$record->field_geofiledtest_lon);
  return $result;
}

/**
 * Page callback for editing a customer profile.
 */
function commerce_addressbook_profile_options_editajax($account, $customer_profile) {
  // Add the breadcrumb for the form's location.
  //commerce_addressbook_set_breadcrumb($account, $customer_profile->type);
  //$customer_profile = commerce_customer_profile_load($customer_profile->profile_id);
  // If the profile is referenced by an order, make sure it gets duplicated.
  $profile = clone($customer_profile);
  if (!commerce_customer_profile_can_delete($customer_profile)) {
    $profile->previous_id = $profile->profile_id;
    unset($profile->profile_id);
    unset($profile->revision_id);
    $profile->is_new = TRUE;
  }
  //module_load_include('inc', 'commerce_customer', 'includes/commerce_customer_profile.forms');
  //return drupal_get_form('commerce_addressbook_customer_profile_form', $profile);
  $addressInfo=$GLOBALS['HTTP_RAW_POST_DATA'];
  $arr = json_decode($addressInfo, true); 
  if($profile->field_customerphone['und'][0]['value']!=$arr['customerphone']){
    $profile->field_customerphone['und'][0]['value']=$arr['customerphone'];
  }
  
  if($profile->field_receievername['und'][0]['value']!=$arr['receievername']){
    $profile->field_receievername['und'][0]['value']=$arr['receievername'];
  }
  
   if($profile->field_addressprofile['und'][0]['value']!=$arr['detail2']){
    $profile->field_addressprofile['und'][0]['value']=$arr['detail2'];
  }
    // Save the profile.
  $result = commerce_customer_profile_save($profile);
  
  if($result==2){
    return array("status"=>"OK","profile_id"=>$profile->profile_id);
  }
  else{
    return array("status"=>"ERROR","profile_id"=>$profile->profile_id);;
  }
    
	
}

/**
 * Submit handler for commerce_addressbook_customer_profile_form().
 */
function commerce_addressbook_customer_profile_form_submit($form, &$form_state) {
  $profile = $form_state['customer_profile'];

  // The profile has been edited and duplicated.
  // Disable the previous one to prevent it from showing up in listings.
  if (!empty($profile->previous_id)) {
    $old_profile = commerce_customer_profile_load($profile->previous_id);
    $old_profile->status = 0;
    commerce_customer_profile_save($old_profile);

    // If the old profile was the default, then we need to set the new one
    // as the default.
    $default_profile_id = commerce_addressbook_get_default_profile_id($profile->uid, $profile->type);
    if ($old_profile->profile_id == $default_profile_id) {
      commerce_addressbook_set_default_profile($profile);
    }
  }
  $form_state['redirect'] = 'user/' . $profile->uid . '/addressbook/' . $profile->type;
}

/**
 * Page callback for deleting a customer profile.
 *
 * @see confirm_form()
 * @see commerce_addressbook_profile_options_delete_form_submit()
 */
function commerce_addressbook_profile_options_deleteajax_form($form, &$form_state, $account, $customer_profile) {
  // Add the breadcrumb for the form's location.
  //commerce_addressbook_set_breadcrumb($account, $customer_profile->type);

  $form_state['profile'] = $customer_profile;

  $content = entity_view('commerce_customer_profile', array($customer_profile->profile_id => $customer_profile));

  $form = confirm_form($form,
    t('Are you sure you want to delete this address?'),
    'user/' . $customer_profile->uid . '/addressbook/' . $customer_profile->type,
    drupal_render($content) . '<p>' . t('Deleting this address cannot be undone.') . '</p>',
    t('Delete'),
    t('Cancel'),
    'confirm'
  );

  return $form;
}

/**
 * Submit handler for commerce_addressbook_profile_options_delete_form.
 *
 * Deletes the customer profile if possible (when it's not referenced by any
 * orders), disables it otherwise.
 */
function commerce_addressbook_profile_options_delete_form_submit($account, $customer_profile) {
  //$customer_profile = $form_state['profile'];
  if (commerce_customer_profile_can_delete($customer_profile)) {
    commerce_customer_profile_delete($customer_profile->profile_id);
  }
  else {
    $customer_profile->status = 0;
    commerce_customer_profile_save($customer_profile);
    // Delete the profile entry from the commerce_addressbook_defaults table.
    db_delete('commerce_addressbook_defaults')
      ->condition('profile_id', $customer_profile->profile_id)
      ->execute();
  }
  $result=array("status"=>"OK");
  return $result;
  //$form_state['redirect'] = 'user/' . $customer_profile->uid . '/addressbook/' . $customer_profile->type;
  
}

/**
 * Page callback for setting a customer profile as default.
 * Used for both ajax and non-ajax delivery of the customer profile updates.
 */
function commerce_addressbook_profile_options_default($account, $customer_profile, $type = 'ajax') {
  // Check if the user already has defaults addresses to know which
  // ajax command we should use.
  $defaults_view = commerce_addressbook_retrieve_view('commerce_addressbook_defaults', 'default', array($account->uid, $customer_profile->type));
  commerce_addressbook_set_default_profile($customer_profile);
  if ($type == 'ajax') {
    $commands = array();
    $list_view = commerce_addressbook_retrieve_view('commerce_addressbook', 'default', array($account->uid, $customer_profile->type));
    $commands[] = ajax_command_replace('#commerce-addressbook-' . $customer_profile->type . '-list', '<div id="commerce-addressbook-' . $customer_profile->type . '-list">' . $list_view->render() . '</div>');
    $defaults_html = '<div id="commerce-addressbook-' . $customer_profile->type . '-default">' . views_embed_view('commerce_addressbook_defaults', 'default', $account->uid, $customer_profile->type) . '</div>';
    if (empty($defaults_view->result)) {
      if (empty($list_view->result)) {
        $commands[] = ajax_command_replace('#commerce-addressbook-' . $customer_profile->type . '-list', $defaults_html);
      }
      else {
        $commands[] = ajax_command_after('#commerce-addressbook-' . $customer_profile->type . '-list', $defaults_html);
      }
    }
    else {
      $commands[] = ajax_command_replace('#commerce-addressbook-' . $customer_profile->type . '-default', $defaults_html);
    }
    ajax_deliver(array('#type' => 'ajax', '#commands' => $commands));
  }
  else {
    drupal_goto('user/' . $account->uid . '/addressbook/' . $customer_profile->type);
  }
}

/**
 * Page callback for path /user/%user/addressbook.
 *
 * Displays first enabled profile type addressbook page if user is logged in,
 * or access denied for anonymous.
 */
function commerce_addressbook_page($account) {
  if ($account->uid) {
    if ($type = commerce_addressbook_page_access($account)) {
      menu_set_active_item('user/' . $account->uid . '/addressbook/' . $type);
      return menu_execute_active_handler(NULL, FALSE);
    }
  }
  // The below line should never get called but in case it does we will return
  // an empty address book message.
  return '<div class="addressbook-nodata">' . t('Your address book is currently empty.') . '</div>';
}

/**
 * Page callback for listing customer profiles of a certain type.
 *
 * Embeds a view that shows the current default profile, and a view that shows
 * all other profiles of the same type.
 */
function commerce_addressbook_profile_page($account, $profile_type) {
  $output = '';
  $arguments = array($account->uid, $profile_type);
  $defaults_view = commerce_addressbook_retrieve_view('commerce_addressbook_defaults', 'default', $arguments);
  $list_view = commerce_addressbook_retrieve_view('commerce_addressbook', 'default', $arguments);
  if (!empty($defaults_view->result)) {
    $output .= '<div id="commerce-addressbook-' . $profile_type . '-default">' . $defaults_view->render() . '</div>';
  }
  if (!empty($list_view->result)) {
    $output .= '<div id="commerce-addressbook-' . $profile_type . '-list">' . $list_view->render() . '</div>';
  }
  if ($output == '') {
    return '<div class="addressbook-nodata">' . t('Your @profile_type address book is currently empty.',
      array('@profile_type' => commerce_customer_profile_type_get_name($profile_type))) . '</div>';
  }
  else {
    return $output;
  }
}

/**
 * Sets the breadcrumb for address book forms.
 *
 * @param $account
 *   The user object.
 * @param $profile_type
 *   The machine-readable name of the customer profile type
 */
function commerce_addressbook_set_breadcrumb($account, $profile_type) {
  $type_name = commerce_customer_profile_type_get_name($profile_type);
  $breadcrumb = array(
    l(t('Home'), '<front>'),
    l($account->name, 'user/' . $account->uid),
    l(t('Address Book'), 'user/' . $account->uid . '/addressbook'),
    l($type_name, 'user/' . $account->uid . '/addressbook/' . $profile_type),
  );

  drupal_set_breadcrumb($breadcrumb);
}
