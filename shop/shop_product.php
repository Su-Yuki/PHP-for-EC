<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false){
    print 'ようこそゲスト様　<br />';
    print '<a href="member_login.html">ログイン画面へ</a>';
    print '<br />';    
} else {
    print 'ようこそ';
    print '$_SESSION["member_name"]';
    print '様';
    print '<a href="member_logout.php">ログアウト</a>';
    print '<br />';    
}

require_once('../common/dbconnect.php');
require_once('../common/function.php');

try{
    $pro_code = $_GET['procode'];

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
        $disp_gazou='<img src="../product/gazou/'.$pro_gazou_name.'">';
    }
    print '<a href="shop_cartin.php?procode='.$pro_code.'">カートに入れる</a><br /><br />';

} catch(Exception $e) {
    echo 123;
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
    aaaa
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
