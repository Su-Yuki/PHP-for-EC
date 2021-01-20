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
// var_dump($_POST['staffcode']);

try{
    $staff_code = $_GET['staffcode'];

    $stmt = $dbh->prepare('SELECT name FROM mst_staff WHERE code = ? ');
    $data[] = $staff_code;// var_dump($data);
    $stmt->execute($data);

    $rec = $stmt->fetch(PDO::FETCH_ASSOC);// var_dump($rec);
    $staff_name = $rec['name'];// var_dump($rec['name']);


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
    <p>スタッフ情報</p>
    <?php print $staff_code;?>
    <br>
    <p>スタッフ名</p>
    <?php print $staff_name; ?>
    <br>
    <form>
        <input type="button" onclick="history.back()" value="戻る">
    </form>
</body>
</html>
