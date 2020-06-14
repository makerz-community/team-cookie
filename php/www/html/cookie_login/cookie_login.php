<?php 

    session_start();

    // twitterログイン

    // twitteroauth の読み込み
    require "../vendor/autoload.php";
    use Abraham\TwitterOAuth\TwitterOAuth;

    //Twitterのコンシュマーキー(APIキー)等読み込み
    define('TWITTER_API_KEY', 'pKyR8QKI3tsLPVvVGeQX2hbCU');//Consumer Key (API Key)
    define('TWITTER_API_SECRET', 'Iy3PBOQMxrU0HWRxPfL8j74lWNQcDflUTUQb2U5NI5N7swAsZd');//Consumer Secret (API Secret)

    define('CALLBACK_URL', 'http://127.0.0.1:8080/cookie_login/twitter_callback.php');//登録したコールバックURL

    //「abraham/twitteroauth」ライブラリのインスタンスを生成し、Twitterからリクエストトークンを取得する
    $connection = new TwitterOAuth(TWITTER_API_KEY, TWITTER_API_SECRET, $access_token, $access_token_secret);
    $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => CALLBACK_URL));

    //リクエストトークンはコールバックページでも利用するためセッションに格納しておく
    $_SESSION['oauth_token'] = $request_token['oauth_token'];
    $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

    //Twitterの認証画面のURL
    $oauthUrl = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));

    // facebookログイン

    // facebook SDKの読み込み
    require_once __DIR__ . '/Facebook/autoload.php';

    $fb = new Facebook\Facebook([
      'app_id' => '278921433304446',
      'app_secret' => '40d9e2cd8a890a2d899bc9747faafe80',
      'default_graph_version' => 'v2.10',
      ]);

    $helper = $fb->getRedirectLoginHelper();
    $permissions = [];
    $loginUrl = $helper->getLoginUrl('https://69ab5694b2ac.ngrok.io/cookie_login/facebook_callback.php',$permissions);
    
  ?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>（仮）cookie</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

  <div class="container">
      <h2>Member Sign in</h2>
      <br>
      <form action="cookie_login_check.php" method="post">
        <p>Email</p>
        <input type="text" name="email"><br>
        <p>Password</p>
        <input type="password" name="pass"><br>
        <br>
        <input type="submit" value="Sign in">
      </form>
  </div>

<br>
<br>

  <div class="twitter">
    <a href="<?php echo $oauthUrl; ?>"><img src="images/t_button.png" alt="twitter_button"></a>
  </div>

<!-- <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=278921433304446&autoLogAppEvents=1"></script>

<div class="fb-login-button" data-size="medium" data-button-type="login_with" data-layout="default" data-auto-logout-link="false" data-use-continue-as="false" data-width=""></div> -->

<!-- <div class="FbBtnLabel">
    <a class="FbBtn" href="<?php echo $loginUrl; ?>"><img src="images/f_button.png" alt="facebook_button"></a>
  </div> -->

  <a class="FbBtn" href="https://www.facebook.com/dialog/oauth?client_id={your-app-id}&amp;redirect_uri={redirect-uri}">
   <div class="FbBtnLabel">Facebookでログイン</div>
</a>

<?php
echo '<a href="' . $loginUrl . '">Log in with Facebook!</a>';
?>

</body>
</html>
