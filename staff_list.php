<?php
require_once('dbconnect.php');
require_once('function.php');

// DBへのデータ保存
try{
    $stmt = $dbh->prepare('SELECT code, name FROM mst_staff WHERE 1 ');
    $stmt->execute();//?を変数に置き換えてSQLを実行

    print "スタッフ一覧<br /><br />";

    print "<form method='post' action='staff_edit.php' ></form>";
    while(true){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec == false){
        break;
        }
        print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
        print $rec["name"];
        print"<br />";
        
    }

    print '<input type="submit">';
    print '</form>';
} catch(Exception $e) {
    print "ただいま障害により大変ご迷惑をおかけしております。";
    exit;
}

?>