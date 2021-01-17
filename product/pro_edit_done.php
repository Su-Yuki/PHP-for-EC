<?php
require_once('../common/dbconnect.php');
require_once('../common/function.php');

$pro_code = $_POST["code"];
$pro_name = $_POST["name"];
$pro_price = $_POST["price"];

// DBへのデータ保存
try{
$stmt = $dbh->prepare('UPDATE mst_product SET name=?, price=? WHERE code=?');
$stmt->execute([$pro_name, $pro_price, $pro_code]);//?を変数に置き換えてSQLを実行

print "修正しました";
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