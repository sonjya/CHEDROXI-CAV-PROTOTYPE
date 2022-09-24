<?php 

session_start();

include "../../../modules/dbconnection.php";

$UID = $_SESSION['UID'];

//for getting lastname and firstname of the user
$sql = "select * from tbl_users where userID='$UID' limit 1";
$result = mysqli_query($connection,$sql);
$fetch=mysqli_fetch_assoc($result);

$user = $fetch['lastname'] . ', ' . $fetch['firstname'];

$search = $_GET['search'];

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

        <div class="container">
                
            <div class="card">
                <div class="card-body">
                    <form method="post" action="../../../modules/client-viewfiles-route.php">
                        <div class="row">
                            <div class="col-2 mt-2"><label class="form-label"><h1>SEARCH:</h1></label></div>
                            <div class="col-8 mt-3">
                                <input type="text" class="form-control" name="search">
                            </div>
                            <div class="col mt-3">
                                <input type="submit" class="btn btn-outline-primary" value="SEARCH"> <a href="../index.php" class="btn btn-outline-danger">BACK</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>

        <div class="container-fluid"> 
            <div class="card">
                <div class="card-header">APPLICATIONS</div>
                <div class="card-body">
                    <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>First Name</th>
                            <th>Middle Name</th>
                            <th>Last Name</th>
                            <th>Degree</th>
                            <th>Application Type</th>
                            <th>OR No.</th>
                            <th>Prepared By</th>
                            <th>Reviewed By</th>
                            <th>Document Type</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php while($fetch1=mysqli_fetch_assoc($result1)) { ?>
                            <tr <?php if($fetch1['status'] == 'Pending') {echo "style=background-color:#FFE0B2";} elseif ($fetch1['status'] == 'Processing') {echo "style=background-color:#C8E6C9";} elseif ($fetch1['status'] == 'Rejected') {echo "style=background-color:#FFCDD2";}?>>
                                <td><?=$fetch1['id']?></td>
                                <td><?=$fetch1['firstname']?></td>
                                <td><?=$fetch1['middlename']?></td>
                                <td><?=$fetch1['lastname']?></td>
                                <td><?=$fetch1['coursedesc']?></td>
                                <td><?=$fetch1['applicationtype']?></td>
                                <td><?=$fetch1['ornumber']?></td>
                                <td><?=$fetch1['preparedby']?></td>
                                <td><?=$fetch1['reviewedby']?></td>
                                <td><?=$fetch1['documenttype']?></td>
                                <td><?=$fetch1['status']?></td>
                                <td><a href="" class="btn btn-outline-primary">VIEW</a></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
            </div>
        

        </div>




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