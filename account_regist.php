<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント登録</title>
</head>
<body>
    <!-- <form name="form1" action="login_act.php" method="post">
        ID:<input type="text" name="uid"><br>
        PW:<input type="password" name="upw"><br>
        <input type="submit" value="LOGIN">
    </form> -->

    <div class="form-wrapper">
        <h1>アカウント登録</h1>
        <form name="form1" action="account_regist_act.php" method="post">
        <div class="form-item">
                <label for="uname"></label>
                <input type="uname" name="uname" required="required" placeholder="Your Name"></input>
            </div>
            <div class="form-item">
                <label for="uid"></label>
                <input type="uid" name="uid" required="required" placeholder="Your ID"></input>
            </div>
            <div class="form-item">
                <label for="upw"></label>
                <input type="password" name="upw" required="required" placeholder="Password"></input>
            </div>
            <div class="form-item">
                <label for="upw2"></label>
                <input type="password" name="upw2" required="required" placeholder="Password_reinput"></input>
            </div>
            <div class="button-panel">
                <input type="submit" class="button" title="LOGIN" value="LOGIN"></input>
            </div>
        </form>
    </div>



</body>
</html>