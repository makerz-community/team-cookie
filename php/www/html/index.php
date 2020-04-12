<div style="text-align: center; width: 100%; font-size: 24px;">
  こんにちは！
</div>
<br>

<?php
phpinfo();


function connect_to_db() {
  $link = mysqli_connect('db', 'root', 'root_password', 'cookie_site');

  // 接続状況をチェック
  if (mysqli_connect_errno()) {
      die("データベースに接続できません:" . mysqli_connect_error() . "\n");
  } else {
      echo "データベースへの接続に成功しました\n";
  }
}

connect_to_db();