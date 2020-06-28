<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>新規登録</title>
</head>
<body>
新規登録<br>
<br>
<form method="post" action="add_check.php" enctype="multipart/form-data">
氏名<br>
<input type="text" name="name"><br>
メールアドレス<br>
<input type="email" name="email"><br>
パスワードを入力してください。<br>
<input type="password" name="pass"><br>
パスワードをもう一度入力してください。<br>
<input type="password" name="pass2"><br>
アイコンをアップロードしてください<br>
<input type="file" name="image" style="width: 400px;"><br>
<br>
<input type="submit" value="確認">
</form>
</body>
</html>