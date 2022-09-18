<?php

require_once 'dbconnection.php';

$id = $_POST['id'];
$preparedby = $_POST['preparedby'];
$paymentid = $_POST['paymentid'];

$sql = "update tbl_process set preparedby = '$preparedby',status='Accepted',paymentid='$paymentid' where id = $id";
$sql2 = "update tbl_payments set active='no' where paymentid=$paymentid";

try {
    mysqli_query($connection,$sql);
    mysqli_query($connection,$sql2);
    echo "<script> alert('FILE ACCEPTED');window.location.href='../pages/admin/index.php'; </script>";
} catch (exception $e) {
    echo "<script> alert('ERROR');window.location.href='../pages/admin/index.php'; </script>";
}



?>