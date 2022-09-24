<?php

$type = $_POST['applicationtype'];

switch ($type) {
    case 1:
        header("location:../pages/client/pages/specialorder.php");
        break;
    case 2:
        header("location:../pages/client/pages/unitsearner.php");
        break;
}

?>