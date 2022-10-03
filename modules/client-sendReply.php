<?php

require_once "dbconnection.php";

$messageid = $_POST['mid'];
$schoolid = $_POST['schoolid'];
$reply = $_POST['reply'];

$sql = "insert into tbl_message_replies values (0,'$messageid','$schoolid','$reply',now(),1)";

try {
    mysqli_query($connection,$sql);
    header("location:../pages/client/pages/viewMessageDetails.php?id=$messageid");
} catch(exception $e) {
    echo $e;
}


?>