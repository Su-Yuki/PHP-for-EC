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
// var_dump($_POST['procode']);

try{
    $pro_code = $_GET['pro_code'];

    $stmt = $dbh->prepare('SELECT name, price, gazou FROM mst_product WHERE code = ? ');
    $data[] = $pro_code;
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $pro_name = $rec['name'];
    $pro_price = $rec['price'];
    $pro_gazou_name = $rec['gazou'];

    if($pro_gazou_name == ''){
        $disp_gazou = '';
    } else {
        $disp_gazou='<img src="./gazou/'.$pro_gazou_name.'">';
    }

} catch(Exception $e) {
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
    <p>商品コード</p>
    <?php print $pro_code;?>
    <br>
    <p>商品名</p>
    <?php print $pro_name; ?>
    <br>
    <p>価格</p>
    <?php print $pro_price; ?>
    <br>
    <p>画像</p>
    <?php print $disp_gazou; ?>
    <br>
    <form>
        <input type="button" onclick="history.back()" value="戻る">
    </form>
</body>
</html>
