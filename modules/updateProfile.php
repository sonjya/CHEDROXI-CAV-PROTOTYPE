<?php

include "dbconnection.php";

$UID = $_POST['id'];
$currentpassword = $_POST['password'];

$auth = validatePassword($UID, $currentpassword);

$newpassword1 = $_POST['newpassword1'];
$newpassword2 = $_POST['newpassword2'];

if ($auth == false) {
    echo "<script> alert('INCORRECT PASSWORD');window.location.href='javascript:history.go(-1)'; </script>";
} elseif ($auth == true) {
    if($newpassword1 == $newpassword2) {
        updateProfile($UID);
    } else {
        echo "<script> alert('NEW PASSWORD NOT MATCH');window.location.href='javascript:history.go(-1)'; </script>";
    }
}

//validating password
function validatePassword($UID, $currentpassword) {

    include "dbconnection.php";
    
    $id = $UID;
    $pass = $currentpassword;

    $sql = "select count(userid) as users from tbl_users where userid='$id' and password='$pass'";
    $result = mysqli_query($connection,$sql);
    $fetch = mysqli_fetch_assoc($result);

    if ($fetch['users'] == 0) {
        return false;
    } else {
        return true;
    }
    

}

function updateProfile($UID) {
    
    include "dbconnection.php";

    $id = $UID;
    $lastname = $_POST['lastname'];
    $firstname = $_POST['firstname'];
    $username = $_POST['username'];
    $newpassword = $_POST['newpassword1'];

    $sql = "update tbl_users set firstname=upper('$firstname'),lastname=upper('$lastname'),username='$username',password='$newpassword' where userid='$id'";
    mysqli_query($connection,$sql);
    echo "<script> alert('USER PROFILE HAS BEEN UPDATED: LOGGING OUT');window.location.href='logout.php'; </script>";
}

?>