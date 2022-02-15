<?php
    try {
        //ID:'root', Password: 'root'
        $pdo = new PDO('mysql:dbname=sugoroku;charset=utf8;host=localhost','root','root');
    } catch (PDOException $e) {
        exit('DBConnectError:'.$e->getMessage());
    }

    //ゲームのボード取得
    $stmt = $pdo->prepare("SELECT * FROM boad_table");
    $status = $stmt->execute();
    $boad_all=0;
    while($boad_table[] = $stmt->fetch(PDO::FETCH_ASSOC)){
        $boad_all += 1;
    }
    //echo $boad_all;


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
    
    <title>Game</title>

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
                        

            <form method="POST" action="next_sample.php" id="saikoro">
                <label><input type="text" name="goal" value="<?= $boad_all-1; ?>"></label><br>
                <label><input type="text" name="position" value="<?= $position; ?>"></label><br>
                <input type="radio" name="dice" value="0" id="zero">
                    <label class="s_result" for="zero">0</label>
                <input type="radio" name="dice" value="1" id="one" checked>
                    <label class="s_result" for="one">1</label><br>

                <button id="next" type="submit">1マス進む</button>
            </form>

            <form method="POST" action="next_sample.php" id="saikoro">
                <label><input type="text" name="goal" value="<?= $boad_all-1; ?>"></label><br>
                <label><input type="text" name="position" value="1"></label><br>
                <input type="radio" name="dice" value="0" id="zero" checked>
                    <label class="s_result" for="zero">0</label>
                <input type="radio" name="dice" value="1" id="one">
                    <label class="s_result" for="one">1</label><br>

                <button id="next" type="submit">リセット</button>
            </form>


            <button onclick="location.href='./login.php'" class="initial_button">ログイン</button>
        </div>

        <div class="right_main">
            <table class="game_table">
                <!-- <tr><th>マス</th><th>内容</th></tr> -->
                <?php
                    $table_header = '<tr><th>マス</th><th>内容</th><th>あなた</th></tr>';

                    //var_dump($user_table);
                    // for($u=0;$u<$user_all;$u++){
                    //     //echo '$u->'.$u.'user_name'.$user_table[$u]["user_name"].'<br>';

                    //     $table_header = $table_header.'<th>'.$user_table[$u]["user_name"].'</th>';
                    // }
                    // $table_header = $table_header.'</tr>';
                    echo $table_header;

                    $line = "";
                    for($i=0;$i<$boad_all;$i++){
                        if($i == $position - 1){
                            //echo "<tr class='table_config'><td>{$boad_table[$i]["id"]}</td><td>{$boad_table[$i]["text"]}</td><td></td><td></td></tr>";
                            $line = "<tr class='table_config'><td>{$boad_table[$i]["id"]}</td><td>{$boad_table[$i]["text"]}</td>";
                        }
                        else{
                            //echo "<tr><td>{$boad_table[$i]["id"]}</td><td>{$boad_table[$i]["text"]}</td><td></td><td></td></tr>";
                            $line = "<tr><td>{$boad_table[$i]["id"]}</td><td>{$boad_table[$i]["text"]}</td>";
                        }

                        //for($u=0;$u<$user_all;$u++){
                            if($i == $position-1){
                                $line = $line."<td>●</td>";
                            }
                            else{
                                $line = $line."<td></td>";
                            }
                        //}
                        
                        echo $line."</tr>";
                    }
                ?>

            </table>
        </div>
    </main>

    <script>
        $(".s_result").css("display","none");
        $("input[type='radio']").css("display","none");

        let stop_status = <?= $stop_status; ?>;
        let saikoro_result = 0;

        let elements = document.getElementsByName("dice");
        //console.log(elements);
        elements[1].checked = true ;

        // if(stop_status == 1){
        //     $("#saikoro").css("display","none");
        //     $("#saikoro_result").css("display","none");
        //     let elements = document.getElementsByName("dice");
        //     //console.log(elements);
        //     elements[saikoro_result].checked = true ;
        // }

        // if(stop_status == 0){
        //     $("#stop").css("display","none");
        //     $("#saikoro").on("click", function(){
        //         saikoro_result = Math.ceil(Math.random() * 6);
        //         //console.log(saikoro_result);
        //         $("#s_result").empty();
        //         $("#s_result").append(saikoro_result);

        //         let elements = document.getElementsByName("dice");
        //         //console.log(elements);
        //         elements[saikoro_result].checked = true ;
        //     })
        // }

    </script>
</body>
</html>