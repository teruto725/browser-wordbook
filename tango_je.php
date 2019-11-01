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
$word = sec_diff_word($lastword);//表示する単語

//表示
echo "<div id = \"eng\">";
echo "<h2>" . $word['jap'] . "</h2>";
echo "</div>";
print <<<EOH
<br><br>
<form  action="tango_je_result.php" method="post">
  <label for="ans">English Spell</label>
	<input type="ans" name="ans">
  <br><br>
EOH;
echo "<input type=\"hidden\" name=\"lasteng\" value=\"" . $word['eng']. "\">";
echo "<input type=\"hidden\" name=\"lastjap\" value=\"" . $word['jap']. "\">";
echo "<input type=\"submit\" class=\"square_btn\" value=\"Check!\">";
echo "</form>"
?>
</body>
<body>
	<br><br><br>
 <input type="button"class="square_btn2" onclick="location.href='./menu.php'" value="Back To Menu">
</body>
</html>
