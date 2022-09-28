<?php

require_once "dbconnection.php";

$schoolid = $_GET['id'];

$sql = "update tbl_messages set status=0 where messagefrom='$schoolid'";

try {
    mysqli_query($connection,$sql);
    header("location:../pages/shared/viewMessage.php?id='$schoolid'");
} catch(exception $e) {
    header("location:../pages/shared/viewMessage.php?id='$schoolid'");
}






?>