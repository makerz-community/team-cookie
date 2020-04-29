<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false)
{
  print 'ログインされていません。<br>';
  print'<a href="cookie_login.html">ログイン画面へ</a>';
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
</head>
<body>
  
（仮）トップページです。
<!-- 実際はkaeruさんのトップページ -->
<br>
<a href="cookie_logout.php">ログアウト</a><br>

</body>
</html>