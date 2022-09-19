<?php

$courseid = $_POST['courseid'];
$coursedesc = $_POST['newcoursedesc'];

require_once 'dbconnection.php';

$sql = "update tbl_courses set coursedesc='$coursedesc' where courseid=$courseid";

try {
    mysqli_query($connection,$sql);
    echo "<script> alert('COURSE TITLE UPDATED');window.location.href='../pages/client/pages/viewCourses.php'; </script>";
} catch (exception $e) {
    echo "<script> alert('ERROR UPDATE');window.location.href='../pages/client/pages/viewCourses.php'; </script>";
}


?>