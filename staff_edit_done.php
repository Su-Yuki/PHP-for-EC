<?php
require_once('dbconnect.php');
require_once('function.php');

$staff_code = $_POST["code"];
$staff_name = $_POST["name"];
$staff_pass = $_POST["pass"];
var_dump($staff_code);exit;

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