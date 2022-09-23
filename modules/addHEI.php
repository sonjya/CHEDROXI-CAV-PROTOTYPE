<?php

require_once 'dbconnection.php';

$id = 0;
$schooldesc = $_POST['schooldesc'];
$schoolcity = $_POST['schoolcity'];
$active = 'yes';

$sql = "insert into tbl_schools values (0,'$schooldesc','$schoolcity','yes')";

try {
    mysqli_query($connection,$sql);
    echo "<script> alert('NEW HEI ADDED');window.location.href='admin-viewschools-route.php?search='; </script>";
} catch(exception $e) {
    echo "<script> alert('ERROR ADDING NEW HEI');window.location.href='../pages/admin/pages/addSchool.php'; </script>";
}

?>