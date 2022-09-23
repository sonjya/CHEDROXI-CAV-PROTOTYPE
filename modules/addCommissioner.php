<?php

require_once "dbconnection.php";

$fullname = $_POST['fullname'];
$position = $_POST['position'];

$sql = "insert into tbl_commissioners values (0,upper('$fullname'),'$position','yes')";

try {
    mysqli_query($connection,$sql);
    echo "<script> alert('ADDED NEW COMMISSIONER');window.location.href='admin-viewcommissioners-route.php?search='; </script>";
} catch (exception $e) {
    echo "<script> alert('ERROR ADDING NEW COMMISSIONER');window.location.href='admin-viewcommissioners-route.php?search='; </script>";
}





?>