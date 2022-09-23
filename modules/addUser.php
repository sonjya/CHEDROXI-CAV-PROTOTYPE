<?php

require_once "dbconnection.php";

//for tbl_users;
$lastname = $_POST['lastname'];
$firstname = $_POST['firstname'];
$username = $_POST['username'];
$password = $_POST['password'];
$roleid = $_POST['role'];

//for tbl_user_school;
$schoolid = $_POST['school'];

$sql = "insert into tbl_users values (0,upper('$lastname'),upper('$firstname'),'$username','$password','$roleid',null,'yes')";
$sql1 = "insert into tbl_user_school values (0,(select userid from tbl_users where lastname='$lastname'),'$schoolid','yes')";

try {
    mysqli_query($connection,$sql);
    mysqli_query($connection,$sql1);
    echo "<script> alert('NEW USER HAS BEEN ADDED');window.location.href='admin-viewusers-route.php?search='; </script>";
} catch(exception $e) {
    echo "<script> alert('ERROR ADDING NEW USER');window.location.href='admin-viewusers-route.php?search='; </script>";
}


?>