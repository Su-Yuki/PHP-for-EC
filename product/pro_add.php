<?php
require_once('../common/dbconnect.php');
require_once('../common/function.php');

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>商品追加</title>
</head>
<body>
    <h1>商品追加</h1>
    <form action="pro_add_check.php" method="POST">
        <!-- 追加 -->
        <p>商品名を入力してください</p>
        <label for="name">商品名</label>
        <input type="text" name="name" style="width:200px">    
        <br>
        <br>
        <!-- 入力 -->
        <p>価格を入力してください</p>
        <label for="price">価格</label>
        <input type="text" name="price" style="width:50px">
        <br>
        <br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>
</body>
</html>