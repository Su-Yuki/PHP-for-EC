<?php
require_once('dbconnect.php');
require_once('function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>スタッフ追加</title>
</head>
<body>
    <h1>スタッフ追加</h1>
    <form action="staff_add_check.php" method="POST">
        <!-- スタッフ追加 -->
        <p>スタッフ名を入力してください</p>
        <label for="name">スタッフ名</label>
        <input type="text" name="name" style="width:200px">    
        <br>
        <br>
        <!-- PW入力 -->
        <p>パスワードを入力してください</p>
        <label for="pass">パスワード</label>
        <input type="password" name="pass" style="width:200px">
        <br>
        <br>
        <!-- PW入力 -->
        <p>パスワードをもう一度入力してください</p>
        <label for="pass2">パスワード</label>
        <input type="password" name="pass2" style="width:200px">
        <br>
        <br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>
</body>
</html>