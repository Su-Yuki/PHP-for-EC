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
        print '<a herf="shop_product.php?procode"="'.$rec['code'].'">';
        print $rec["name"]."----";
        print $rec["price"]."円";
        print"<br />";
        
    }

    print '<input type="submit" name="disp" value="参照">';
    print '<input type="submit" name="add" value="追加">';
    print '<input type="submit" name="edit" value="修正">';
    print '<input type="submit" name="delete" value="削除">';
    print '</form>';
    print '<br />';
    print '<a href="../staff_login/staff_top.php">トップメニューへ</a>';
} catch(Exception $e) {
    print "ただいま障害により大変ご迷惑をおかけしております。";
    exit;
}

?>