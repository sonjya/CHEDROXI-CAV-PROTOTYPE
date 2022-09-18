<?php

session_start();

require_once 'dbconnection.php';

$referencenumber = $_POST['referencenumber'];
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$middlename = $_POST['middlename'];
$fullname = $lastname . ', ' . $firstname . ' ' . $middlename;
$priceid = $_POST['price'];

$sql = "insert into tbl_payments values (0,'$referencenumber',UPPER('$fullname'),'$priceid','yes')";

try {
    mysqli_query($connection,$sql);
    echo "<script> alert('PAYMENT SUCCESSFUL');window.location.href='../pages/cashier/index.php'; </script>";
} catch (exception $e){
    echo "<script> alert('PAYMENT ERROR');window.location.href='../pages/cashier/index.php'; </script>";
}


?>