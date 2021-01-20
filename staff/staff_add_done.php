<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false){
    print 'ログインされていません。<br />';
    print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}

require_once('../common/dbconnect.php');
require_once('../common/function.php');

$staff_name = $_POST["name"];
$staff_pass = $_POST["pass"];

// DBへのデータ保存
try{
$stmt = $dbh->prepare('INSERT INTO mst_staff(name, password) VALUES (?, ?)');
$stmt->execute([$staff_name, $staff_pass]);

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