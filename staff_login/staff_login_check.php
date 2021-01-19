<?php
//共通
require_once('../common/dbconnect.php');
require_once('../common/function.php');

$staff_code = h($_POST['code']);
$staff_pass = h($_POST['pass']);

$staff_pass = md5($staff_pass);

try{
    $stmt = $dbh->prepare('SELECT name FROM mst_staff WHERE code = ? AND password = ?');
    $stmt->execute([$staff_code, $staff_pass]);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    if($rec == false){
        print 'スタッフコードが間違っています。<br />';
        print '<a href="staff_login.html"></a>';
    } else {
        session_start();
        $_SESSION['login'] = 1;
        $_SESSION['staff_code'] = $staff_code;
        $_SESSION['staff_name'] = $rec['name'];
        header('Location:staff_top.php');
        exit();
    }

    } catch(Exception $e){
    print 'エラーが発生しました';
    exit();
}
