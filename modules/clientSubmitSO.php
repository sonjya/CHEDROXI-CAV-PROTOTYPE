<?php

include 'dbconnection.php';

if(isset($_POST['submit']) && !empty($_FILES['requestletter']['name'])) {

    $dir = '../files/';

    $fileName1 = $_FILES['requestletter']['name'];
    move_uploaded_file($_FILES['requestletter']['tmp_name'],$dir . $fileName1);

    $fileName2 = $_FILES['indorsementletter']['name'];
    move_uploaded_file($_FILES['indorsementletter']['tmp_name'],$dir . $fileName2);

    $fileName3 = $_FILES['tor']['name'];
    move_uploaded_file($_FILES['tor']['tmp_name'],$dir . $fileName3);

    $fileName4 = $_FILES['diploma']['name'];
    move_uploaded_file($_FILES['diploma']['tmp_name'],$dir . $fileName4);
}

$schoolID = $_POST['schoolID'];
$firstName = $_POST['firstname'];
$middleName = $_POST['middlename'];
$lastName = $_POST['lastname'];
$courseID = $_POST['course'];
$applicationType = $_POST['typeofapplication'];
$mode = $_POST['modeofstudy'];
$SOnumber = $_POST['SOnumber'];
$graduationDate = $_POST['dateofgraduation'];
$syStarted = $_POST['datestarted'];
$syEnded = $_POST['dateended'];
$documentType = $_POST['applicationtype'];
$requestLetter = $fileName1;
$indorsementLetter = $fileName2;
$tor = $fileName3;
$diploma = $fileName4;

$sql = "INSERT INTO tbl_process VALUES
(0,
$schoolID,
'$firstName',
'$middleName',
'$lastName',
$courseID,
'$applicationType',
'$mode',
'',
'$graduationDate',
'$syStarted',
'$syEnded',
'$documentType',
'$requestLetter',
'$indorsementLetter',
'$tor',
'$diploma',
null,
'',
'',
null,
'Pending',
'',
'Yes')";

mysqli_query($connection,$sql);
header('Location:../pages/client/index.php');

?>