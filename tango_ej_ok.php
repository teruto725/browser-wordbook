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
$lastword =  array('eng'=> $_POST['lasteng'],'jap'=>$_POST['lastjap']);
diff_ok($lastword);
$word = sec_diff_word($lastword);
$lastword = print_tangopanel_ej($word);
print_button_ej($lastword);
?>
</body>
<br><br><br>
<br>
<input type="button"class="square_btn2" onclick="location.href='./menu.php'" value="メニューに戻る">

</html>
