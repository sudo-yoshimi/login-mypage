<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>会員登録</title>
    <link rel="stylesheet" type="text/css" href="register.css">
</head>

<body>
    <header>
        <img src="4eachblog_logo.jpg" alt="logo">
        <div class="login"><a href="login.php">ログイン</a></div>
    </header>

    <main>
        <form action="register_confirm.php" method="post" enctype="multipart/form-data">
            <div class="form_contents">
                <div class="name">
                    <h2>会員登録</h2>
                    <div class="name"></div>
                    <div class="hissu">必須</div><label>名前</label><br>
                    <input type="text" class="formbox" size="40" name="name" required>
                </div>

                <div class="mail">
                    <div class="hissu">必須</div><label>メールアドレス</label><br>
                    <input type="text" class="formbox" size="40" name="mail" pattern="^[a-zA-Z]{1}[0-9a-zA-Z]+[\w\.-]+@[\w\.-]+\.\w{2,}$" required>
                </div>

                <div class="password">
                    <div class="hissu">必須</div><label>パスワード（半角英数字6文字以上）</label><br>
                    <input type="password" class="formbox" size="40" name="password" id="password" pattern="^[a-zA-Z0-9]{6,}$" required>
                </div>

                <div class="password">
                    <div class="hissu">必須</div><label>パスワード確認</label><br>
                    <input type="password" class="formbox" size="40" name="confirm_password" id="confirm" oninput="ConfirmPassword(this)" required>
                </div>

                <div class="picture">
                    <label>プロフィール写真</label><br>
                    <input type="hidden" name="max_file_size" value="1000000" />
                    <input type="file" size="40" name="picture">
                </div>

                <div class="comments">
                    <label>コメント</label><br>
                    <textarea name="comments" cols="45" rows="5"></textarea>
                </div>

                <div class="toroku">
                    <input type="submit" class="submit_button" size="35" value="登録する">
                </div>
            </div>
        </form>
    </main>

    <footer>
        © 2018 InterNous.inc. All rights reserved
    </footer>

    <script>
        function ConfirmPassword(confirm) {
            var input1 = password.value;
            var input2 = confirm.value;
            if (input1 != input2) {
                confirm.setCustomValidity("パスワードが一致しません");
            } else {
                confirm.setCustomValidity("");
            }
        }
    </script>
    
</body>

</html>
