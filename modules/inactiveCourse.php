<?php 

require_once 'dbconnection.php';

$id = $_GET['id'];

$sql = "UPDATE tbl_courses set active='no' where courseid=$id";

try {
    mysqli_query($connection,$sql);
    echo "<script> alert('COURSE HAS BEEN SET TO INACTIVE');window.location.href='../pages/client/pages/viewCourses.php'; </script>";
} catch(exception $e){
    echo "<script> alert('UPDATE ERROR');window.location.href='../pages/client/pages/viewCourses.php'; </script>";
}




?>