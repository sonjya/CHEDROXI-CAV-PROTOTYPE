<?php

require_once "dbconnection.php";

$itemdesc = $_POST['itemdesc'];
$price = $_POST['price'];

$sql = "insert into tbl_prices values (0,'$itemdesc','$price','yes')";

try {
    mysqli_query($connection,$sql);
    echo "<script> alert('NEW DOCUMENT PRICE HAS BEEN ADDED');window.location.href='admin-viewprices-route.php?search='; </script>";
} catch (exception $e) {
    echo "<script> alert('ERROR ADDING PRICES');window.location.href='admin-viewprices-route.php?search='; </script>";
}

?>