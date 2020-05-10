<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>新規登録</title>
</head>
<body>
<?php 

try{
$member_name=$_POST['name'];
$member_email=$_POST['email'];
$member_pass=$_POST['pass'];

//安全対策
$member_name=htmlspecialchars($member_name,ENT_QUOTES,'UTF-8');
$member_email=htmlspecialchars($member_email,ENT_QUOTES,'UTF-8');
$member_pass=htmlspecialchars($member_pass,ENT_QUOTES,'UTF-8');

$dsn='mysql:dbname=cookie_site;host=db;';
$user='root';
$password='root_password';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

//sqlでデータを挿入
$sql='INSERT INTO members (name,email,password,created_date,updated_date) VALUES (?,?,?,current_timestamp,current_timestamp)';
$stmt=$dbh->prepare($sql);
$data[]=$member_name;
$data[]=$member_email;
$data[]=$member_pass;
$stmt->execute($data);

//切断
$dbh=null;

print '新規登録完了しました。<br>';
print '<br>';

}catch (Exception $e){
    print 'ただいま障害により大変ご迷惑をおかけしております。';
    exit();
}
?>
<a href="cookie_login.php"> ログイン画面へ</a>
</body>
</html>