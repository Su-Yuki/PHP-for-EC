<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false){
    print 'ログインされていません。<br />';
    print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}

require_once('dbconnect.php');
require_once('function.php');

$post = sanitize($_POST);
$staff_code = $post["code"];
$staff_name = $post["name"];
$staff_pass = $post["pass"];

try{
$stmt = $dbh->prepare('UPDATE mst_staff SET name = ?, password = ? WHERE code = ?');
$stmt->execute([$staff_name, $staff_pass, $staff_code]); 

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