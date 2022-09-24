<?php 

session_start();

include "../../../modules/dbconnection.php";

$UID = $_SESSION['UID'];

//for getting lastname and firstname of the user
$sql = "select * from tbl_users where userID='$UID' limit 1";
$result = mysqli_query($connection,$sql);
$fetch=mysqli_fetch_assoc($result);

$user = $fetch['lastname'] . ', ' . $fetch['firstname'];

//get course details
$id = $_GET['id'];

$sql2 = "select courseid,coursedesc from tbl_courses where courseid=$id";
$result2 = mysqli_query($connection,$sql2);
$fetch2 = mysqli_fetch_assoc($result2);

?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="../../../src/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

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

            <form method="post" action="../../../modules/updateCourse.php">

                <div class="mb-3">
                <input type="hidden" name="courseid" value="<?=$fetch2['courseid']?>">
                </div>
                
                <div class="mb-3">
                    <h5>RENAME</h5>
                    <input type="text" class="form-control" value="<?=$fetch2['coursedesc']?>" disabled>
                </div>

                <div class="mb-3">
                    <h5>TO</h5>
                    <input type="text" class="form-control" name="newcoursedesc" value="<?=$fetch2['coursedesc']?>" required>
                </div>

                <div class="mb-3">
                    <input type="submit" class="btn btn-outline-success" value="UPDATE">
                    <a href="../../../modules/client-viewcourses-route.php" class="btn btn-outline-danger">CANCEL</a>
                </div>

            </form>
            
        </div>



        <script src="../../../src/js/bootstrap.bundle.min.js"></script>

        <style>
            .container {
                margin-top: 200px;
                margin-bottom: 50px;
            }
            .greeting {
                margin-left: 30px;
            }
        </style>
   

    </body>






</html>