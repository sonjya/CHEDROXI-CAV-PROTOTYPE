<?php

try {
    $search = $_POST['search'];
    header("location:../pages/shared/tracker.php?search=$search");
} catch (exception $e) {
    header("location:../pages/shared/tracker.php?search=");
}

?>