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
$pro_code = $post["code"];
$pro_name = $post["name"];
$pro_price = $post["price"];
$pro_gazou_name_old = $post['gazou_name_old'];
$pro_gazou = $_FILES['gazou'];

$pro_code= htmlspecialchars($pro_code, ENT_QUOTES, 'UTF-8');
$pro_name = htmlspecialchars($pro_name, ENT_QUOTES, 'UTF-8');
$pro_price= htmlspecialchars($pro_price, ENT_QUOTES, 'UTF-8');

if($pro_name == ''){
    print "商品名が入力されていません。";
} else {
    print "商品名";
    print $pro_name;
    print "<br />";

}

if(preg_match('/^[0-9]+$/', $pro_price) == 0){
    print "価格は半角数字で入力してください";
} else {
    print "価格";
    print $pro_price;
    print "円<br />";
}

if($pro_gazou['size'] > 0){
    if($pro_gazou['size'] > 1000000){
        print "画像が大きすぎます";
    } else {
        move_uploaded_file($pro_gazou['tmp_name'],'./gazou/'.$pro_gazou['name']);
        print '<img src="./gazou/'.$pro_gazou['name'].'">';
        print "<br />";
    }
}

if($pro_name == '' || preg_match('/^[0-9]+$/', $pro_price)==0 || $pro_gazou['size'] > 1000000){
    print "<form>";
    print '<input type="button" onclick="history.back()" value="戻る">';
    print "</form>";
} else {
    print "上記のように変更します";
    print '<form method="post" action="pro_edit_done.php">';
    print '<input type="hidden" name="code" value="'.h($pro_code).'">';
    print '<input type="hidden" name="name" value="'.h($pro_name).'">';
    print '<input type="hidden" name="price" value="'.h($pro_price).'">';
    print '<input type="hidden" name="gazou_name" value="'.$pro_gazou['name'].'">';
    print '<input type="hidden" name="gazou_name_old" value="'.$pro_gazou_name_old.'">';
    print '<br />';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="OK">';
    print '</form>';

}

?>
