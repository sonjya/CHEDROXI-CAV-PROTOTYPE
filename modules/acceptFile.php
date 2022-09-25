<?php

require_once 'dbconnection.php';

$id = $_POST['id'];
$preparedby = $_POST['preparedby'];
$ornumber = $_POST['ornumber'];
$commissionerID = $_POST['commissioner'];

$sql = "update tbl_process set preparedby='$preparedby',status='Processing',ornumber='$ornumber',commissionerid=$commissionerID,updated_at=now(),updatedby='$preparedby' where id = $id";

try {
    mysqli_query($connection,$sql);
    echo "<script> alert('FILE ACCEPTED');window.location.href='admin-viewfiles-route.php'; </script>";
} catch (exception $e) {
    echo "<script> alert('ERROR');window.location.href='admin-viewfiles-route.php'; </script>";
}



?>