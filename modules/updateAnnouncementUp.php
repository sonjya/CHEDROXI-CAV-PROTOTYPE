<?php

require_once "dbconnection.php";

$id = $_GET['id'];

$sql = "update tbl_announcements set active='yes' where id='$id'";

try {
    mysqli_query($connection,$sql);
    echo "<script> alert('ANNOUNCEMENT UPLOADED');window.location.href='admin-viewannouncements-route.php'; </script>";
} catch (exception $e) {
    echo "<script> alert('ERROR UPLOADING ANNOUNCEMENT');window.location.href='admin-viewannouncements-route.php'; </script>";
}

?>