<?php
session_start();
session_regenerate_id(true);
if(isset($_SESSION['member_login'])==false){
    print 'ようこそゲスト様　<br />';
    print '<a href="member_login.html">ログイン画面へ</a>';
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

$cart = $_SESSION['cart'];
$kazu = $_SESSION['kazu'];
$max = count($cart);

try{

    foreach($cart as $key => $val):
    $stmt = $dbh->prepare('SELECT name, price, gazou FROM mst_product WHERE code = ? ');
    $data[0] = $val;
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);

    $pro_name[] = $rec['name'];
    $pro_price[] = $rec['price'];
    if($rec['gazou']==''){
        $pro_gazou[]='';
    } else {
        $pro_gazou[] = '<img src="../product/gazou/'.$rec['gazou'].'">';
    }
    endforeach;

} catch(Exception $e) {
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
    <form action="kazu_change.php" method="POST">
        <?php for($i=0; $i < $max; $i++){?>
        <?php print $pro_name[$i]; ?>
        <?php print $pro_gazou[$i]; ?>
        <?php print $pro_price[$i].'円'; ?>
        <input type="text" name="kazu<?php print $i; ?>" value="<?php print $kazu[$i] ?>">
        <?php print $pro_price[$i] * $kazu[$i]; ?>円
        <?php print '<br />'; ?>
        <?php } ?>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="hidden" name="max" value="<?php print $max; ?>">
        <input type="submit" value="数量変更"><br />
    </form>
</body>
</html>
