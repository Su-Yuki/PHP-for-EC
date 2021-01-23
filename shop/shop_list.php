<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false){
    print 'ようこそゲスト様。<br />';
    print '<a href="member_login.html">会員ログイン</a>';
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

// DBへのデータ保存
try{
    $stmt = $dbh->prepare('SELECT code, name, price FROM mst_product WHERE 1 ');
    $stmt->execute();//?を変数に置き換えてSQLを実行

    print "商品一覧<br /><br />";

    while(true){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec == false){
        break;
        }
        print '<a href="shop_product.php?procode='.$rec['code'].'">';
        print $rec["name"].'----';
        print $rec["price"].'円';
        print '</a>';
        print '<br />';
    }
} catch(Exception $e) {
    print "ただいま障害により大変ご迷惑をおかけしております。";
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
    <a href="shop_cartlook.php">カートを見る</a>
</body>
</html>