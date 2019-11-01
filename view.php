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
		<id="top"><h2>編集モード</h2>
    <p>単語を編集する際は編集ボックスにチェックを入れ、表の変更個所を直接書き換えたのち「変更を反映」してください</p>
    <p>単語を削除する際は削除ボックスにチェックを入れ、「変更を反映」してください</p>

<?php
edit_table();
?>
<br>
<br>
<br>
<input type="button"class="square_btn" onclick="location.href='./reset.php'" value="単語難易度をリセットする">
<br>
<br>
<br>
<input type="button"class="square_btn2" onclick="location.href='./menu.php'" value="メニューに戻る">

</body>
</html>
