<?php

require_once "dbconnection.php";

$id = $_GET['id'];

$sql = "update tbl_announcements set active='no' where id='$id'";

try {
    mysqli_query($connection,$sql);
    header('location:admin-viewannouncements-route.php');
} catch (exception $e) {
    header('location:admin-viewannouncements-route.php');
}

?>