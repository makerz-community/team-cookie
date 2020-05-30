<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
  print 'ログインされていません。<br>';
  print'<a href="cookie_login.php">ログイン画面へ</a>';
  exit();
}
else
{
  print $_SESSION['member_name'];
  print 'さんログイン中<br>';
  print '<br>';
}

?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>（仮）cookie</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>
  
<h2>（仮）トップページ</h2>
<!-- 実際はkaeruさんのトップページ -->
<a href="cookie_logout.php">ログアウト</a><br>

</body>
</html>