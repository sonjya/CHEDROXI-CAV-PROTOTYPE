<?php

try {
    if (isset($_POST['id'])){
        $id = $_POST['id'];
    } else {
        $id = $_GET['id'];
    }
    $search = $_POST['search'];
    header("location:../pages/admin/pages/viewMessages.php?id=$id&search=$search");
} catch (exception $e) {
    header("location:../pages/admin/pages/viewMessages.php?id=$id&search=");
}

?>