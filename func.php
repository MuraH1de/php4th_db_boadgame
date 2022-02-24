<?php

function connect_db(){
    try {
        //ID:'root', Password: 'root'
        $pdo = new PDO('mysql:dbname=sugoroku;charset=utf8;host=localhost','root','root');
        return $pdo;
    } catch (PDOException $e) {
        exit('DBConnectError:'.$e->getMessage());
    }
}

function initial_check(){
    if($_SESSION['chk_ssid'] != session_id()){
        exit('LOGIN ERROR');
    }else{
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id(); 
    }
}






?>