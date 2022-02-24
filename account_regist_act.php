<?php

//最初にSESSIONを開始！！ココ大事！！
//session_start();

//POST値を受け取る
$uname = $_POST['uid'];
$uid = $_POST['uid'];
$upw = $_POST['upw'];
$upw2 = $_POST['upw2'];
echo $uname.'<br>';
echo $uid.'<br>';
echo $upw.'<br>';

if($upw != $upw2){
    //PW入力失敗時
    header('Location: account_regist.php');
}


//1.  DB接続します
require_once('func.php');
//initial_check();
$pdo = connect_db();

$stmt = $pdo->prepare("SELECT * FROM id_table");
$status = $stmt->execute();
$id_all=0;
while($id_table[] = $stmt->fetch(PDO::FETCH_ASSOC)){
    $id_all += 1;
    echo "マス->".$id_all."<br>";
}

$id = $id_all + 1;
//2. データ登録SQL作成
//$stmt = $pdo->prepare("INSERT INTO id_table(id, name, uid, upw, kanri_flg, lfe_flg)VALUES(:id, :name, :uid, :upw, 0, 0)");
//$stmt = $pdo->prepare("INSERT INTO id_table(id, name, uid, upw, kanri_flg, lfe_flg) VALUES(5, 'えー', 'aaaaa', 'aaaaa', 0, 0)");
echo $id.'<br>';
echo $uname.'<br>';
echo $uid.'<br>';
echo $upw.'<br>';


$stmt = $pdo->prepare("INSERT INTO id_table(id, name, uid, upw, kanri_flg, lfe_flg) VALUES(:id, :name, :uid, :upw, 0, 0)");
$stmt->bindValue(':id', $id, PDO:: PARAM_INT);
$stmt->bindValue(':name', $uname, PDO:: PARAM_STR);
$stmt->bindValue(':uid', $uid, PDO:: PARAM_STR);
$stmt->bindValue(':upw', $upw, PDO:: PARAM_STR);
$status = $stmt->execute();

echo '実行された<br>';

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    header("Location: start.php");
    exit;
}


?>