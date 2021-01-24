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

    if(isset($_SESSION['cart'])==true){
        $cart = $_SESSION['cart'];
        $kazu = $_SESSION['kazu'];
    }
    $cart[] = $pro_code;
    $kazu[] = 1;
    $_SESSION['cart'] = $cart;
    $_SESSION['kazu'] = $kazu;

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
    <br>
    <p>カートに追加しました。</p>
    <a href="shop_list.php">商品一覧に戻る</a>
</body>
</html>

