<?php
    
    try {
        //ID:'root', Password: 'root'
        $pdo = new PDO('mysql:dbname=sugoroku;charset=utf8;host=localhost','root','root');
    } catch (PDOException $e) {
        exit('DBConnectError:'.$e->getMessage());
    }

    $stmt = $pdo->prepare("SELECT * FROM boad_table");
    $status = $stmt->execute();
    $boad_all=0;
    while($boad_table[] = $stmt->fetch(PDO::FETCH_ASSOC)){
        $boad_all += 1;
    }
    //echo $boad_all;

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Number Select</title>

    <!-- <link rel="stylesheet" href="css/reset.css"> -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<main>
    <div class="left_main">
        <h1>すごろくスタート！</h1>

        <div class="initial">
            <h2>何人で遊びますか？</h2>

            <form method="POST" action="number_update.php">
                <!-- <input type="hidden" name="boad_all" value="<?php echo $boad_all; ?>"> -->
                <div class="select_number">
                    <!-- <legend>フリーアンケート</legend>
                    <label>名前：<input type="text" name="name"></label><br>
                    <label>Email：<input type="text" name="email"></label><br>
                    <label><textArea name="content" rows="4" cols="40"></textArea></label><br> -->
                    <select name="number">
                        <option value="">-</option>
                        <?php 
                            for($n=1;$n<=30;$n++){
                                echo "<option value='{$n}'>{$n}</option>";
                            }
                        ?>
                        <!-- <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option> -->
                    </select> 人で遊びます。
                    
                    <input type="submit" value="GO">
                </div>
            </form>
        </div>
    </div>

    <div class="right_main">
        <table class="game_table">
            <tr><th>マス</th><th>内容</th></tr>
            <?php
                for($i=0;$i<$boad_all;$i++){
                    echo "<tr><td>{$boad_table[$i]["id"]}</td><td>{$boad_table[$i]["text"]}</td></tr>";
                }
            ?>

        </table>
    </div>
</main>
</body>
</html>