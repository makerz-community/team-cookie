<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>新規登録</title>
</head>
<body>
<?php 
$member_name=$_POST['name'];
$member_email=$_POST['email'];
$member_pass=$_POST['pass'];
$member_pass2=$_POST['pass2'];
$member_image=$_FILES['image'];

//安全対策
$member_name=htmlspecialchars($member_name,ENT_QUOTES,'UTF-8');
$member_email=htmlspecialchars($member_email,ENT_QUOTES,'UTF-8');
$member_pass=htmlspecialchars($member_pass,ENT_QUOTES,'UTF-8');
$member_pass2=htmlspecialchars($member_pass2,ENT_QUOTES,'UTF-8');

if($member_name == ''){
    print'氏名が入力されていません。<br>';
}else{
    print '氏名：';
    print $member_name.'<br>';
}
if($member_email == ''){
    print'メールアドレスが入力されていません。<br>';
}else{
    print 'メールアドレス：';
    print $member_email;
    print '<br>';
}
if($member_pass == ''){
    print'パスワードが入力されていません。<br>';
}
if($member_pass != $member_pass2){
    print'パスワードが一致しません。<br>';
}
if($member_image['size'] > 0){
    if($member_image['size'] > 1000000) {
        print '画像サイズが大きすぎます。';
    }else {
        move_uploaded_file($member_image['tmp_name'],'./images/'.$member_image['name']);
        print '<img style="width: 50px;" src="./images/'.$member_image['name'].'">';
        print '<br>';
    }
}

if($member_name == '' || $member_email == '' || $member_pass == '' || $member_pass != $member_pass2 || $member_image['size'] > 1000000) {
    print'<form>';
    print'<input type="button" onclick="history.back()" value="戻る">';
    print'</form>';
}else{
    $member_pass = md5($member_pass);//md5→パスワードを暗号化
    print'<form method="post" action="add_done.php">';
    print'<input type="hidden" name="name" value="'.$member_name.'">';
    print'<input type="hidden" name="email" value="'.$member_email.'">';
    print'<input type="hidden" name="pass" value="'.$member_pass.'">';
    print'<input type="hidden" name="image_name" value="'.$member_image['name'].'">';
    print'<br>';
    print'<input type="button" onclick="history.back()" value="戻る">';
    print'<input type="submit" value="OK">';
    print'</form>';
}
?>
</body>
</html>