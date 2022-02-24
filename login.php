<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ログイン</title>
</head>
<body>
    <!-- <form name="form1" action="login_act.php" method="post">
        ID:<input type="text" name="uid"><br>
        PW:<input type="password" name="upw"><br>
        <input type="submit" value="LOGIN">
    </form> -->

    <div class="form-wrapper">
        <h1>ログイン</h1>
        <form name="form1" action="login_act.php" method="post">

            <div class="form-item">
                <label for="uid"></label>
                <input type="uid" name="uid" required="required" placeholder="Your ID"></input>
            </div>
            <div class="form-item">
                <label for="upw"></label>
                <input type="password" name="upw" required="required" placeholder="Password"></input>
            </div>

            <div class="button-panel">
                <input type="submit" class="button" title="LOGIN" value="LOGIN"></input>
            </div>
        </form>
        <div class="form-footer">
            <p><a href="account_regist.php">ユーザー登録</a></p>
            <p><a href="#">パスワード忘れた方はコチラ</a></p>
        </div>
    </div>



</body>
</html>