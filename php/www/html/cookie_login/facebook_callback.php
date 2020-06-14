<?php

session_start();

require_once __DIR__ . '/Facebook/autoload.php';

$fb = new Facebook\Facebook([
  'app_id' => '278921433304446',
  'app_secret' => '40d9e2cd8a890a2d899bc9747faafe80',
  'default_graph_version' => 'v2.10',
  ]);

$helper = $fb->getRedirectLoginHelper();
try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exception\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch(Facebook\Exception\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}

if (isset($accessToken)) {
  // Logged in!
  $_SESSION['facebook_access_token'] = (string) $accessToken;

  // ここからチャレンジ
  $accessToken = $_SESSION['facebook_access_token'];

    $fb->setDefaultAccessToken($accessToken);

    try {
        //取得するユーザ情報の指定
        $response = $fb->get('/me?fields=id,name,first_name,last_name,email,gender');
        $profile = $response->getGraphUser();

        //ユーザ画像取得
        $UserPicture = $fb->get('/me/picture?redirect=false&height=200');
        $picture = $UserPicture->getGraphUser();

    } catch(Facebook\Exceptions\FacebookResponseException $e) {
        // When Graph returns an error
        echo 'Graph returned an error: ' . $e->getMessage();
        exit;
    } catch(Facebook\Exceptions\FacebookSDKException $e) {
        // When validation fails or other local issues
        echo 'Facebook SDK returned an error: ' . $e->getMessage();
        exit;
    }
  
    $id=$profile['id'];
    $name=$profile['name'];
    $first_name=(isset($profile['first_name'])) ? $profile['first_name'] : '';
    $last_name=(isset($profile['last_name'])) ? $profile['last_name'] : '';
    $email=$profile['email'];
    $gender=(isset($profile['gender'])) ? $profile['gender'] : '';
    $picture_url = $picture['url'];

  // Now you can redirect to another page and use the
  // access token from $_SESSION['facebook_access_token']

  $_SESSION['login']=1;
  $_SESSION['member_name']=$first_name;
  
  //トップページへ
  header( 'location: cookie_top.php' );
}
