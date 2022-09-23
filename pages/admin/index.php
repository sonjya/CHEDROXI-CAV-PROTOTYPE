<?php 

session_start();

include "../../modules/dbconnection.php";

$UID = $_SESSION['UID'];

//for getting lastname and firstname of the user
$sql = "select * from tbl_users a inner join tbl_roles b where a.roleid=b.roleid and userID='$UID' limit 1";
$result = mysqli_query($connection,$sql);
$fetch=mysqli_fetch_assoc($result);

$user = $fetch['lastname'] . ', ' . $fetch['firstname'];
$role = $fetch['roleDesc'];

//counting all files
$sql1 = "select count(id) as total from tbl_process where active='yes'";
$result1 = mysqli_query($connection,$sql1);
$fetch1 = mysqli_fetch_assoc($result1);

//counting pending
$sql2 = "select count(id) as total from tbl_process where status='pending' and active='yes'";
$result2 = mysqli_query($connection,$sql2);
$fetch2 = mysqli_fetch_assoc($result2);

//counting processing
$sql3 = "select count(id) as total from tbl_process where status='processing' and active='yes'";
$result3 = mysqli_query($connection,$sql3);
$fetch3 = mysqli_fetch_assoc($result3);

//counting rejected
$sql4 = "select count(id) as total from tbl_process where status='rejected' and active='yes'";
$result4 = mysqli_query($connection,$sql4);
$fetch4 = mysqli_fetch_assoc($result4);

?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    </head>

    <body>

        <!-- navbar -->
        <nav class="navbar fixed-top" style="background-color: #FDD835;">
            <div class="container-fluid">
                <a class="navbar-brand">CHEDROXI-CAV</a>
                
                <li class="nav-item dropdown d-flex">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $user ?></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Profile settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../../modules/logout.php" style="color: red;">LOGOUT</a></li>
                        </ul>
                </li>

            </div>
        </nav>

        <div class="container">
            <div class="card">
                <div class="card-header">
                    CHEDROXI - CAV
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2 m-3">
                            <img src="https://randomuser.me/api/portraits/men/39.jpg" class="img-thumbnail" alt="NO-IMAGE">
                        </div>
                        <div class="col-6 mt-4">
                            <h1>Welcome <?=$user?></h1>
                            <h5><?=$role?></h5>
                        </div>
                    </div>
                    <hr>
                    <div class="card">
                        <div class="card-header">
                            APPLICATIONS
                        </div>
                        <div class="body">
                            <div class="row m-3 col-12">
                                <div class="col-3">
                                    <h6>ALL FILES</h6>
                                    <h1><?=$fetch1['total']?></h1>
                                </div>
                                <div class="col-3">
                                    <h6>PENDING</h6>
                                    <h1><?=$fetch2['total']?></h1>
                                </div>
                                <div class="col-3">
                                    <h6>PROCESSING</h6>
                                    <h1><?=$fetch3['total']?></h1>
                                </div>
                                <div class="col-3">
                                    <h6>REJECTED</h6>
                                    <h1><?=$fetch4['total']?></h1> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4"></div>
                                    <a href="../../modules/admin-viewfiles-route.php?search=" class="col-4 mb-3 btn btn-outline-primary">VIEW</a>
                                <div class="col-5"></div>
                            </div>
                        </div>
                    </div>

                    
                <hr>

                                            
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">(HEI) HIGHER EDUCATIONAL INSTITUTION</div>
                                <div class="card-body">
                                    <p>Add, delete, or edit school information.</p>
                                    <a href="../../modules/admin-viewschools-route.php?search=" class="btn btn-outline-primary col-4">VIEW</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">SYSTEM USERS</div>
                                <div class="card-body">
                                    <p>View this to view users of the system</p>
                                    <a href="" class="btn btn-outline-primary col-4">VIEW</a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">COMMISSIONERS</div>
                                <div class="card-body">
                                    <p>View this to view users of the system</p>
                                    <a href="" class="btn btn-outline-primary col-4">VIEW</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-header">PRICES</div>
                                <div class="card-body">
                                    <p>View this to view users of the system</p>
                                    <a href="" class="btn btn-outline-primary col-4">VIEW</a>
                                </div>
                            </div>
                        </div>

                    </div>






                </div>
            </div>

        </div>
    



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <style>
            .container {
                margin-top: 80px;
                margin-bottom: 5px;
            }
        </style>
   

    </body>


</html>