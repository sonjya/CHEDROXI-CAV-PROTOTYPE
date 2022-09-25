<?php

require_once "dbconnection.php";

$id = $_GET['id'];
$validator = $_GET['validator'];

$sql = "update tbl_process set reviewedby='$validator',status='Validated',updated_at=now(),updatedby='$validator' where id='$id'";

try {
    mysqli_query($connection,$sql);
    echo "<script> alert('FILE VALIDATED');window.location.href='../pages/admin/pages/viewFileDetails.php?id=$id'; </script>";
} catch (exception $e) {
    echo "<script> alert('ERROR VALIDATING');window.location.href='../pages/admin/pages/viewFileDetails.php?id=$id'; </script>";
}


?>