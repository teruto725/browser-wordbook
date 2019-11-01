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
    <p>When editing a word, check the "edit" box, rewrite the change part of the table directly, and push "Reflect change"</p>
    <p>When removing a word, check the "remove" box and push "Apply changes"</p>

<?php
edit_table();
?>
<br>
<br>
<br>
<input type="button"class="square_btn" onclick="location.href='./reset.php'" value="Reset All Difficulty Level">
<br>
<br>
<br>
<input type="button"class="square_btn2" onclick="location.href='./menu.php'" value="Back To Menu">

</body>
</html>
