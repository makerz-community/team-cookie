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
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<?php
require("../common.php");
?>

  <table><tbody>
   <tr><th>名前</th></tr>
	 <?php foreach ($stmt as $row){ ?>
	<tr>
	<td><?=htmlspecialchars($row['name'], ENT_QUOTES)?></td>
	<td><a href=""=<?=htmlspecialchars($row['name'], ENT_QUOTES)?>>詳細ページ</a></td>
	</tr>
  <?php } ?>
</tbody></table>

<!-- 切断処理 -->
<?php
 $dbh = null;
?>

<a href="cookie_logout.php">ログアウト</a><br>

</body>
</html>