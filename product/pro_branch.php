<?php
if(isset($_POST['disp'])==true){
    if(isset($_POST['pro__code'])==false){
        header('Location:pro_ng.php');
        exit();
    }
    $pro__code = $_POST['pro_code'];
    header('Location:pro_disp.php?pro_code='.$pro__code);
    exit();
}


if(isset($_POST['add'])==true){
    header('Location:pro_add.php');
    exit();
}

if(isset($_POST['edit'])==true){
    if(isset($_POST['pro_code'])==false){
        header('Location:pro_ng.php');
        exit();
    }
    $pro__code = $_POST['pro_code'];
    header('Location:pro_edit.php?pro_code='.$pro__code);
    exit();
}

if(isset($_POST['delete'])==true){
    if(isset($_POST['pro_code'])==false){
        header('Location:pro_ng.php');
        exit();
    }
    $pro__code = $_POST['pro_code'];
    header('Location:pro_delete.php?pro_code='.$pro__code);
    exit();
}

?>