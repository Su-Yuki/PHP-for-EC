<?php
require_once('dbconnect.php');
require_once('function.php');

$staff_name = $_POST["name"];
$staff_pass = $_POST["pass"];

// DBへのデータ保存
try{
$stmt = $dbh->prepare('INSERT INTO mst_staff(name, password) VALUES (?, ?)');
$stmt->execute([$staff_name, $staff_pass]);//?を変数に置き換えてSQLを実行

print "$staff_name さんを追加しました。";
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
    <a href="staff_list.php">戻る</a>
</body>
</html>