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

$post = sanitize($_POST);
$pro_code = $post["code"];
$pro_name = $post["name"];
$pro_price = $post["price"];
$pro_gazou_name_old = $post['gazou_name_old'];
$pro_gazou_name = $post['gazou_name'];

// DBへのデータ保存
try{
$stmt = $dbh->prepare('UPDATE mst_product SET name=?, price=?, gazou=? WHERE code=?');
$stmt->execute([$pro_name, $pro_price, $pro_gazou_name, $pro_code]);

if($pro_gazou_name_old != $pro_gazou_name){
    if($pro_gazou_name_old != ""){
        unlink('./gazou/'.$pro_gazou_name_old);
    }
}

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