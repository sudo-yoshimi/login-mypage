<?php

mb_internal_encoding("utf8");
session_start();

if(isset($_SESSION['id'])){
    header("Location:mypage.php");
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログインエラー</title>
    <link rel="stylesheet" href="login_error.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg" alt="logo">
        <div class="login"><a href="login.php">ログイン</a></div>
    </header>

    <main>
        <form action="mypage.php" method="post">
            <div class="contents">
               <div class="error">
                   メールアドレスまたはパスワードが間違っています。
               </div>
                <div class="mail">
                    <label>メールアドレス</label><br>
                    <input type="text" class="form" name="mail" size="40" required><br>
                </div>
                <div class="password">
                    <label>パスワード</label><br>
                    <input type="password" class="form" name="password" size="40" pattern="^[a-zA-Z0-9]{6,}$" required><br>
                </div>
            </div>
                
                <div class="logincheck">
                    <label><input type="checkbox" class="form" name="keep" value="keep" size="40" >ログイン状態を保持する</label>
                </div>
                <div class="login_button">
                    <input type="submit" size="35" class="button" value="ログイン" >
                </div>
            
        </form>

    </main>
    <footer>
        © 2018 InterNous.inc. All rights reserved
    </footer>
</body>

</html>
