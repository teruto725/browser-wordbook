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

//日本語表示
echo "<div id = \"jap\">";
echo "<h2>" . $lastword['jap'] . "</h2>";
echo "</div>";

//正解不正解判定
if($_POST['lasteng'] == $_POST['ans']){
  echo "GOOD！<br>";
  diff_ok($lastword);
}
else {
  echo "BAD！<br>";
  echo "Your answer:{$_POST['ans']}<br>";
  echo "Correct answer　:{$_POST['lasteng']}<br>";
  diff_bad($lastword);
}
print <<<EOH
<br><br>
<form  action="tango_je.php" method="post">
  <br><br>
EOH;
echo "<input type=\"hidden\" name=\"lasteng\" value=\"" . $lastword['eng']. "\">";
echo "<input type=\"hidden\" name=\"lastjap\" value=\"" . $lastword['jap']. "\">";
echo "<input type=\"submit\" class=\"square_btn\" value=\"Next!\">";
echo "</form>";

?>
</body>
<body>
	<br><br><br>
 <input type="button"class="square_btn2" onclick="location.href='./menu.php'" value="Back To Menu">
</body>
</html>
