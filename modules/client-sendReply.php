<?php

require_once "dbconnection.php";

$messageid = $_POST['mid'];
$schoolid = $_POST['schoolid'];
$reply = $_POST['reply'];

$sql = "insert into tbl_message_replies values (0,'$messageid','$schoolid','$reply',now(),1)";
$sql2 = "update tbl_messages set active=1 where id=$messageid";

try {
    mysqli_query($connection,$sql);
    mysqli_query($connection,$sql2);
    header("location:../pages/client/pages/viewMessageDetails.php?id=$messageid");
} catch(exception $e) {
    echo $e;
}


?>