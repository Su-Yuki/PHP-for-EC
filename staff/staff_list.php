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

// DBへのデータ保存
try{
    $stmt = $dbh->prepare('SELECT code, name FROM mst_staff WHERE 1 ');
    $stmt->execute();//?を変数に置き換えてSQLを実行

    print "スタッフ一覧<br /><br />";

    print "<form method='post' action='staff_branch.php' >";
    while(true){
        $rec = $stmt->fetch(PDO::FETCH_ASSOC);
        if($rec == false){
        break;
        }
        print '<input type="radio" name="staffcode" value="'.$rec['code'].'">';
        print $rec["name"];
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