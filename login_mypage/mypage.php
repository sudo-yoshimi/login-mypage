<?php

mb_internal_encoding("utf8");
session_start();

if(empty($_SESSION['id'])){


    try{
        $pdo = new PDO("mysql:dbname=lesson01;host=localhost;","root","root");
    }catch(PDOException $e){
        die("<p>申し訳ございません。現在サーバーが混み合っており、一時的にアクセスが出来ません。<br>
        しばらくしてから再度ログインをして下さい。<br></p>
        <a href='http://localhost/login_mypage/login.php'>ログイン画面へ</a>");
    }

    $stmt = $pdo->prepare("select * from login_mypage where mail = ? && password = ?");

    $stmt->bindValue(1,$_POST['mail']);
    $stmt->bindValue(2,$_POST['password']);


    $stmt->execute();
    $pdo = NULL;

    while($row = $stmt->fetch()){
        $_SESSION['id'] = $row['id'];
        $_SESSION['name'] = $row['name'];
        $_SESSION['mail'] = $row['mail'];
        $_SESSION['password'] = $row['password'];
        $_SESSION['picture'] = $row['picture'];
        $_SESSION['comments'] = $row['comments'];
    }


    if(empty($_SESSION['id'])){
        header("Location:login_error.php");
    }

    if(!empty($_POST['keep'])){
        $_SESSION['keep'] = $_POST['keep'];
    }
    
}

if(!empty($_SESSION['id']) && !empty($_SESSION['keep'])){
    setcookie('mail',$_SESSION['mail'],time()+60*60*24*7);
    setcookie('password',$_SESSION['password'],time()+60*60*24*7);
    setcookie('keep',$_SESSION['keep'],time()+60*60*24*7);
} elseif(empty($_SESSION['keep'])){
    setcookie('mail','',time()-1);
    setcookie('password','',time()-1);
    setcookie('keep','',time()-1);
}


?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>マイページ</title>
    <link rel="stylesheet" href="mypage.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg" alt="logo">
        <div class="login"><a href="log_out.php">ログアウト</a></div>
    </header>

    <main>
        <h2>会員情報</h2>
        <div class="hello">こんにちは！　<?php echo $_SESSION['name']?>さん</div><br>
        <div class="pic">
            <img src="<?php echo $_SESSION['picture']?>">
        </div>
        <div class="contents">
            <div class="namae">
                氏名: <?php echo $_SESSION['name']?><br>
            </div>

            <div class="meru">
                メール: <?php echo $_SESSION['mail']?><br>
            </div>

            <div class="pasu">
                パスワード: <?php echo $_SESSION['password']?><br>
            </div>
        </div>

        <div class="comments">
            <?php echo $_SESSION['comments']?>
        </div>
        <form action="mypage_hensyu.php" method="post" class="form_center">
           <input type="hidden" value="<?php echo rand(1,10);?>" name="mypage">
           <div class="button_e">
               <input type="submit" size="35" name="hensyu" class="button" value="編集する">
           </div>
            
        </form>
    </main>

    <footer>
        © 2018 InterNous.inc. All rights reserved
    </footer>
</body>

</html>
