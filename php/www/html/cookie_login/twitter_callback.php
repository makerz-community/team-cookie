<?php

session_start();

require "../vendor/autoload.php";

//Twitterのコンシュマーキー(APIキー)等読み込み
define('TWITTER_API_KEY', 'pKyR8QKI3tsLPVvVGeQX2hbCU'); //Consumer Key (API Key)
define('TWITTER_API_SECRET', 'Iy3PBOQMxrU0HWRxPfL8j74lWNQcDflUTUQb2U5NI5N7swAsZd');//Consumer Secret (API Secret)

use Abraham\TwitterOAuth\TwitterOAuth;

//cookie_login.phpでセットしたセッション
$request_token['oauth_token'] = $_SESSION['oauth_token'];
$request_token['oauth_token_secret'] = $_SESSION['oauth_token_secret'];

//リクエストトークンを使い、アクセストークンを取得する
$twitter_connect = new TwitterOAuth(TWITTER_API_KEY, TWITTER_API_SECRET, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
$access_token = $twitter_connect->oauth('oauth/access_token', array('oauth_verifier' => $_GET['oauth_verifier'], 'oauth_token'=> $_GET['oauth_token']));

//アクセストークンからユーザの情報を取得する
$user_connect = new TwitterOAuth(TWITTER_API_KEY, TWITTER_API_SECRET, $access_token['oauth_token'], $access_token['oauth_token_secret']);
$user_info = $user_connect->get('account/verify_credentials');//アカウントの有効性を確認するためのエンドポイント

//Twitterから返されたOAuthトークンと、あらかじめcookie_login.phpで入れておいたセッション上のものと一致するかをチェック
if (isset($_GET['oauth_token']) && $request_token['oauth_token'] !== $_GET['oauth_token']) {
    die( 'Error!' );
} else {
  $_SESSION['login']=1;
  $_SESSION['member_name']=$user_info->name;
  
  //トップページへ
  header( 'location: cookie_top.php' );
}