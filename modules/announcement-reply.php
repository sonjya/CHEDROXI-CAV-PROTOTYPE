<?php

require_once "dbconnection.php";

$announcementid = $_POST['announcementid'];
$schoolid = $_POST['schoolid'];
$reply = $_POST['reply'];

$sql = "insert into tbl_announcement_replies values(0,$schoolid,$announcementid,'$reply',now())";

try {
    mysqli_query($connection,$sql);
    header("location:../pages/client/index.php");
} catch(exception $e){
    header("location:../pages/client/index.php");
}

?>