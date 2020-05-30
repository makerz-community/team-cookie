<?php 

    session_start();

    // twitteroauth の読み込み
    require "../vendor/autoload.php";
    use Abraham\TwitterOAuth\TwitterOAuth;

    //Twitterのコンシュマーキー(APIキー)等読み込み
    define('TWITTER_API_KEY', 'pKyR8QKI3tsLPVvVGeQX2hbCU');//Consumer Key (API Key)
    define('TWITTER_API_SECRET', 'Iy3PBOQMxrU0HWRxPfL8j74lWNQcDflUTUQb2U5NI5N7swAsZd');//Consumer Secret (API Secret)

    define('CALLBACK_URL', 'http://127.0.0.1:8080/cookie_login/callback.php');//登録したコールバックURL

    //「abraham/twitteroauth」ライブラリのインスタンスを生成し、Twitterからリクエストトークンを取得する
    $connection = new TwitterOAuth(TWITTER_API_KEY, TWITTER_API_SECRET, $access_token, $access_token_secret);
    $request_token = $connection->oauth('oauth/request_token', array('oauth_callback' => CALLBACK_URL));

    //リクエストトークンはコールバックページでも利用するためセッションに格納しておく
    $_SESSION['oauth_token'] = $request_token['oauth_token'];
    $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];

    //Twitterの認証画面のURL
    $oauthUrl = $connection->url('oauth/authorize', array('oauth_token' => $request_token['oauth_token']));

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
    <a href="<?php echo $oauthUrl; ?>"><img src=”images/signin_button.png” alt="twitter_button"></a>
  </div>

</body>
</html>
