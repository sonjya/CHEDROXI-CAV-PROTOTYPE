<?php

session_start();

include "dbconnection.php";

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "select userID,roleDesc from tbl_users a inner join tbl_roles b where a.roleID=b.roleID and username='$username' and password='$password' and a.active='YES'";
$result = mysqli_query($connection,$sql);
$fetch=mysqli_fetch_assoc($result);

if (!$fetch) {
    $_SESSION['error_message'] = "Invalid credentials";
    header('Location:../index.php');
} else {
    if ($fetch['roleDesc'] === 'ADMINISTRATOR') {
        $_SESSION['UID'] = $fetch['userID'];
        header('Location:../pages/admin/index.php');
    } else if ($fetch['roleDesc'] === 'PROCESSOR') {
        die("ADMINISTRATOR PAGE");
    } else if ($fetch['roleDesc'] === 'VALIDATOR') {
        die("ADMINISTRATOR PAGE");
    } else if ($fetch['roleDesc'] === 'CASHIER') {
        $_SESSION['UID'] = $fetch['userID'];
        header('Location:../pages/cashier/index.php');
    }else {
        unset($_SESSION['error_message']);
        $_SESSION['UID'] = $fetch['userID'];
        header('Location:../pages/client/index.php');
    }
}

?>