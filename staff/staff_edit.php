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
    <p>スタッフ修正</p>
    <br>
    <?php print $staff_code;?>
    <br>
    <br>
    <form action="staff_edit_check.php" method="POST">
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
