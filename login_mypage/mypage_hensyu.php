<?php

mb_internal_encoding("utf8");
session_start();

if(empty($_POST['mypage'])){
    header("Location:login_error.php");
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ</title>
    <link rel="stylesheet" href="mypage_hensyu.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg">
        <div class="login"><a href="log_out.php">ログアウト</a></div>
    </header>

    <main>
        <h2>会員情報</h2>
        <div class="hello">こんにちは！　<?php echo $_SESSION['name']?>さん</div><br>

        <form action="mypage_update.php" method="post">
            <div class="pic">
                <img src="<?php echo $_SESSION['picture']?>">
            </div>
            <div class="info">
                <p>氏名: <input type="text" size="30" value="<?php echo $_SESSION['name']?>" name="name" class="name"></p>
                <p>メール: <input type="text" size="30" value="<?php echo $_SESSION['mail']?>" name="mail" class="mail"></p>
                <p>パスワード: <input type="text" size="30" value="<?php echo $_SESSION['password']?>" name="password" class="password"></p>
            </div>
            <div class="comments">
                <textarea name="comments" cols="75" rows="3"><?php echo $_SESSION['comments']?></textarea>
            </div>
            <div class="edit">
                <input type="submit" class="button" size="35" value="この内容に変更する">
            </div>
        </form>
    </main>

    <footer>
        © 2018 InterNous.inc. All rights reserved
    </footer>
</body>

</html>
