<?php

require_once "dbconnection.php";

$toID = $_POST['toID'];
$fromID = $_POST['fromID'];
$message = $_POST['message'];

$sql = "insert into tbl_messages values (0,'$fromID','$message',now(),1)";

try {
    mysqli_query($connection,$sql);
    header("location:../pages/client/pages/viewMessages.php?search=");
} catch (exception $e) {
    echo "ERROR";
}