<!DOCTYPE html>
<html lang="ja">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width,initial-scale=1.0">
   <link rel="stylesheet" href="c.css">
   <title>Regist</title>
 </head>
 <body>
   	<id="top"><h2>アカウント登録</h2>
   <form action="regist_result.php" method="post">
     <label for="username">username</label>
     <input type="username" name="username">
     <br>
     <label for="password">password</label>
     <input type="password" name="password">
     <br>
     <button type="submit" class="square_btn2">Sign Up!</button>

     <p>※パスワードは半角英数字をそれぞれ１文字以上含んだ、８文字以上で設定してください。</p>
   </form>
 </body>
</html>
