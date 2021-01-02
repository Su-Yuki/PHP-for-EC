<?php
require_once('dbconnect.php');
require_once('function.php');

// DBへのデータ保存
try{
    $stmt = $dbh->prepare('SELECT name FROM mst_staff WHERE 1 ');
    $stmt->execute();//?を変数に置き換えてSQLを実行

    print "スタッフ一覧<br /><br />";

    while(true){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec == false){
        break;
        }
        print $rec["name"];
        print"<br />";
        
    }
} catch(Exception $e) {
    print "ただいま障害により大変ご迷惑をおかけしております。";
    exit;
}

?>