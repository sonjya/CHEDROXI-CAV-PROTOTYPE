<?php

require_once "dbconnection.php";

$messageid = $_POST['mid'];
$schoolid = $_POST['schoolid'];
$reply = $_POST['reply'];

$sql = "insert into tbl_message_replies values (0,'$messageid','$schoolid','$reply',now())";

try {
    mysqli_query($connection,$sql);
    header("location:../pages/admin/pages/viewMessageDetail.php?id=$messageid");
} catch(exception $e) {
    echo "error";
}


?>