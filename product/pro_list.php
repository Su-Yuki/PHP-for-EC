<?php
require_once('../common/dbconnect.php');
require_once('../common/function.php');

// DBへのデータ保存
try{
    $stmt = $dbh->prepare('SELECT code, name, price FROM mst_product WHERE 1 ');
    $stmt->execute();//?を変数に置き換えてSQLを実行

    print "商品一覧<br /><br />";

    print "<form method='post' action='pro_branch.php' >";
    while(true){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec == false){
        break;
        }
        print '<input type="radio" name="pro_code" value="'.$rec['code'].'">';
        print $rec["name"]."----";
        print $rec["price"]."円";
        print"<br />";
        
    }

    print '<input type="submit" name="disp" value="参照">';
    print '<input type="submit" name="add" value="追加">';
    print '<input type="submit" name="edit" value="修正">';
    print '<input type="submit" name="delete" value="削除">';
    print '</form>';
} catch(Exception $e) {
    print "ただいま障害により大変ご迷惑をおかけしております。";
    exit;
}

?>