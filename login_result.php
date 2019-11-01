<?php
require_once('config.php');
session_start();
ini_set('display_errors', 0);
?>

<!DOCTYPE html>
<html lang="ja">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,initial-scale=1.0">
   <link rel="stylesheet" href="c.css">
   <title>Login</title>
 </head>
 <body>
   <h2>ログイン</h2><br>
<?php
//DB内でPOSTされたメールアドレスを検索
try {
  $pdo = new PDO(DSN, DB_USER, DB_PASS);
  $stmt = $pdo->prepare('select * from userDeta where username = ?');
  $stmt->execute([$_POST['username']]);
  $row = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (\Exception $e) {
  echo $e->getMessage() . PHP_EOL;
}
//emailがDB内に存在しているか確認
if (!isset($row['username'])) {
  echo 'そのユーザは登録されていません';
  print <<<EOH
  <input type="button"class="square_btn2" onclick="location.href='./menu.php'" value="ログイン画面に戻る">;
EOH;
  return false;
}
//パスワード確認後sessionにメールアドレスを渡す
if (password_verify($_POST['password'], $row['password'])) {
  session_regenerate_id(true); //session_idを新しく生成し、置き換える
  $_SESSION['USERNAME'] = $row['username'];
  echo "ようこそ！{$_SESSION['USERNAME']}さん";
  echo '<br>';
  echo 'ログインしました';
  echo '<br>';
  print <<<EOH
  <input type="button"class="square_btn2" onclick="location.href='./menu.php'" value="メニューに戻る">
EOH;

} else {
  echo 'パスワードが間違っています。';
  print <<<EOH
   <input type="button"class="square_btn2" onclick="location.href='./menu.php'" value="ログイン画面に戻る">
EOH;
  return false;
}
?>
 </body>
