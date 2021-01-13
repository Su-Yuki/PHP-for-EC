<?php
require_once('dbconnect.php');
require_once('function.php');

$staff_code = $_POST["code"];


try{
$stmt = $dbh->prepare('DELETE FROM mst_staff WhERE code = ?');
$stmt->execute([$staff_code]); 

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
    <p>削除しました</p>
    <a href="staff_list.php">戻る</a>
</body>
</html>