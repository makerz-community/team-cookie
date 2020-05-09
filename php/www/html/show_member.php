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
$id = $_POST['id'];
$rec = $stmt->fetch(PDO::FETCH_ASSOC);
$name = $rec['name'];
$email = $rec['email'];
?>
  <div class="container">
      <h2>メンバー情報</h2>
      <p>id:<?php echo $id; ?></p>
      <p>名前:<?php echo $name; ?></p>
      <p>メール:<?php echo $email; ?></p>
      <input type="button" onclick="history.back()" value="back">
  </div>
</body>
</html>
