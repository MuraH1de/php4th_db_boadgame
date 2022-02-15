<?php
    //1. POSTデータ取得
    $goal = $_POST['goal'];
    $dice = $_POST['dice'];
    $position = $_POST['position'];
    //echo $goal.'<br>';
    //echo $dice.'<br>';

    //2. DB接続します
    try {
        //ID:'root', Password: 'root'
        $pdo = new PDO('mysql:dbname=sugoroku;charset=utf8;host=localhost','root','root');
    } catch (PDOException $e) {
        exit('DBConnectError:'.$e->getMessage());
    }

    $position = $position + $dice;
    $goal = $goal - $dice;

    $stmt = $pdo->prepare('UPDATE sample_table SET position = :position, goal = :goal WHERE id = 1');

    $stmt->bindValue(':position', $position, PDO::PARAM_INT);
    $stmt->bindValue(':goal', $goal, PDO::PARAM_INT);
    // hiddenで受け取ったidをbindValueを用いて「安全かチェック」をする＝SQLインジェクション対策
    $status = $stmt->execute(); //実行
    echo 'test';
    
    if ($status === false) {
        sql_error($stmt);
    } else {
        header("Location: index.php");
        exit;
    }

