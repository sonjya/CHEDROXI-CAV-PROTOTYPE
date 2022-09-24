<?php 

session_start();

include "../../../modules/dbconnection.php";

$UID = $_SESSION['UID'];

//for getting lastname and firstname of the user
$sql = "select * from tbl_users where userID='$UID' limit 1";
$result = mysqli_query($connection,$sql);
$fetch=mysqli_fetch_assoc($result);

$user = $fetch['lastname'] . ', ' . $fetch['firstname'];



//get all data
$sql1 = "select a.id,firstname,middlename,lastname,coursedesc,applicationtype,ornumber,preparedby,reviewedby,documenttype,a.status from tbl_process a inner join tbl_courses b inner join tbl_user_school c where a.courseid=b.courseid and a.schoolid=c.schoolid and userid='$UID' and (lastname like '%$search%' or middlename like '%$search%' or firstname like '%$search%' or coursedesc like '%$search%' or applicationtype like '%$search%' or ornumber like '%$search%' or status like '%$search%')";
$result1 = mysqli_query($connection,$sql1);

?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="../../../src/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="body-bg">

        <!-- navbar -->
        <nav class="navbar fixed-top" style="background-color: #69F0AE;">
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





        <script src="../../../src/js/bootstrap.bundle.min.js"></script>

        <style>
            .container {
                margin-top: 80px;
                margin-bottom: 10px;
            }
            .greeting {
                margin-left: 30px;
            }
            .body-bg {
                background-color:#E0E0E0E0;
            }
        </style>
   

    </body>






</html>