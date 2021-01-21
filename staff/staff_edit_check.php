<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['login'])==false){
    print 'ログインされていません。<br />';
    print '<a href="../staff_login/staff_login.html">ログイン画面へ</a>';
    exit();
}

//共通
require_once('../common/dbconnect.php');
require_once('../common/function.php');

//データ受け取り
$post = sanitize($_POST);
$staff_code = $post["code"];
$staff_name = $post["name"];
$staff_pass = $post["pass"];
$staff_pass2 = $post["pass2"];

$staff_name = htmlspecialchars($staff_name, ENT_QUOTES, 'UTF-8');
$staff_pass = htmlspecialchars($staff_pass, ENT_QUOTES, 'UTF-8');
$staff_pass2 = htmlspecialchars($staff_pass2, ENT_QUOTES, 'UTF-8');

if($staff_name == ''){
    print "スタッフ名が入力されていません。";
} else {
    print "スタッフ名";
    print $staff_name;
    print "<br />";

}

if($staff_pass == ''){
    print "パスワードが入力されていません。";
}

if($staff_pass != $staff_pass2){
    print "パスワードが一致していません。";
}

if($staff_name == '' || $staff_pass == '' || $staff_pass != $staff_pass2){
    print "<form>";
    print '<input type="button" onclick="history.back()" value="戻る">';
    print "</form>";
} else {
    $staff_pass = md5($staff_pass);
    print '<form method="post" action="staff_edit_done.php">';
    print '<input type="hidden" name="code" value="'.h($staff_code).'">';
    print '<input type="hidden" name="name" value="'.h($staff_name).'">';
    print '<input type="hidden" name="pass" value="'.h($staff_pass).'">';
    print '<br />';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="OK">';

}

?>
