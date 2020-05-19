<?php

try
{
  // 入力データの受け取り、安全対策
  $member_email=$_POST['email'];
  $member_pass=$_POST['pass'];

  $member_email=htmlspecialchars($member_email,ENT_QUOTES,'UTF-8');
  $member_pass=htmlspecialchars($member_pass,ENT_QUOTES,'UTF-8');

  $member_pass=md5($member_pass);

  // データベースと接続
  $dsn = 'mysql:dbname=cookie_site;host=db;';
  $user = 'root';
  $password = 'root_password';
  $dbh=new PDO($dsn,$user,$password);
  $dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

  // sqlでデータを取り出す
  $sql='SELECT name FROM members WHERE email=? AND password=?';
  $stmt=$dbh->prepare($sql);
  $data[]=$member_email;
  $data[]=$member_pass;
  $stmt->execute($data);

  // 切断
  $dbh=null;

  // stmtから取り出す
  $rec=$stmt->fetch(PDO::FETCH_ASSOC);

  if($rec==false)
  {
    print 'emailかパスワードが間違っています<br>';
    print '<a href="cookie_login.php">戻る</a>';
  }
  else
  {
    // ユーザー認証
    session_start();
    $_SESSION['login']=1;
    $_SESSION['member_email']=$member_emal;
    $_SESSION['member_name']=$rec['name'];
    header('Location:cookie_top.php');
    exit();
  }

}
catch(Exception $e)
{
  print 'ただいま障害により大変ご迷惑をおかけしております。';
  exit();
}