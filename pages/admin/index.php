<?php 

session_start();

include "../../modules/dbconnection.php";

$UID = $_SESSION['UID'];

//for getting lastname and firstname of the user
$sql = "select * from tbl_users where userID='$UID' limit 1";
$result = mysqli_query($connection,$sql);
$fetch=mysqli_fetch_assoc($result);

$user = $fetch['lastname'] . ', ' . $fetch['firstname'];

//count school submissions entries
$sql2 = "select count(a.schoolid)as entries,a.schoolid,schooldesc from tbl_process a inner join tbl_schools b where a.schoolid=b.schoolid and status='pending' and a.active='yes' group by a.schoolid";
$result2 = mysqli_query($connection,$sql2);

//count school submission accepted
$sql3 = "select count(a.schoolid)as entries,a.schoolid,schooldesc from tbl_process a inner join tbl_schools b where a.schoolid=b.schoolid and status='accepted' and a.active='yes' group by a.schoolid";
$result3 = mysqli_query($connection,$sql3);

//count school submission rejected
$sql4 = "select count(a.schoolid)as entries,a.schoolid,schooldesc from tbl_process a inner join tbl_schools b where a.schoolid=b.schoolid and status='rejected' and a.active='yes' group by a.schoolid";
$result4 = mysqli_query($connection,$sql4);

?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="../../src/css/bootstrap.min.css" rel="stylesheet">
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
            
            <h1>HEI SUBMISSIONS</h1>
            <hr>

            <div class="row">

                <?php while($fetch2=mysqli_fetch_assoc($result2)) { ?>

                    <div class="card m-2" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $fetch2['schooldesc'] ?></h5>
                            <hr>
                            <h6 class="card-text"><?= $fetch2['entries'] ?></h6>
                            <p class="card-text">entries from this HEI.</p>
                            <a href="pages/viewEntries.php?id=<?= $fetch2['schoolid']?>" class="btn btn-primary">View</a>
                        </div>
                    </div>

                <?php } ?>

            </div>

            <h1>FOR REVIEW</h1>
            <hr>

            <div class="row">

                <?php while($fetch3=mysqli_fetch_assoc($result3)) { ?>

                    <div class="card m-2" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $fetch3['schooldesc'] ?></h5>
                            <hr>
                            <h6 class="card-text"><?= $fetch3['entries'] ?></h6>
                            <p class="card-text">entries from this HEI.</p>
                            <a href="pages/viewAccepted.php?id=<?= $fetch3['schoolid']?>" class="btn btn-primary">View</a>
                        </div>
                    </div>

                <?php } ?>

            </div>

            <h1>REJECTED</h1>
            <hr>

            <div class="row">

                <?php while($fetch4=mysqli_fetch_assoc($result4)) { ?>

                    <div class="card m-2" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $fetch4['schooldesc'] ?></h5>
                            <hr>
                            <h6 class="card-text"><?= $fetch4['entries'] ?></h6>
                            <p class="card-text">entries from this HEI.</p>
                            <a href="pages/viewRejected.php?id=<?= $fetch4['schoolid']?>" class="btn btn-primary">View</a>
                        </div>
                    </div>

                <?php } ?>

            </div>

            <h1>VALIDATED</h1>
            <hr>









        </div>








        <script src="../../src/js/bootstrap.bundle.min.js"></script>

        <style>
            .container {
                margin-top: 80px;
                margin-bottom: 50px;
            }
        </style>
   

    </body>






</html>