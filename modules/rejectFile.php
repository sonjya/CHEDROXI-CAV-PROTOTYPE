<?php 

require_once 'dbconnection.php';

$id = $_GET['id'];
$user = $_GET['user'];

$sql = "update tbl_process set status='Rejected',updatedby='$user',updated_at=now() where id='$id'";

try {
    mysqli_query($connection,$sql);
    echo "<script> alert('FILE REJECTED');window.location.href='admin-viewfiles-route.php'; </script>";
} catch (exception $e) {
    echo "<script> alert('ERROR');window.location.href='admin-viewfiles-route.php'; </script>";
}



?>