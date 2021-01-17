<?php
//共通
require_once('../common/dbconnect.php');
require_once('../common/function.php');

//データ受け取り
$pro_code = $_POST["code"];
$pro_name = $_POST["name"];
$pro_price = $_POST["price"];

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
    // var_dump(preg_match('/¥A[0-9]+¥z/', $pro_price) == 0);exit;
    print "価格は半角数字で入力してください";
} else {
    print "価格";
    print $pro_price;
    print "円<br />";
}

if($pro_name == '' || preg_match('/^[0-9]+$/', $pro_price)==0){
    print "<form>";
    print '<input type="button" onclick="history.back()" value="戻る">';
    print "</form>";
} else {
    print "上記のように変更します";
    print '<form method="post" action="pro_edit_done.php">';
    print '<input type="hidden" name="code" value="'.h($pro_code).'">';
    print '<input type="hidden" name="name" value="'.h($pro_name).'">';
    print '<input type="hidden" name="price" value="'.h($pro_price).'">';
    print '<br />';
    print '<input type="button" onclick="history.back()" value="戻る">';
    print '<input type="submit" value="OK">';
    print '</form>';

}

?>
