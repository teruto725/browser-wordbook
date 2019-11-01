<?php
session_start();
include './methods.php';
session_check();
?>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="c.css" />
  <title> メニューパネル</title>
</head>
 <body>

   <br>
   <h1>ブラウザ英単語帳</h1>
   <br>
<?php
  echo "ようこそ！ {$_SESSION['USERNAME']} さん！";
  echo "<br>";
  echo "編集モードが新しくなりました";
?>
   <br>
   <br>
<input type="button" class="square_btn" onclick="location.href='./touroku.html'" value="登録モード">
<input type="button" class="square_btn" onclick="location.href='./view.php'" value="編集モード">
<input type="button" class="square_btn" onclick="location.href='./hukusyu.html'" value="復習モード">
<br>
<br>
<input type="button" class="square_btn2" onclick="location.href='./logout.php'" value="ログアウト">


</body></html>
