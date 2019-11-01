<?php
session_start();
include './methods.php';
session_check();
 ?>
<!DOCTYPE html>
<html>
<head>

	<meta charset="UTF-8">
	  <meta name="viewport" content="width=device-width,initial-scale=1.0">
    <link rel="stylesheet" href="c.css">
		<body>
		<id="top"><h2>Edit Mode</h2>
<?php
$link = new mysqli("157.112.147.201", "teruto725_d","teruto725", "teruto725_tango");
$link->set_charset('utf8');
$user = $_SESSION['USERNAME'];
$c =0 ;
while ($c<$_POST['count']){
  $edit =$_POST["edit$c"];
  $del =$_POST["del$c"];
  $eng =$_POST["eng$c"];
  $jap =$_POST["jap$c"];
  $diff =$_POST["diff$c"];
  $con =$_POST["con$c"];
  $lasteng = $_POST["lasteng$c"];
  if($del == 1){
    $sql = ' DELETE FROM tango WHERE english = \'' . $lasteng . '\' AND username = \'' . $user . '\'';
    $result = mysqli_query($link, $sql);
  }
  else if($edit == 1){
    $sql = ' UPDATE tango SET english = \''. $eng . '\', japanese = \'' . $jap . '\', difficult =' . $diff . ' WHERE english = \'' . $lasteng . '\' AND username = \'' . $user . '\'';
    $result = mysqli_query($link, $sql);
  }
    $c += 1;
}
edit_table();
?>
<br>
<br>
<input type="button"class="square_btn" onclick="location.href='./reset.php'" value="Reset All Difficulty Level">
<br>
<br>
<br>
<input type="button"class="square_btn2" onclick="location.href='./menu.php'" value="Back To Menu">

</body>
</html>
