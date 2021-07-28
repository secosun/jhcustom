<?php

namespace OAuth2\OpenID\ResponseType;

use OAuth2\ResponseType\AccessTokenInterface;

class IdTokenToken implements IdTokenTokenInterface
{
    /**
     * @var AccessTokenInterface
     */
    protected $accessToken;

    /**
     * @var IdTokenInterface
     */
    protected $idToken;

    /**
     * Constructor
     *
     * @param AccessTokenInterface $accessToken
     * @param IdTokenInterface $idToken
     */
    public function __construct(AccessTokenInterface $accessToken, IdTokenInterface $idToken)
    {
        $this->accessToken = $accessToken;
        $this->idToken = $idToken;
    }

    /**
     * @param array $params
     * @param mixed $user_id
     * @return mixed
     */
    public function getAuthorizeResponse($params, $user_id = null)
    {
		//sunxike 2018-1-6
        // Add roles element to $user.
		global $user;
        $userClaims['roles'] = array();
        $userClaims['roles'][DRUPAL_AUTHENTICATED_RID] = 'authenticated user';
        $userClaims['roles'] += db_query("SELECT r.rid, r.name FROM {role} r INNER JOIN {users_roles} ur ON ur.rid = r.rid WHERE ur.uid = :uid", array(':uid' => $user->uid))->fetchAllKeyed(0, 1);
        $userClaims['username']=$user->name;
        $userClaims['picture']=UrlEncode(image_style_url('thumbnail', $user->picture->uri));//thumbnail public://pictures/picture-66-1479573607.jpg
		
		//$user->picture->filename;//theme('user_picture', array('account' => $user));//
		//theme('image_style', array('style_name' => $style, 'path' => $filepath, 'alt' => $alt, 'title' => $alt));
		$userClaims['signature']=$user->signature;
		$userClaims['login']=$user->login;
		
		
		//sunxike 2018-2-27
		//add saler info
		$query = db_select('boss_manage', 'bm');
        $query->fields('bm');
        $account= user_load($user->uid);
		$area=$account->field_area['und'][0]['value'];
        $query->condition('area_id',$area,'=');
        $result = $query->execute();    
        $record = $result->fetchAssoc();
        $userClaims['boss_info']=$record;
		
		
		
		
        $result = $this->accessToken->getAuthorizeResponse($params, $user_id);
        $access_token = $result[1]['fragment']['access_token'];
        //$id_token = $this->idToken->createIdToken($params['client_id'], $user_id, $params['nonce'], null, $access_token);
		//sunxike 2018-1-6
		$id_token = $this->idToken->createIdToken($params['client_id'], $user_id, $params['nonce'], $userClaims, $access_token);
        $result[1]['fragment']['id_token'] = $id_token;

        return $result;
    }
}
