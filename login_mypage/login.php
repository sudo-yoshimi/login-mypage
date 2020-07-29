<?php

session_start();

if(isset($_SESSION['password'])){
    header("Location:mypage.php");
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>ログインページ</title>
    <link rel="stylesheet" href="login.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg" alt="logo">
        <div class="login"><a href="login.php">ログイン</a></div>
    </header>

    <main>
        <form action="mypage.php" method="post">
            <div class="contents">
                <div class="mail">
                    <label>メールアドレス</label><br>
                    <input type="text" class="form" name="mail" size="40" value="<?php if(isset($_COOKIE['mail'])){
                    echo $_COOKIE['mail'];
                    } ?>" required><br>
                </div>
                <div class="password">
                    <label>パスワード</label><br>
                    <input type="password" class="form" name="password" size="40" value="<?php if(isset($_COOKIE['keep'])){
                    echo $_COOKIE['password'];
                    } ?>" pattern="^[a-zA-Z0-9]{6,}$" required><br>
                </div>

                <div class="logincheck">
                    <label for="keep">
                        <input type="checkbox" name="keep" value="keep" <?php if(isset($_COOKIE['keep'])){
                        echo "checked='checked'";
                        }
                        ?>>ログイン状態を保持する
                    </label><br>
                </div>
                <div class="loginb">
                <input type="submit" class="button" value="ログイン">
                </div>
            </div>
        </form>

    </main>
    <footer>
        © 2018 InterNous.inc. All rights reserved
    </footer>
</body>

</html>
