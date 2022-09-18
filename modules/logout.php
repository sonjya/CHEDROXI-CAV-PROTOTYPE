<?php

session_start();


unset($_SESSION['error_message']);
$_SESSION['UID']="";
header('Location:../index.php');

?>