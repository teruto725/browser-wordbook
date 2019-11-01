<!DOCTYPE html>
<html lang="ja">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,initial-scale=1.0">
   <link rel="stylesheet" href="c.css">
   <title>Account Registration</title>
 </head>
 <body>
   	<id="top"><h2>Account Registration</h2>
<?php
require_once('config.php');
//データベースへ接続、テーブルがない場合は作成
try {
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  $pdo->exec("create table if not exists userDeta(
      id int not null auto_increment primary key,
      username varchar(255),
      password varchar(255),
      created timestamp not null default current_timestamp
    )");
} catch (Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
//POSTのValidate。
$username = $_POST['username'];

//パスワードの正規表現
if (preg_match('/\A(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,100}+\z/i', $_POST['password'])) {
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
} else {
  echo 'Set the password using at least 8 characters including 1 or more half-width alphanumeric characters.';
  print <<<EOH
  <br>
  <input type="button"class="square_btn2" onclick="location.href='./regist.php'" value="Back to Account Registration Page">
EOH;
  return false;
}
//登録処理
try {
  $stmt = $pdo->prepare("insert into userDeta(username, password) value(?, ?)");
  $stmt->execute([$username, $password]);
  echo 'Registered correctly!';
  print <<<EOH
  <br>
  Press the button below to log in.
  <input type="button"class="square_btn2" onclick="location.href='./login.html'" value="Go to Login Page">
EOH;
} catch (\Exception $e) {
  echo 'The username is already in use.';
  print <<<EOH
  <br>
  <input type="button"class="square_btn2" onclick="location.href='./regist.php'" value="Back to Account Registration Page">
EOH;
}
?>
</body>
</html>
