<?php

/**
 * Add body classes if certain regions have content.
 */
function bartik_cainiang_preprocess_html(&$variables) {
  if (!empty($variables['page']['featured'])) {
    $variables['classes_array'][] = 'featured';
  }

  if (!empty($variables['page']['triptych_first'])
    || !empty($variables['page']['triptych_middle'])
    || !empty($variables['page']['triptych_last'])) {
    $variables['classes_array'][] = 'triptych';
  }

  if (!empty($variables['page']['footer_firstcolumn'])
    || !empty($variables['page']['footer_secondcolumn'])
    || !empty($variables['page']['footer_thirdcolumn'])
    || !empty($variables['page']['footer_fourthcolumn'])) {
    $variables['classes_array'][] = 'footer-columns';
  }

  // Add conditional stylesheets for IE
  drupal_add_css(path_to_theme() . '/css/ie.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'lte IE 7', '!IE' => FALSE), 'preprocess' => FALSE));
  drupal_add_css(path_to_theme() . '/css/ie6.css', array('group' => CSS_THEME, 'browsers' => array('IE' => 'IE 6', '!IE' => FALSE), 'preprocess' => FALSE));
}

/**
 * Override or insert variables into the page template for HTML output.
 */
function bartik_cainiang_process_html(&$variables) {
  // Hook into color.module.
  if (module_exists('color')) {
    _color_html_alter($variables);
  }
 
//dpm(drupal_get_path('theme', 'bartik_cainiang'));
//dpm("OK1");
  //drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/JS/respond.js');
  //drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/JS/jquery-migrate-1.4.1.js',array( 'scope' => 'header', 'weight' => 14));
  


}


function deep_in_array($key, $array) {   
        foreach($array as $item) {   
            if(!is_array($item)) {         
                 continue;     
            }   
                
            if(in_array($key, $item)) {  
                return $item[$key];      
            } 
			else {  
			    return  deep_in_array($key, $item);     
            }  
        }   
        return "NoKey";   
    }

/**
 * Override or insert variables into the page template.
 */
function bartik_cainiang_preprocess_page(&$variables) {
	 $variables["theme_hook_suggestions"][] = "page";
	
	 
	if(array_key_exists('nodes',$variables['page']['content']['system_main']) && is_array($variables['page']['content']['system_main']['nodes'])){
		$products = deep_in_array('#JHProductOpti', $variables['page']['content']['system_main']['nodes']);
		foreach($products as $product){
		   foreach (field_info_instances('commerce_product', $product->type) as $product_field_name => $product_field) {
			   if($product_field_name=="commerce_price"){
				   $product->{$product_field_name}['und'][0]["amount"]=number_format($product->{$product_field_name}['und'][0]["amount"]/100.0,2);
			   }
			$productJson[$product->product_id][$product_field_name]=$product->{$product_field_name}['und'][0];
		   }
		}
		if(is_array($products)){
			
			drupal_add_js("(function($){
               $(function() {
			   window.productJson=(".json_encode($productJson).");
			   asycChangeValue(undefined);
			   });   
             })(jQuery);",array('type' => 'inline', 'scope' => 'footer', 'weight' => 9000)); 
		}
	}

    drupal_add_css(drupal_get_path('theme', 'bartik_cainiang') . '/css/Menu.css');
	
    drupal_add_js('misc/jquery.js',array( 'scope' => 'header', 'weight' => 0,'group'=>-1000));
    drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/JS/jquery.cookie.js',array( 'scope' => 'footer', 'weight' => 1));
    drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/JS/base64.js',array( 'scope' => 'footer', 'weight' => 1));
	drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/JS/bootstrap.min.js',array( 'scope' => 'footer', 'weight' => 111));
	drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/JS/jQuery Easing.js',array( 'scope' => 'footer', 'weight' => 112));
	drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/JS/Menu.js',array( 'scope' => 'footer', 'weight' => 113));
	drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/JS/Custom.js',array( 'scope' => 'footer', 'weight' => 115));
    if($variables["is_front"])
    {
    drupal_add_css(drupal_get_path('theme', 'bartik_cainiang') . '/samsung-grid/css/normalize.css');
    drupal_add_css(drupal_get_path('theme', 'bartik_cainiang') . '/samsung-grid/css/demo.css');
    drupal_add_css(drupal_get_path('theme', 'bartik_cainiang') . '/samsung-grid/css/component.css');
    drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/samsung-grid/js/modernizr.custom.js',array( 'scope' => 'footer', 'weight' => 7));
    drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/samsung-grid/js/masonry.pkgd.min.js',array( 'scope' => 'footer', 'weight' => 7));
    drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/samsung-grid/js/imagesloaded.pkgd.min.js',array( 'scope' => 'footer', 'weight' => 8));
    drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/samsung-grid/js/classie.js',array( 'scope' => 'footer', 'weight' => 9));
    drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/samsung-grid/js/colorfinder-1.1.js',array( 'scope' => 'footer', 'weight' => 10));
    drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/samsung-grid/js/gridScrollFx.js',array( 'scope' => 'footer', 'weight' => 11));
	//drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/JS/Custom.js',array( 'scope' => 'footer', 'weight' => 110));
    /*drupal_add_js("new GridScrollFx( document.getElementById( 'grid' ), {
				viewportFactor : 0.4
			} );
", array('type' => 'inline', 'scope' => 'footer', 'weight' => 13) );*/
    }
    else if(current_path() =='vegetable' || current_path() =='fruit' || current_path() =='commentcache')
    {
		
    drupal_add_css(drupal_get_path('theme', 'bartik_cainiang') . '/css/style.css');
  
	
    /*drupal_add_js("(function($){
               $(function() {
                   $('.temphol').hover(
                     function() {
                          $(this).children('.front').stop().animate({ 'top' : '0','height':'0'}, 500);
                            }, 
                   function() {
                          $(this).children('.front').stop().animate({ 'top' : '0','height':'100%'}, 300);
                          }
                 );
                } );
             })(jQuery);",array('type' => 'inline', 'scope' => 'footer', 'weight' => 15));    */

    drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/JS/JHHover.js',array( 'scope' => 'footer', 'weight' => 14));			 
  }
else if(current_path() =='user/login'  ){
       drupal_add_css(drupal_get_path('theme', 'bartik_cainiang') . '/css/loginOverlay.css');
}
else if(current_path() =='user/register' || current_path() =='user_area'|| current_path() =='user/password' ){
     drupal_add_css(drupal_get_path('theme', 'bartik_cainiang') . '/css/signup_page.css');
     drupal_add_css(drupal_get_path('theme', 'bartik_cainiang') . '/css/jinghe.css');
}
else if(current_path() =='cart' ||  explode('checkout',current_path())>1){
     drupal_add_css(drupal_get_path('theme', 'bartik_cainiang') . '/css/cart.css');
     drupal_add_css(drupal_get_path('theme', 'bartik_cainiang') . '/css/bootstrap.min.css');
}

}





/**
 * Override or insert variables into the page template.
 */
function bartik_cainiang_process_page(&$variables) {
  if (module_exists('color')) {
    _color_page_alter($variables);
  }
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
  // Since the title and the shortcut link are both block level elements,
  // positioning them next to each other is much simpler with a wrapper div.
  if (!empty($variables['title_suffix']['add_or_remove_shortcut']) && $variables['title']) {
    // Add a wrapper div using the title_prefix and title_suffix render elements.
    $variables['title_prefix']['shortcut_wrapper'] = array(
      '#markup' => '<div class="shortcut-wrapper clearfix">',
      '#weight' => 100,
    );
    $variables['title_suffix']['shortcut_wrapper'] = array(
      '#markup' => '</div>',
      '#weight' => -99,
    );
    // Make sure the shortcut link is the first item in title_suffix.
    $variables['title_suffix']['add_or_remove_shortcut']['#weight'] = -100;
   
     
  }

   //隐藏站点名字
   $variables['hide_site_name']=TRUE ;
   $variables['hide_site_slogan']=TRUE ;
}

/**
 * Implements hook_preprocess_maintenance_page().
 */
function bartik_cainiang_preprocess_maintenance_page(&$variables) {
  // By default, site_name is set to Drupal if no db connection is available
  // or during site installation. Setting site_name to an empty string makes
  // the site and update pages look cleaner.
  // @see template_preprocess_maintenance_page
  if (!$variables['db_is_active']) {
    $variables['site_name'] = '';
  }
  drupal_add_css(drupal_get_path('theme', 'bartik_cainiang') . '/css/maintenance-page.css');
}

/**
 * Override or insert variables into the maintenance page template.
 */
function bartik_cainiang_process_maintenance_page(&$variables) {
  // Always print the site name and slogan, but if they are toggled off, we'll
  // just hide them visually.
  $variables['hide_site_name']   = theme_get_setting('toggle_name') ? FALSE : TRUE;
  $variables['hide_site_slogan'] = theme_get_setting('toggle_slogan') ? FALSE : TRUE;
  if ($variables['hide_site_name']) {
    // If toggle_name is FALSE, the site_name will be empty, so we rebuild it.
    $variables['site_name'] = filter_xss_admin(variable_get('site_name', 'Drupal'));
  }
  if ($variables['hide_site_slogan']) {
    // If toggle_site_slogan is FALSE, the site_slogan will be empty, so we rebuild it.
    $variables['site_slogan'] = filter_xss_admin(variable_get('site_slogan', ''));
  }
}

/**
 * Override or insert variables into the node template.
 */
function bartik_cainiang_process_node(&$variables) {
	if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
		
	}
}

/**
 * Override or insert variables into the node template.
 */
function bartik_cainiang_preprocess_node(&$variables) {
  if ($variables['view_mode'] == 'full' && node_is_page($variables['node'])) {
    $variables['classes_array'][] = 'node-full';
    //drupal_add_js('jQuery(document).ready(function () { alert("OK"); });', array('type' => 'inline', 'scope' => 'header', 'weight' => 17) ); 
     drupal_add_css(drupal_get_path('theme', 'bartik_cainiang') . '/slider/css/CSSreset.min.css');
     drupal_add_css(drupal_get_path('theme', 'bartik_cainiang') . '/slider/css/muslider_demo.css');
     drupal_add_css(drupal_get_path('theme', 'bartik_cainiang') . '/css/content.css');
     //drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/slider/js/jquery-2.1.0.min.js',array( 'scope' => 'header', 'weight' => 18));
     drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/slider/js/browser.js',array( 'scope' => 'footer', 'weight' => 19));
     drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/slider/js/jquery.muslider-2.0.min.js',array( 'scope' => 'footer', 'weight' => 20));
	 drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/JS/Custom.js',array( 'scope' => 'footer', 'weight' => 115));
	 //drupal_add_js(drupal_get_path('theme', 'bartik_cainiang') . '/JS/dotdotdot.js',array( 'scope' => 'footer', 'weight' => 114));
    /* drupal_add_js('(function($){
	 $(document).ready(function() 
			{
				$("#container").muslider({
					"animation_type": "horizontal",
					"animation_duration": 600,
					"animation_start": "manual",
					"responsive": "yes",
					//"ratio":"maximum",
	                //"max_width":1074,
					//"max_height": 607
				});
				
				
			}
	 )
	 })(jQuery);', array('type' => 'inline', 'scope' => 'footer', 'weight' => 21) ); */
   $variables["ajax-loader"] = url(drupal_get_path('theme', 'bartik_cainiang').'/slider/images/ajax-loader.gif', array('absolute'=>true));
  }

  
  if ($variables['node']->type == 'fruitseries' || $variables['node']->type == 'vegetableseries') 
{
    //$variables['theme_hook_suggestions'][] = 'page__node__' . $variables['node']->type;
    if($variables['id']==1)
         $variables['JHAjax']=0; 

    //dsm($variables);

    if($variables['view_mode'] == 'teaser'){
       //价格数据
       $id = $variables['id'];
       $variables['product_price'] = ($variables['view']->result[$id-1]->commerce_price_amount)/100.0;
    }   
  }
  
}

/**
 * Override or insert variables into the block template.
 */
function bartik_cainiang_preprocess_block(&$variables) {
  // In the header region visually hide block titles.
  if ($variables['block']->region == 'header') {
    $variables['title_attributes_array']['class'][] = 'element-invisible';
  }

  if ($variables["is_front"]) {
        $variables["theme_hook_suggestions"][] = "block__front";
        
    }

}

function bartik_cainiang_preprocess_views_view_table(&$variables) {
	if (isset($variables['theme_hook_original']) && $variables['theme_hook_original']=='views_view_table__commerce_user_orders') {
		$ids=array();
		foreach($variables['view']->result as $order_count =>$order){
			array_push($ids,$order->order_id);
		}
		$orders = commerce_order_load_multiple($ids, array());
		$index = 0;
		foreach($orders as 	$orderid=>  $order ){
			  $order_wrapper = entity_metadata_wrapper('commerce_order', $order);
			  $line_item_ids=array();
			  foreach ($order_wrapper->commerce_line_items as $delta => $line_item_wrapper) {
                   array_push($line_item_ids,$line_item_wrapper->line_item_id->value());
			  }
			  if(count($line_item_ids)==0){
				  unset($variables['rows'][$index]);
				  continue;
			  }
			  $view=commerce_embed_view_custom('commerce_line_item_table', 'default', array(implode(',', $line_item_ids)));
			  
			  switch($order->status){
				  case 'checkout_checkout':
				        $status='待结算';
						break;
				  case 'wait_buyer_pay':
				        $status='待付款';
						break;
				  default:
				       $status='非法状态';
			  }
			  foreach($view->result as $line_item){
				  
				  $line_item->_field_data['status']=$status;
			  }

             
         

			  //$variables["order_details"][$order->order_number]=count($line_item_ids);
			  $variables["order_details"][$order->order_number]=$view->render();	
              $index++;			  
		}
    }

	
}


function bartik_cainiang_preprocess_menu_local_action(&$variables) {
  if ($variables['element']['#link']['access_callback']=='commerce_addressbook_profile_create_access') {
    // looks for node--promoted.tpl.php in your theme directory
    $variables['theme_hook_suggestions'][] = 'menu_local_action__shipping';
  }
}
function bartik_cainiang_preprocess_link(&$variables) {
  if(strpos($variables['path'],'addressbook')!==false){
	$variables['theme_hook_suggestions'][] = 'link__shiping'; 
  }
}

function bartik_cainiang_preprocess_radios(&$variables) {
  if(strpos($variables['element']['#array_parents'][0],'commerce_payment')!==false){	  
	$variables['element']['#attributes']['class'] = array('list-group','list-group-horizontal'); 
  }
}

function bartik_cainiang_preprocess_form_element(&$variables) {
  if(strpos($variables['element']['#id'],'commerce-payment-payment-method')!==false){	  
	$variables['theme_hook_suggestions'][] = 'form_element__bank'; 
  }
}

function bartik_cainiang_preprocess_textfield(&$variables){
	
     if (isset($variables['element']['#bundle']) && $variables['element']['#bundle']=='billing') {
    // looks for node--promoted.tpl.php in your theme directory
       $variables['theme_hook_suggestions'][] = 'textfield__shipping';
  }
}
function bartik_cainiang_textfield__shipping($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'text';
  element_set_attributes($element, array('id', 'name', 'value', 'size', 'maxlength'));
  _form_set_class($element, array('form-text','form-control'));

  $extra = '';
  if ($element['#autocomplete_path'] && drupal_valid_path($element['#autocomplete_path'])) {
    drupal_add_library('system', 'drupal.autocomplete');
    $element['#attributes']['class'][] = 'form-autocomplete';

    $attributes = array();
    $attributes['type'] = 'hidden';
    $attributes['id'] = $element['#attributes']['id'] . '-autocomplete';
    $attributes['value'] = url($element['#autocomplete_path'], array('absolute' => TRUE));
    $attributes['disabled'] = 'disabled';
    $attributes['class'][] = 'autocomplete';
    $extra = '<input' . drupal_attributes($attributes) . ' />';
  }

  $output = '<input' . drupal_attributes($element['#attributes']) . ' />';

  return $output . $extra;
}

function bartik_cainiang_textfield($variables) {
  $element = $variables['element'];
  $element['#attributes']['type'] = 'text';
  element_set_attributes($element, array('id', 'name', 'value', 'size', 'maxlength'));
  _form_set_class($element, array('form-text','form-control'));

  $extra = '';
  if ($element['#autocomplete_path'] && drupal_valid_path($element['#autocomplete_path'])) {
    drupal_add_library('system', 'drupal.autocomplete');
    $element['#attributes']['class'][] = 'form-autocomplete';

    $attributes = array();
    $attributes['type'] = 'hidden';
    $attributes['id'] = $element['#attributes']['id'] . '-autocomplete';
    $attributes['value'] = url($element['#autocomplete_path'], array('absolute' => TRUE));
    $attributes['disabled'] = 'disabled';
    $attributes['class'][] = 'autocomplete';
    $extra = '<input' . drupal_attributes($attributes) . ' />';
  }

  $output = '<input' . drupal_attributes($element['#attributes']) . ' />';

  return $output . $extra;
}

function bartik_cainiang_menu_local_action__shipping($variables) {
  $link = $variables['element']['#link'];

  $output = '<li><a class="jhaddaddress" href="/'.$link['href'].'" title='.'"增加收货地址"'.'>';
  
  $output .= "</a></li>\n";

  return $output;
}

function bartik_cainiang_form_element__bank($variables){
  $element = &$variables['element'];
  //$element['#title_display']='invisible';
    
  $output = '<div class="form-item form-type-radio form-item-commerce-payment-payment-method list-group-item">' . "\n";

  $prefix = isset($element['#field_prefix']) ? '<span class="field-prefix">' . $element['#field_prefix'] . '</span> ' : '';
  $suffix = isset($element['#field_suffix']) ? ' <span class="field-suffix">' . $element['#field_suffix'] . '</span>' : '';

  
  
  $output .= ' ' . $prefix . $element['#children'] . $suffix . "\n";
  switch ( $element['#id']) {
      case 'edit-commerce-payment-payment-method-alipay-f2frules-zhifubaosaoyisao':
         $output .= '<img class="pay-item-icon" for="edit-commerce-payment-payment-method-alipay-f2frules-zhifubaosaoyisao" alt="当面付" src=" https://zos.alipayobjects.com/rmsportal/iBUHPUBjQgjoXxBESctK.png">';
        break;
      case 'edit-commerce-payment-payment-method-alipay-pagerules-zhifubaowangye':
        $output .= '<img class="pay-item-icon" alt="电脑网站支付"   src="/sites/all/themes/cainiang01/images/technology.png">';
        //$output .= '<img class="pay-item-icon" alt="电脑网站支付" src=" https://zos.alipayobjects.com/rmsportal/RcCdEKSgiDeiFLXKTwOI.png">';
        break;
	  case 'edit-commerce-payment-payment-method-alipay-waprules-zhifubaoshouji':
	    $output .= '<img class="pay-item-icon" alt="APP支付" src=" https://zos.alipayobjects.com/rmsportal/peUpMlQSBFhCpuKfSXSo.png">';
        //$output .= '<img class="pay-item-icon" alt="手机网站支付" src="https://zos.alipayobjects.com/rmsportal/AuBmpwXHMHBVjXzjcmNs.png">';
		//https://pay.weixin.qq.com/wiki/doc/api/img/technology.png
        break;
		
		
    }
  
 
  
  $output .= ' ' . theme('form_element_label', $variables);

  $output .= "</div>\n";

  return $output;
}

function bartik_cainiang_link__shiping($variables) {
	$c='edit';
	if($variables['text']=='set as default'){
		$variables['text']='设为默认地址';
		$c='default';
		
	}
	elseif($variables['text']=='删除'){
		$c='delete';
		
	}
	if($c=='edit' || $c=='delete'){
		//$variables['options']['attributes']['pid']=split("/" , $variables['path'] , 6 )[5];
		$variables['options']['attributes']['pid']=substr($variables['path'],strrpos($variables['path'],"/")+1);
		return '<a class="jhoperator jhoperator'.$c.'" href="#"' . drupal_attributes($variables['options']['attributes']) . ' title="'.($variables['options']['html'] ? $variables['text'] : check_plain($variables['text'])).'"></a>';
	}
	else{
		return '<a class="jhoperator jhoperator'.$c.'" href="' . check_plain(url($variables['path'], $variables['options'])) . '"' . drupal_attributes($variables['options']['attributes']) . ' title="'.($variables['options']['html'] ? $variables['text'] : check_plain($variables['text'])).'"></a>';
	}
    

  }

/**
 * Implements theme_menu_tree().
 */
function bartik_cainiang_menu_tree($variables) {
  //dsm($variables);
  return '<ul class="menu clearfix">' . $variables['tree'] . '</ul>';
}

function bartik_cainiang_submit($variables) {
  return theme('button', $variables['element']);
}

/**
 * Implements theme_field__field_type().
 */
function bartik_cainiang_field__taxonomy_term_reference($variables) {
  $output = '';

  // Render the label, if it's not hidden.
  if (!$variables['label_hidden']) {
    $output .= '<h3 class="field-label">' . $variables['label'] . '</h3></dt>';
  }

  // Render the items.
  $output .= ($variables['element']['#label_display'] == 'inline') ? ' <dd><ul class="links inline field-items_JH">' : ' <dd><ul class="links field-items_JH">';
  foreach ($variables['items'] as $delta => $item) {
    $output .= '<li class="taxonomy-term-reference-' . $delta . '"' . $variables['item_attributes'][$delta] . '>' . drupal_render($item) . '</li>';
  }
  $output .= '</ul></dd></dl>';

  // Render the top-level DIV.
  $output = '<div class="' . $variables['classes'] . (!in_array('clearfix', $variables['classes_array']) ? ' clearfix' : '') . '"' . $variables['attributes'] .'><dl class="dl-horizontal JHChangeValue"><dt>' . $output . '</div>';

  return $output;
}

function bartik_cainiang_username($variables){
  
      global $user;
    //dsm($user);
     if($user->uid>0){
       if($user->signature =='')
           return $user->name;
       else
           return $user->signature ;
       }
  //return '<a href=”wtai://wp/mc;18503891489”>Tel:18503891489</a>';
}

function bartik_cainiang_theme(){
   $items = array();
   //create custom user_login.tpl.php
     $items['user_login'] = array(
         'render element' => 'form',
         'path' => drupal_get_path('theme','bartik_cainiang').'/templates',
         'template' => 'user-login',
         'preprocess functions' => array('bartik_cainiang_preprocess_user_login' ),

    );
    $items['user_register_form'] = array(
         'render element' => 'form',
         'path' => drupal_get_path('theme','bartik_cainiang').'/templates',
         'template' => 'user-register-form',

    );
	
	 $items['fruitseries_node_form'] = array(
         'render element' => 'form',
         'path' => drupal_get_path('theme','bartik_cainiang').'/templates',
         'template' => 'fruitseries-node-form',

    );
	//dsm($items);
   return $items ;
}

function bartik_cainiang_preprocess_user_login(&$variables){
    $variables['form']['name']['#title']='用户账号:';
    $variables['form']['pass']['#title']='用户密码:';
    $variables['form']['submit']['#value']='登录';
    

    

}

/**
 * Implements hook_form_alter().
 */
function bartik_cainiang_form_alter(&$form, &$form_state, $form_id) {
  if ($form_id == 'user_login') {
    //$form['#theme'] = array('overwrite_user_login');
    $form['#attributes']=array('class'=>'panel-login-form');
    //$form['submit']['#attributes']=array('class'=>'btn-login');
  }
}
/**
 * Unset meta variable in the header that are part of the core.
 */
function bartik_cainiang_html_head_alter(&$head_elements) {
     unset($head_elements['system_meta_generator']);
    //dsm($head_elements);
     foreach ($head_elements as $key => $element) {
     if (isset($element['#attributes']['rel']) && $element['#attributes']['rel'] == 'shortcut icon') {
       unset($head_elements[$key]);
       //$element['href'] = 'slider/images/favicon.ico';
     }

    }
    /* echo '<pre>';
    foreach ($head_elements as $key => $element) {
        echo $key ."\n";
    }
    echo '</pre>';*/

   
}

function bartik_cainiang_page_alter($page) {
 $meta_description = array(
 '#type' => 'html_tag',
 '#tag' => 'meta',
 '#attributes' => array(
 'name' => 'description',
 'content' => 'Some meta description1'
 )
 );
 $meta_keyword = array(
 '#type' => 'html_tag',
 '#tag' => 'meta',
 '#attributes' => array(
 'name' => 'keyword',
 'content' => 'keyword content2'
 )
 );

drupal_add_html_head( $meta_description, 'meta_description2' );
 drupal_add_html_head( $meta_keyword, 'meta_keyword1' );
       // First, we must set up an array
    $shortcut = array(
    '#tag' => 'link', // The #tag is the html tag - <link />
    '#attributes' => array( // Set up an array of attributes inside the tag
    'href' => '/sites/all/themes/cainiang01/slider/images/wangcai.png', 
    'rel' => 'shortcut',
    'type' => 'image/x-icon',
    ),
    );
    drupal_add_html_head($shortcut,'shortcut icon');

       // First, we must set up an array
    $icon = array(
    '#tag' => 'link', // The #tag is the html tag - <link />
    '#attributes' => array( // Set up an array of attributes inside the tag
    'href' => '/sites/all/themes/cainiang01/slider/images/wangcai.png', 
    'rel' => 'icon',
    'type' => 'image/x-icon',
    ),
    );
    drupal_add_html_head($icon,'icon');

    
 }

function bartik_preprocess_region(&$variables, $hook){
    //unset($variables["page_bootom"]);
   //dsm($variables['region'] );
}


function bartik_cainiang_preprocess_field(&$variables, $hook){
	//dsm($variables);
}


