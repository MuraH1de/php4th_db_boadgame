<?php
    require_once('func.php');
    $pdo = connect_db();

    //ゲームのボード取得
    $stmt = $pdo->prepare("SELECT * FROM boad_table");
    $status = $stmt->execute();
    $boad_all=0;
    while($boad_table[] = $stmt->fetch(PDO::FETCH_ASSOC)){
        $boad_all += 1;
    }
    //echo $boad_all;
    $goal = $boad_all - 1;


    //Sampleテーブルの取得
    $stmt = $pdo->prepare("SELECT * FROM sample_table");
    $status = $stmt->execute();
    $sample[] = $stmt->fetch(PDO::FETCH_ASSOC);
    //var_dump($sample[0]);

    $position = $sample[0]["position"];
    $text = $boad_table[$position-1]["text"];

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="js/jquery-2.1.3.min.js"></script>
    
    <title>無限すごろく</title>

    <!-- <link rel="stylesheet" href="css/reset.css"> -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <main>
        <div class="left_main">

            <h1>無限すごろく</h1>

            <h2>お試し1人牛歩版です。</h2>
            <h2>ゴールまで<span id="position"><?= $boad_all-1; ?></span>マスです。</h2>
            <h2 class="result"><?= $text; ?></h2>
                        

            <form method="POST" action="next_sample.php">
                <label><input type="text" name="goal" value="<?= $goal; ?>"></label><br>
                <label><input type="text" name="position" value="<?= $position; ?>"></label><br>
                <input type="radio" name="dice" value="0" id="zero">
                    <label class ="post_number" for="zero">0</label>
                <input type="radio" name="dice" value="1" id="one" checked>
                    <label class ="post_number" for="one">1</label><br>

                <button id="index_next" type="submit">1マス進む</button>
            </form>

            <form method="POST" action="next_sample.php">
                <label><input type="text" name="goal" value="<?= $boad_all-1; ?>"></label><br>
                <label><input type="text" name="position" value="1"></label><br>
                <input type="radio" name="dice" value="0" id="zero" checked>
                    <label class ="post_number" for="zero">0</label>
                <input type="radio" name="dice" value="1" id="one">
                    <label class ="post_number" for="one">1</label><br>

                <button id="index_reset" type="submit">リセット</button>
            </form>


            <button onclick="location.href='./login.php'" class="initial_button">ログイン</button>
        </div>

        
        <div class="right_main">
            <table class="game_table">

                <?php
                    $table_header = '<tr><th>マス</th><th>内容</th><th>あなた</th></tr>';

                    echo $table_header;

                    $line = "";
                    for($i=0;$i<$boad_all;$i++){
                        if($i == $position - 1){
                            $line = "<tr class='table_config'><td>{$boad_table[$i]["id"]}</td><td>{$boad_table[$i]["text"]}</td>";
                        }
                        else{
                            $line = "<tr><td>{$boad_table[$i]["id"]}</td><td>{$boad_table[$i]["text"]}</td>";
                        }

                        if($i == $position-1){
                            $line = $line."<td>●</td>";
                        }
                        else{
                            $line = $line."<td></td>";
                        }
                        
                        echo $line."</tr>";
                    }
                ?>

            </table>
        </div>
    </main>
</body>
</html>