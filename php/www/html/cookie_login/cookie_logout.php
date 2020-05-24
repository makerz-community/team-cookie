<?php
session_start();
$_SESSION=array();
if(isset($_COOKIE[session_name()])==true)
{
  setcookie(session_name(),'',time()-42000,'/');
}
session_destroy();
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>（仮）cookie</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

  <p>ログアウトしました。</p>
  <a href="cookie_login.php">ログイン画面へ</a>
  
</body>
</html>