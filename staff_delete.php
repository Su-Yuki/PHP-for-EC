<?php
require_once('dbconnect.php');
require_once('function.php');

try{
    $staff_code = $_GET['staffcode'];

    $stmt = $dbh->prepare('SELECT name FROM mst_staff WHERE code = ? ');
    $data[] = $staff_code;
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);
    $staff_name = $rec['name'];


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
    <p>スタッフ削除</p>
    <br>
    <?php print $staff_code;?>
    <br>
    <p>スタッフ名</p>
    <?php print $staff_name;?>
    <p>このスタッフを削除してもよろしいですか</p>
    <br>
    <form action="staff_delete_done.php" method="POST">
        <input type="hidden" name="code" value="<?php echo $staff_code; ?>">
        <p>スタッフ名</p>
        <input type="text" name="name" style="width:200px" value="<?php echo $staff_name?>">
        <br>
        <p>パスワードを入力してください</p>
        <input type="password" name="pass" style="width: 100px">
        <br>
        <p>パスワードをもう一度入力してください</p>
        <input type="password" name="pass2" style="width: 100px">
        <br>
        <input type="button" onclick="history.back()" value="戻る">
        <input type="submit" value="OK">
    </form>
</body>
</html>
