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

//counting validated
$sql5 = "select count(id) as total from tbl_process where status='validated' and active='yes'";
$result5 = mysqli_query($connection,$sql5);
$fetch5 = mysqli_fetch_assoc($result5);

//count new messages
$sql6 = "select count(a.id) as total from tbl_messages a inner join tbl_schools b where a.schoolid=b.schoolid and a.active=1";
$result6 = mysqli_query($connection,$sql6);
$fetch6 = mysqli_fetch_assoc($result6);

?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.0.96/css/materialdesignicons.min.css" integrity="sha512-fXnjLwoVZ01NUqS/7G5kAnhXNXat6v7e3M9PhoMHOTARUMCaf5qNO84r5x9AFf5HDzm3rEZD8sb/n6dZ19SzFA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    </head>

    <body class="body-bg">

        <!-- navbar -->
        <nav class="navbar fixed-top" style="background-color: #FDD835;">
            <div class="container-fluid">
                <a class="navbar-brand">CHEDROXI-CAV</a>
                
                <li class="nav-item dropdown d-flex">

                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><span class="mdi mdi-account"></span> <?= $user ?></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="../shared/viewProfile.php"><span class="mdi mdi-account-edit"></span> Profile settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../../modules/logout.php" style="color: red;"><span class="mdi mdi-logout-variant"></span> LOGOUT</a></li>
                        </ul>
                </li>

            </div>
        </nav>

        <div class="container">
            <div class="card text-bg-warning">
                <div class="card-header">
                    CHEDROXI - CAV 
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2 m-3">
                            <img src="https://randomuser.me/api/portraits/men/39.jpg" class="img-thumbnail img-user" alt="NO-IMAGE">
                        </div>
                        <div class="col-6 mt-4">
                            <h1>Welcome <?=$user?></h1>
                            <h5><?=$role?></h5>
                            <a class="btn btn-outline-primary" href="pages/viewMessages.php?search="><span class="mdi mdi-inbox"></span> Inbox <span class="badge bg-primary"> <?=$fetch6['total']?> </span></a>
                            <a href="../../modules/admin-viewannouncements-route.php" class="btn btn-outline-primary"><span class="mdi mdi-bullhorn-variant-outline"></span> Announcement</a>
                            <a href="../../modules/sendEmail.php" class="btn btn-outline-primary">EMAIL</a>
                        </div>
                    </div>
                    <hr>
                    <div class="card  text-bg-dark mb-2">
                        <div class="card-header">CHART</div>
                        <div class="card-body">
                            <canvas id="myChart" style="width:100%;max-width:600px"></canvas>
                        </div>
                    </div>
                    <div class="card text-bg-dark mb-2">
                        <div class="card-header">
                            APPLICATIONS
                        </div>
                        <div class="body">
                            <div class="row m-3 col-12">
                                <div class="col-1"></div>
                                <div class="col-3">
                                    <h6>ALL FILES</h6>
                                    <h1><?=$fetch1['total']?></h1>
                                </div>
                                <div class="col-2" style='color:orange;'>
                                    <h6>PENDING</h6>
                                    <h1><?=$fetch2['total']?></h1>
                                </div>
                                <div class="col-2" style='color:#00E676;'>
                                    <h6>PROCESSING</h6>
                                    <h1><?=$fetch3['total']?></h1>
                                </div>
                                <div class="col-2" style='color:red;'>
                                    <h6>REJECTED</h6>
                                    <h1><?=$fetch4['total']?></h1> 
                                </div>
                                <div class="col-2">
                                    <h6>VALIDATED</h6>
                                    <h1><?=$fetch5['total']?></h1> 
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-4"></div>
                                    <a href="../../modules/admin-viewfiles-route.php?search=" class="col-4 mb-3 btn btn-outline-primary">VIEW</a>
                                <div class="col-5"></div>
                            </div>
                        </div>
                    </div>

                    <div class="card text-bg-dark">
                        <div class="card-header">PAPER AVAILABILITY</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-3"></div>
                                <div class="col-4">
                                    <h5>SECPA</h5>
                                    <h1>10</h1>
                                </div>
                                <div class="col-4">
                                    <h5>DFA</h5>
                                    <h1>1</h1>
                                </div>
                            </div>
                        </div>
                    </div>

                    
                <hr>

                                            
                    <div class="row">
                        <div class="col-6">
                            <div class="card text-bg-dark">
                                <div class="card-header">(HEI) HIGHER EDUCATIONAL INSTITUTION</div>
                                <div class="card-body">
                                    <p>Add, delete, or edit school information.</p>
                                    <a href="../../modules/admin-viewschools-route.php?search=" class="btn btn-outline-primary col-4 <?php if($role == 'ADMINISTRATOR') {} else {echo "disabled";} ?>">VIEW</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card text-bg-dark">
                                <div class="card-header">SYSTEM USERS</div>
                                <div class="card-body">
                                    <p>View this to view users of the system</p>
                                    <a href="../../modules/admin-viewusers-route.php?search=" class="btn btn-outline-primary col-4 <?php if($role == 'ADMINISTRATOR') {} else {echo "disabled";} ?>">VIEW</a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <br>

                    <div class="row">
                        <div class="col-6">
                            <div class="card text-bg-dark">
                                <div class="card-header">COMMISSIONERS</div>
                                <div class="card-body">
                                    <p>View this to view users of the system</p>
                                    <a href="../../modules/admin-viewcommissioners-route.php?search=" class="btn btn-outline-primary col-4 <?php if($role == 'ADMINISTRATOR') {} else {echo "disabled";} ?>">VIEW</a>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card text-bg-dark">
                                <div class="card-header">PRICES</div>
                                <div class="card-body">
                                    <p>View this to view users of the system</p>
                                    <a href="../../modules/admin-viewprices-route.php?search=" class="btn btn-outline-primary col-4">VIEW</a>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>
            </div>

        </div>    




        <script>
            var xValues = ['Monday','Tuesday','Wednesday','Thursday','Friday'];
            var yValues = [10,13,42,6,11];

            new Chart("myChart", {
            type: "line",
            data: {
                labels: xValues,
                datasets: [{
                fill: false,
                lineTension: 0,
                backgroundColor: "#FFFFFF",
                borderColor: "#FFFFFF",
                data: yValues
                }]
            },
            options: {
                legend: {display: false},
                scales: {
                yAxes: [{ticks: {min: 5, max:50}}],
                }
            }
            });
        </script>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <style>
            .container {
                margin-top: 80px;
                margin-bottom: 5px;
            }
            .img-user {
                border-radius: 50%;
            }
            .body-bg {
                background-color:#E0E0E0;
            }
        </style>
   

    </body>


</html>