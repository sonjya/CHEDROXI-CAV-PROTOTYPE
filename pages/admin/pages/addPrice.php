<?php

session_start();

include "../../../modules/dbconnection.php";

$UID = $_SESSION['UID'];

//for getting lastname and firstname of the user
$sql = "select * from tbl_users a inner join tbl_roles b where a.roleid=b.roleid and userID='$UID' limit 1";
$result = mysqli_query($connection,$sql);
$fetch=mysqli_fetch_assoc($result);

$user = $fetch['lastname'] . ', ' . $fetch['firstname'];
$role = $fetch['roleDesc'];


?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>

    <body class="body-bg">
        
        <!-- navbar -->
        <nav class="navbar fixed-top" style="background-color: #FDD835;">
            <div class="container-fluid">
                <a class="navbar-brand">CHEDROXI-CAV</a>
                
                <li class="nav-item dropdown d-flex">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $user ?></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../../shared/viewProfile.php">Profile settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../../../modules/logout.php" style="color: red;">LOGOUT</a></li>
                        </ul>
                </li>

            </div>
        </nav>

        <div class="container">
            <form method="post" action="../../../modules/addPrice.php">
                <div class="card">
                    <div class="card-header">DOCUMENT PRICE</div>
                    <div class="card-body">
                        <div class="mb-3">
                            <label class="form-label">ITEM DESCRIPTION</label>
                            <input type="text" class="form-control" name="itemdesc" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">PRICE</label>
                            <input type="number" class="form-control" name="price" min='0' step="0.01" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-4"></div>
                        <div class="col mb-3">
                            <input type="submit" class="col-3 btn btn-outline-success" value="ADD">
                            <a href="../../../modules/admin-viewprices-route.php?search=" class="col-3 btn btn-outline-danger">CANCEL</a>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    




        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <style>
        .container {
            margin-top: 150px;
            margin-bottom: 5px;
        }
        .body-bg {
            background-color:#E0E0E0E0;
        }
    </style>



    </body>
</html>