<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false){
    print 'ログインされていません。<br />';
    print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}

//共通
require_once('../common/dbconnect.php');
require_once('../common/function.php');

$pro_name = $_POST["name"];
$pro_price = $_POST["price"];
$pro_gazou_name = $_POST["gazou_name"];

// DBへのデータ保存
try{
$stmt = $dbh->prepare('INSERT INTO mst_product (name, price, gazou) VALUES (?, ?, ?)');
$stmt->execute([$pro_name, $pro_price, $pro_gazou_name]);

print "$pro_name を追加しました。";
} catch(Exception $e){
    print 'エラーが発生しました';
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="pro_list.php">戻る</a>
</body>
</html>