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

$pro_code = $_POST["code"];
$pro_gazou_name = $_POST['gazou_name'];

try{
$stmt = $dbh->prepare('DELETE FROM mst_product WhERE code = ?');
$stmt->execute([$pro_code]); 

if($pro_gazou_name != ""){
    unlink('./gazou/'.$pro_gazou_name);
}

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
    <a href="pro_list.php">戻る</a>
</body>
</html>