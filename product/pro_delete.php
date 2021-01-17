<?php
require_once('../common/dbconnect.php');
require_once('../common/function.php');

try{
    $pro_code = $_GET['pro_code'];

    $stmt = $dbh->prepare('SELECT name FROM mst_product WHERE code = ? ');
    $data[] = $pro_code;
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $pro_name = $rec['name'];

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
    <h3>商品削除</h3>
    <br>
    <?php print $pro_code;?>
    <p>商品名</p>
    <?php print $pro_name;?>
    <p>この商品を削除してもよろしいですか</p>
    <form action="pro_delete_done.php" method="POST">
        <input type="hidden" name="code" value="<?php echo $pro_code; ?>">
        <br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>
</body>
</html>
