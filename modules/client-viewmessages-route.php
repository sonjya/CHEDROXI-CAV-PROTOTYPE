<?php

try {
    $search = $_POST['search'];
    header("location:../pages/client/pages/viewMessages.php?search=$search");
} catch (exception $e) {
    header("location:../pages/client/pages/viewMessages.php?search=");
}

?>