<?php 

session_start();

include "../../modules/dbconnection.php";

$UID = $_SESSION['UID'];

//for getting lastname and firstname of the user
$sql = "select * from tbl_users where userID='$UID' limit 1";
$result = mysqli_query($connection,$sql);
$fetch=mysqli_fetch_assoc($result);

$user = $fetch['lastname'] . ', ' . $fetch['firstname'];

//for school name and school address
$sql2 = "select a.schoolid,schooldesc,schoolcity from tbl_schools a inner join tbl_user_school b where a.schoolid=b.schoolid and b.userid='$UID' and b.active='yes' limit 1";
$result2 = mysqli_query($connection,$sql2);
$fetch2 = mysqli_fetch_assoc($result2);

$sid = $fetch2['schoolid'];

$school = $fetch2['schooldesc'];
$schoolAddress = $fetch2['schoolcity'];

//count all files
$qry = "select count(id) as allfiles from tbl_process where schoolid=$sid";
$res = mysqli_query($connection,$qry);
$fetch = mysqli_fetch_assoc($res);

//count pending
$qry1 = "select count(id) as pending from tbl_process where schoolid=$sid and status='pending'";
$res1 = mysqli_query($connection,$qry1);
$fetch1 = mysqli_fetch_assoc($res1);

//count rejected
$qry2 = "select count(id) as rejected from tbl_process where schoolid=$sid and status='rejected'";
$res2 = mysqli_query($connection,$qry2);
$fetch2 = mysqli_fetch_assoc($res2);

?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="../../src/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

        <!-- navbar -->
        <nav class="navbar fixed-top" style="background-color: #69F0AE;">
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

            <div class="card greeting" style="max-width: 800px;">
                <div class="row g-0">
                    
                    <div class="col-md-4">
                        <img src="../../images/james.png" width="300" height="400" class="img-fluid rounded-start">
                    </div>

                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title">Welcome <?=$user?> !</h5>

                            <hr>

                            <h6 class="card-text"><?= $school ?></h6>
                            <p class="card-text"><?= $schoolAddress ?></p>

                            <div class="row">

                                <div class="col-3"><h1><?=$fetch['allfiles']?></h1><p>ALL FILES</p></div>
                                <div class="col-3"><h1><?=$fetch1['pending']?></h1><p>PENDING</p></div>
                                <div class="col-3"><h1><?=$fetch2['rejected']?></h1><p>REJECTED</p></div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>

            <hr>
            <h1>Application</h1>
            <div class="row">
                
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Special Order</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="pages/specialorder.php" class="btn btn-outline-primary">Encode</a>
                    </div>
                </div>

                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Units Earner</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-outline-primary">Encode</a>
                    </div>
                </div>

                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">CAR</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-outline-primary">Encode</a>
                    </div>
                </div>

                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Accreditation</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-outline-primary">Encode</a>
                    </div>
                </div>

                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">CTE/RSTC/ECE</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-outline-primary">Encode</a>
                    </div>
                </div>

                <hr>
                <h1>Options</h1>
                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">View Submitted Files</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="#" class="btn btn-outline-primary">View</a>
                    </div>
                </div>

                <div class="card m-2" style="width: 18rem;">
                    <div class="card-body">
                        <h5 class="card-title">Courses</h5>
                        <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                        <a href="pages/viewCourses.php" class="btn btn-outline-primary">View</a>
                    </div>
                </div>




            </div>
        
        </div>












        <script src="../../src/js/bootstrap.bundle.min.js"></script>

        <style>
            .container {
                margin-top: 80px;
                margin-bottom: 50px;
            }
            .greeting {
                margin-left: 30px;
            }
        </style>
   

    </body>






</html>