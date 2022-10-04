<?php

require_once 'dbconnection.php';

$id = $_POST['id'];
$preparedby = $_POST['preparedby'];
$ornumber = $_POST['ornumber'];
$commissionerID = $_POST['commissioner'];

$sql = "update tbl_process set preparedby='$preparedby',status='Processing',ornumber='$ornumber',commissionerid=$commissionerID,updated_at=now(),updatedby='$preparedby' where id = $id";

//getting the HEI email and name using process id
$sql1 = "select emailaddress,concat(a.firstname,' ',a.lastname) as fullname from tbl_users a inner join tbl_user_school b inner join tbl_process c where a.userid=b.userid and b.schoolid=c.schoolid and c.id=$id limit 1;";
try {
    $result1 = mysqli_fetch_assoc(mysqli_query($connection,$sql1));
    $email = $result1['emailaddress'];
    $fullname = $result1['fullname'];
    $message = "Good day! $fullname, the application you submitted has been accepted and is now processing for validation. Thank you!";
    header("location:sendEmail.php?emailaddress=$email&fullname=$fullname&message=$message");
} catch (exception $e) {
    echo $e;
}

try {
    mysqli_query($connection,$sql);
    echo "<script> alert('FILE ACCEPTED');window.location.href='admin-viewfiles-route.php'; </script>";
} catch (exception $e) {
    echo "<script> alert('ERROR');window.location.href='admin-viewfiles-route.php'; </script>";
}



?>