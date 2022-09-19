<?php

require_once 'dbconnection.php';

$schoolid = $_POST['schoolid'];
$coursedesc = $_POST['coursedesc'];
$active = 'yes';

$sql = "INSERT INTO tbl_courses VALUES (0,$schoolid,'$coursedesc','$active')";

try {
    mysqli_query($connection,$sql);
    echo "<script> alert('COURSE ADDED');window.location.href='../pages/client/pages/viewCourses.php'; </script>";
} catch (exception $e) {
    echo "<script> alert('UNABLE TO ADD COURSE: DUPLICATE COURSE TITLE');window.location.href='../pages/client/pages/viewCourses.php'; </script>";
}



?>