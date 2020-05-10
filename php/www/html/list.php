<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>

<?php
require("common.php");
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

</body>
</html>
