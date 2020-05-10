<?php

// 　　データと接続
$dsn = 'mysql:dbname=cookie_site;host=db';
$user = 'root';
$password = 'root_password';
$dbh = new PDO($dsn,$user,$password);
$dbh->query('SET NAMES utf8');
// 　　　SQLの指令文
$stmt = $dbh->prepare("SELECT*FROM members");
$stmt->execute();

?>
