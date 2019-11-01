<?php
session_start();
include './methods.php';
session_check();
?>
<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	  <meta name="viewport" content="width=device-width,initial-scale=1.0">
	  <link rel="stylesheet" type="text/css" href="c.css" />
</head>
<body>
<?php
$lastword =  array('eng'=> " ",'jap'=>" ");
$word = array('eng'=> "",'jap'=>"");
$word = sec_diff_word($lastword);//表示する単語
$lastword = print_tangopanel_ej($word);//単語パネル表示
print_button_ej($lastword);//ボタン部分表示

?>
</body>
<body>
	<br><br><br>
 <input type="button"class="square_btn2" onclick="location.href='./menu.php'" value="メニューに戻る">
</body>
</html>
