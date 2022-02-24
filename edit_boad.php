<?php
    //session_start();
    require_once('func.php');
    //initial_check();

    //1.対象のIDを取得
    $id = $_POST['number'];
    $bonus = $_POST['bonus'];
    $stop_status = $_POST['stop_status'];
    $text = $_POST['text'];

    //echo "GET->".$id."<br>";

    //2.DB接続します
    $pdo = connect_db();



    //更新
    $stmt = $pdo->prepare("UPDATE boad_table SET bonus = :bonus, stop_status = :stop_status, text = :text WHERE id = :id");
    $stmt->bindValue(':id', $id, PDO:: PARAM_INT);
    $stmt->bindValue(':bonus', $bonus, PDO:: PARAM_INT);
    $stmt->bindValue(':stop_status', $stop_status, PDO:: PARAM_INT);
    $stmt->bindValue(':text', $text, PDO:: PARAM_STR);
    $status = $stmt->execute();



    //４．データ登録処理後
    if ($status === false) {
        sql_error($stmt);
    } else {
        header("Location: start.php");
        exit;
    }


?>