<?php

session_start();

include "../../modules/dbconnection.php";

$UID = $_SESSION['UID'];

//for getting lastname and firstname of the user
$sql = "select * from tbl_users where userID='$UID' limit 1";
$result = mysqli_query($connection,$sql);
$fetch=mysqli_fetch_assoc($result);

$user = $fetch['lastname'] . ', ' . $fetch['firstname'];

//getting prices
$sql2 = "select priceid,concat(itemdesc,' - ₱',price) as itemdesc from tbl_prices";
$result2 = mysqli_query($connection,$sql2);

//assigning reference number
$sql3 = "select concat(year(now()),month(now()),day(now()),'-',hour(now()),minute(now()),second(now())) as referencenumber";
$result3 = mysqli_query($connection,$sql3);
$fetch3=mysqli_fetch_assoc($result3);


?>
<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="../../src/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="body-bg">
        
        <!-- navbar -->
        <nav class="navbar fixed-top" style="background-color: #EF5350;">
            <div class="container-fluid">
                <a class="navbar-brand">CHEDROXI-CAV</a>
                
                <li class="nav-item dropdown d-flex">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $user ?></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../shared/viewProfile.php">Profile settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../../modules/logout.php" style="color: red;">LOGOUT</a></li>
                        </ul>
                </li>

            </div>
        </nav>

        <div class="container">

            <div class="card">
                
                <h5 class="card-header">CHEDROXI - CASHIER</h5>

                <div class="card-body">
                    <h5 class="card-title"><?=$user?></h5>
                    <p class="card-text mb-3">Cashier</p>
                    <form method="post" action="../../modules/pay.php">
                        <div class="mb-3">
                            <label class="form-label">Reference Number</label>
                            <input type="text" class="form-control" name="referencenumber" value="<?= $fetch3['referencenumber']?>" readonly required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="lastname" style="text-transform:uppercase" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="firstname" style="text-transform:uppercase" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Middle Name</label>
                            <input type="text" class="form-control" name="middlename" style="text-transform:uppercase" required>
                        </div>

                        
                        <div class="mb-3">
                            <label class="form-label">payment for:</label>
                            <select class="form-select" aria-label="Default select example" name="price" >
                                
                                <?php while($fetch2 = mysqli_fetch_assoc($result2)) { ?>
                                    <option value="<?= $fetch2['priceid']?>"><?= $fetch2['itemdesc']?></option>
                                <?php } ?>
                    
                            </select>
                        </div>
                        
                        <div class="mb-3">
                            <button type="button" class="btn btn-outline-warning" data-bs-toggle="modal" data-bs-target="#verifyModal">PROCESS</button>
                        </div>


                        <!-- Modal -->
                        <div class="modal fade" id="verifyModal" tabindex="-1" aria-labelledby="verifyModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="verifyModal">ACCEPT PAYMENT</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Are you sure?
                                    </div>
                                    <div class="modal-footer">
                                        <input type="submit"class="btn btn-outline-success" value="PROCESS">
                                        <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">CLOSE</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </form>

                </div>

            </div>
        </div>

 
        <script src="../../src/js/bootstrap.bundle.min.js"></script>


        <style>
            .container {
                margin-top: 100px;
            }
            .body-bg {
                background-color: #E0E0E0E0;
            }
        </style>

    </body>



</html>