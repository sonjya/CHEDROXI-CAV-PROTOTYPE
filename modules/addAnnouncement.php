<?php

require_once "dbconnection.php";

$description = $_POST['announcementtext'];

$sql = "insert into tbl_announcements values (0,'$description',now(),'yes')";

try {
    mysqli_query($connection,$sql);
    header('location:admin-viewannouncements-route.php');
} catch (exception $e) {
    header('location:admin-viewannouncements-route.php');
}



?>