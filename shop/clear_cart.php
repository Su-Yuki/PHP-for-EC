<?php
session_start();
$_SESSION=array();
if (isset($_COOKIE[session_name()])==true){
    setcookie(session_name(), '', time() -42000, '/');//クッキーから削除
}
session_destroy();//サーバーとの関係を断ち切る
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>カートを空にしました</p>
</body>
</html>