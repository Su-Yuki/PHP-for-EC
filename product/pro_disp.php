<?php
require_once('../common/dbconnect.php');
require_once('../common/function.php');
// var_dump($_POST['procode']);

try{
    $pro_code = $_GET['procode'];

    $stmt = $dbh->prepare('SELECT name, price FROM mst_product WHERE code = ? ');
    $data[] = $pro_code;
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $pro_name = $rec['name'];
    $pro_price = $rec['price'];

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
    <p>商品コード</p>
    <?php print $pro_code;?>
    <br>
    <p>商品名</p>
    <?php print $pro_name; ?>
    <br>
    <p>価格</p>
    <?php print $pro_price; ?>
    <br>
    <form>
        <input type="button" onclick="history.back()" value="戻る">
    </form>
</body>
</html>
