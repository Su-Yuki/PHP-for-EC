<?php
require_once('../common/dbconnect.php');
require_once('../common/function.php');

try{
    $pro_code = $_GET['pro_code'];

    $stmt = $dbh->prepare('SELECT name, price, gazou FROM mst_product WHERE code = ? ');
    $data[] = $pro_code;
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $pro_name = $rec['name'];
    $pro_price = $rec['price'];
    $pro_gazou_name_old = $rec['gazou'];

} catch(Exception $e) {
    exit();
}

if($pro_gazou_name_old==""){
    $disp_gazou = "";
} else {
    $disp_gazou='<img src="./gazou/'.$pro_gazou_name_old.'">';
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
    <p>商品修正</p>
    <br>
    <?php print $pro_code;?>
    <br>
    <br>
    <form action="pro_edit_check.php" enctype="multipart/form-data" method="POST">
        <input type="hidden" name="code" value="<?php echo $pro_code; ?>">
        <input type="hidden" name="gazou_name_old" value="<?php print $pro_gazou_name_old; ?>">
        <p>商品名</p>
        <input type="text" name="name" style="width:200px" value="<?php echo $pro_name?>">
        <br>
        <p>価格</p>
        <input type="text" name="price" style="width: 100px" value="<?php echo $pro_price?>">円
        <br>
        <?php print $disp_gazou; ?>
        <p>画像を選んでください</p>
        <input type="file" name="gazou" style="width: 400px" >
        <br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>
</body>
</html>
