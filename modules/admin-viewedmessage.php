<?php

require_once "dbconnection.php";

$schoolid = $_GET['id'];

$sql = "update tbl_messages set active=0 where schoolid='$schoolid'";

try {
    mysqli_query($connection,$sql);
    echo "<script>window.close();</script>";
} catch(exception $e) {
    echo "<script>window.close();</script>";
}


?>