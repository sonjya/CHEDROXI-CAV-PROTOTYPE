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

//for school name and school address
$sql2 = "select courseid,coursedesc,a.active,c.schoolid from tbl_courses a inner join tbl_schools b inner join tbl_user_school c where a.schoolid=b.schoolid and b.schoolid=c.schoolid and c.userid=$UID and coursedesc like '%$search%'";
$result2 = mysqli_query($connection,$sql2);

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
                <div class="card-header">COURSES</div>
                <div class="card-body">
                    <form method="post" action="../../../modules/client-viewcourses-route.php">
                    <div class="row">
                        <div class="col-2"></div>
                        <div class="col-6">
                            <input type="text" class="form-control" name="search">
                        </div>
                        <div class="col-3">
                            <input type="submit" class="btn btn-outline-primary" value="SEARCH"> <a href="../index.php" class="btn btn-outline-danger">BACK</a>
                        </div>
                    </div>
                </form>


                <table class="table">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Course Title</th>
                            <th>Active</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        <?php while($fetch2=mysqli_fetch_assoc($result2)) { $schoolid=$fetch2['schoolid'] ?>
                            <tr <?php if($fetch2['active']=='yes') {echo "style='background-color:#C8E6C9;'";} else {echo "style='background-color:#FFCDD2;'";} ?>>
                                <td><?=$fetch2['courseid']?></td>
                                <td><?=$fetch2['coursedesc']?></td>
                                <td><?=$fetch2['active']?></td>
                                <td><a href="editCourse.php?id=<?=$fetch2['courseid']?>" class="btn btn-outline-primary">EDIT</a></td>
                            </tr>
                        <?php } ?>
                        
                    </tbody>
                </table>

                <hr>
                    <form method="post" action="../../../modules/addCourse.php">
                        <div class="row">
                            <div class="col-2">
                                <h3>ADD COURSE:</h3>
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="coursedesc" required>
                            </div>
                            <div class="col-3">
                                <input type="hidden" value="<?=$schoolid?>" name="schoolid">
                                <input type="submit" class="btn btn-outline-primary" value="ADD">
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>






        <script src="../../../src/js/bootstrap.bundle.min.js"></script>

        <style>
            .container {
                margin-top: 80px;
                margin-bottom: 50px;
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