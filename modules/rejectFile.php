<?php 

require_once 'dbconnection.php';

$id = $_GET['id'];

$sql = "update tbl_process set status='Rejected' where id='$id'";

try {
    mysqli_query($connection,$sql);
    echo "<script> alert('FILE REJECTED');window.location.href='../pages/admin/index.php'; </script>";
} catch (exception $e) {
    echo "<script> alert('ERROR');window.location.href='../pages/admin/index.php'; </script>";
}



?>