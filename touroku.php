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
<id="top"><h2>登録モード</h2>
登録したい単語を入力してください
<?php

$eng=$_POST['english'];
$jp=$_POST['japanese'];
$df = 0;
$con = 2;
$user = $_SESSION['USERNAME'];
if(!$_POST['japanese'] || !$_POST['english']){exit("入力されていない項目があります");}
$data = htmlspecialchars("$eng, $jp, $df, $con,$user");
	$data = str_replace("\n","", $data) . "\n";
	$link = new mysqli("157.112.147.201", "teruto725_d","teruto725", "teruto725_tango");

if (mysqli_connect_errno()) {
echo mysqli_connect_errno();
}
$link->set_charset('utf8');
/*重複チェック
$sql = "SELECT number FROM abstract WHERE number=$number";
$result = mysqli_query($link, $sql);
if ( mysqli_num_rows($result) > 0 ) {*/
$sql = "INSERT INTO tango( english, japanese,difficult, count,username) VALUES (\"$eng\", \"$jp\", \"$df\", \"$con\",\"$user\") ";
	if ( !mysqli_query($link, $sql) ) {
		echo "error";
	}
	if( !mysqli_close($link) ) {
		error('切断に失敗しました。');
	}
echo "単語 $eng を登録しました";
echo "<br>";
echo "<br>";
	print<<<EOH
<form action="touroku.php" method="post">
<input type="text" name="english" placeholder="英語"><br>
<input type="text" name="japanese" placeholder="日本語"><br>
<input type="submit" class="square_btn" value="登録">
</form>
EOH;
echo "<br>";
echo "<br>";
print_all();

function error($str){
	echo $str;
}


//表示
function print_all(){
	$user = $_SESSION['USERNAME'];
	$link = new mysqli("157.112.147.201", "teruto725_d","teruto725", "teruto725_tango");

	$link->set_charset('utf8');

	$sql = "SELECT english,japanese,difficult,count,username FROM tango where username = '$user' ORDER BY english asc ";
	$result = mysqli_query($link, $sql);
	if (!$result) {
		error('SELECTクエリに失敗しました。<br>SQL文：'.$sql.'<br>'.mysqli_error($link));
	}
	print ("登録単語一覧");
	echo "<TABLE border='1' >";
	echo "<TR>";
	echo "<TD>英語";
	echo "</TD>";
	echo "<TD>日本語";
	echo "</TD>";
	echo "</TR>";
	while ($row = mysqli_fetch_assoc($result)){//１ループで１行データが取り出され、データが無くなるとループを抜けます。
		echo "<TR>";
		echo "<TD>" . $row{'english'};
		echo "</TD>";
		echo "<TD>" . $row{'japanese'};
		echo "</TD>";
		echo "</TR>";
	}
	echo "</TABLE>";
	if( !mysqli_close($link) ) {
		error('切断に失敗しました。');
	}
}
?>
</body>
<body>
 <input type="button"class="square_btn2" onclick="location.href='./menu.php'" value="メニューに戻る">
</body>
</html>
