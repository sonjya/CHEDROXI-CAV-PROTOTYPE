<?php

try {
    $search = $_POST['search'];
    header("location:../pages/admin/pages/viewMessages.php?search=$search");
} catch (exception $e) {
    header("location:../pages/admin/pages/viewMessages.php?search=");
}

?>