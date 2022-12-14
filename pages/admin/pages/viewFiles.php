<?php 

session_start();

require_once "../../../modules/dbconnection.php";

$UID = $_SESSION['UID'];

//for getting lastname and firstname of the user
$sql = "select * from tbl_users where userID='$UID' limit 1";
$result = mysqli_query($connection,$sql);
$fetch=mysqli_fetch_assoc($result);

$user = $fetch['lastname'] . ', ' . $fetch['firstname'];

$search = $_GET['search'];

//searching data
$sql = "select a.id,firstname,middlename,lastname,schooldesc,coursetitle,applicationtype,ornumber,preparedby,reviewedby,documenttype,status from tbl_process a inner join tbl_schools b inner join tbl_courses c where a.schoolid=b.schoolid and a.courseid=c.courseid and (firstname like '%$search%' or lastname like '%$search%' or schooldesc like '%$search%' or status like '%$search%') and a.active='yes' order by a.id desc limit 10";
$result = mysqli_query($connection,$sql);

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
            <div class="card">
                <div class="card-body">
                    <form method='POST' action="../../../modules/admin-viewfiles-route.php">
                        <div class="row">
                            <div class="col-2 mt-2"><label class="form-label"><h1>SEARCH:</h1></label></div>
                            <div class="col-8 mt-3">
                                <input type="text" class="form-control" name="search">
                            </div>
                            <div class="col-2 mt-3">
                                <input type="submit" class="btn btn-outline-primary" value="SEARCH">
                                <a href="../index.php" class="btn btn-outline-danger">BACK</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="container-fluid">

            <div class="card">
                <h5 class="card-header">FILES</h5>
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>First Name</th>
                                <th>Middle Name</th>
                                <th>Last Name</th>
                                <th>HEI</th>
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
                            <?php while($fetch = mysqli_fetch_assoc($result)) { ?>
                                <tr <?php if ($fetch['status'] == 'Pending') {echo "style='background-color:#FFE0B2;'";} elseif ($fetch['status'] == 'Processing') {echo "style='background-color:#C8E6C9;'";} elseif ($fetch['status'] == 'Rejected') {echo "style='background-color:#FFCDD2;'";}?>>
                                    <td><?=$fetch['id']?></td>
                                    <td><?=$fetch['firstname']?></td>
                                    <td><?=$fetch['middlename']?></td>
                                    <td><?=$fetch['lastname']?></td>
                                    <td><?=$fetch['schooldesc']?></td>
                                    <td><?=$fetch['coursetitle']?></td>
                                    <td><?=$fetch['applicationtype']?></td>
                                    <td><?=$fetch['ornumber']?></td>
                                    <td><?=$fetch['preparedby']?></td>
                                    <td><?=$fetch['reviewedby']?></td>
                                    <td><?=$fetch['documenttype']?></td>
                                    <td><?=$fetch['status']?></td>
                                    <td><a href="viewFileDetails.php?id=<?=$fetch['id']?>" class="btn btn-outline-primary">VIEW</a></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>




        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
        <style>
            .container {
                margin-top: 80px;
                margin-bottom: 5px;
            }
            .body-bg {
                background-color:#E0E0E0;
            }
        </style>
   

    </body>


</html>