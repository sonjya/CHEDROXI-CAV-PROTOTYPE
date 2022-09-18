<?php 

session_start();

include "../../../modules/dbconnection.php";

$UID = $_SESSION['UID'];
$schoolID = $_GET['id'];

//for getting lastname and firstname of the user
$sql = "select * from tbl_users where userID='$UID' limit 1";
$result = mysqli_query($connection,$sql);
$fetch=mysqli_fetch_assoc($result);

$user = $fetch['lastname'] . ', ' . $fetch['firstname'];

//getting data for table
$sql2 = "select id,firstname,middlename,lastname,schooldesc,coursedesc,documenttype,referencenumber,preparedby,reviewedby,applicationtype,status from tbl_process a inner join tbl_schools b inner join tbl_courses c inner join tbl_payments d where a.schoolid=b.schoolid and a.courseid=c.courseid and a.paymentid=d.paymentid and a.active='yes' and a.schoolid=$schoolID";
$result2 = mysqli_query($connection,$sql2);


?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="../../../src/css/bootstrap.min.css" rel="stylesheet">
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
                            <li><a class="dropdown-item" href="../../../modules/logout.php" style="color: red;">LOGOUT</a></li>
                        </ul>
                </li>

            </div>
        </nav>

        <div class="container-fluid">
        <table class="table table-sm">
                <thead>
                    <tr>
                        <th scope="col">First Name</th>
                        <th scope="col">Middle Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">HEI</th>
                        <th scope="col">Degree</th>
                        <th scope="col">OR Number</th>
                        <th scope="col">Prepared By</th>
                        <th scope="col">Application Type</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php while($fetch2=mysqli_fetch_assoc($result2)) { ?>
                        <tr>
                            <td><?=$fetch2['firstname']?></td>
                            <td><?=$fetch2['middlename']?></td>
                            <td><?=$fetch2['lastname']?></td>
                            <td><?=$fetch2['schooldesc']?></td>
                            <td><?=$fetch2['coursedesc']?></td>
                            <td><?=$fetch2['referencenumber']?></td>
                            <td><?=$fetch2['preparedby']?></td>
                            <td><?=$fetch2['applicationtype']?></td>
                            <td><?=$fetch2['status']?></td>
                            <td><a href="viewAcceptedDetails.php?id=<?=$fetch2['id']?>" class="btn btn-primary">View</a></td>
                        </tr>
                    <?php } ?>
                </tbody>

        </table>
        </div>

        <div class="container-fluid">
            <a href="../index.php" class="btn btn-danger">BACK</a>
        </div>






        <script src="../../../src/js/bootstrap.bundle.min.js"></script>

        <style>
            .table {
                margin-top: 80px;
            }
        </style>
   

    </body>






</html>