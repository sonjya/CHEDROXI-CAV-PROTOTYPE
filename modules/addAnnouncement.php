<?php

require_once "dbconnection.php";

$description = $_POST['announcementtext'];

$sql = "insert into tbl_announcements values (0,'$description',now(),'yes')";

try {
    mysqli_query($connection,$sql);
    echo "<script> alert('ANNOUNCEMENT ADDED');window.location.href='admin-viewannouncements-route.php'; </script>";
} catch (exception $e) {
    echo "<script> alert('ERROR ADDING ANNOUNCEMENT');window.location.href='admin-viewannouncements-route.php'; </script>";
}



?>