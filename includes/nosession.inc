<?php

/**
 * @file
 * User session handling functions.
 *
 * The user-level session storage handlers:
 * are assigned by session_set_save_handler() in bootstrap.inc and are called
 * automatically by PHP. These functions should not be called directly. 
 */



/**
 * Also initializes the $user object for the user associated with the session.
 * It is called on every page load when PHP sets
 * up the $user superglobal.
 *
 * @param $jwtToken
 *   The session ID of the session to retrieve.
 */
function _drupal_session_read () {
  
  global $user;
  if(isset($_COOKIE['JHVEGE']) && $_COOKIE['JHVEGE']!='null'){
      $jwtToken=$_COOKIE['JHVEGE'];
  }
   
  if (empty($jwtToken) ) {
    $user = drupal_anonymous_user();
    return '';
  }
 

  // Otherwise, if the session is still active
  require_once DRUPAL_ROOT . '/modules/oauth2_server-7.x-1.7/oauth2_server/oauth2_server.pages.inc';
  require_once DRUPAL_ROOT . '/includes/common.inc';
  $redirect_url_parts = explode('?', $jwtToken);
  $redirect_url_params = drupal_get_query_array($redirect_url_parts[1]);
  $tokens = array(
        'id_token' => $redirect_url_params['id_token'],
        'access_token' => $redirect_url_params['access_token'],
      );
  
  
   $user_data = get_token($tokens);  
   if($user_data!='')  
   {
   $user_array=array('uid'=>(int)$user_data['sub'],
                     'roles'=>$user_data['roles'],
					 'signature'=>$user_data['signature'],
					 'name'=>$user_data['username']);

   $user=(object)$user_array;
   }

  if (!$user) {
    // The user is anonymous or blocked. 
  
    $user =  drupal_anonymous_user();
	 watchdog('user', '_drupal_session_delete_cookie');
    _drupal_session_delete_cookie('JHVEGE'); 
  }

 	 //sunxike 20190424
    if ($user->uid!=1 || !empty($_SESSION)) {
      drupal_page_is_cacheable(TRUE);
    }
 
 }






function drupal_nosession_initialize(){
   _drupal_session_read () ;
}



/**
 * Deletes the session cookie.
 *
 * @param $name
 *   Name of session cookie to delete.
 * @param boolean $secure
 *   Force the secure value of the cookie.
 */
function _drupal_session_delete_cookie($name, $secure = NULL) {
  global $is_https;
  if (isset($_COOKIE[$name]) || (!$is_https && $secure === TRUE)) {
    setcookie($name, '', REQUEST_TIME - 3600,'/');
    unset($_COOKIE[$name]);
  }
}



function drupal_session_commit(){}
function drupal_save_session(){}

