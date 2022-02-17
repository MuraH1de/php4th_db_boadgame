<?php
    session_start();

    if($_SESSION['chk_ssid'] != session_id()){
        exit('LOGIN ERROR');
    }else{
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id(); 
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Name Register</title>
</head>
<body>
    <h2>名前を登録してください。</h2>
    <form method="POST" action="user_insert.php">
        <!-- <input type="hidden" name="boad_all" value="<?php echo $boad_all; ?>"> -->
        <div class="register">
            <label>名前：<input type="text" name="name"></label>
            <input type="submit" value="送信">
        </div>
    </form>
</body>
</html>