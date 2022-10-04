<?php 

session_start();

include "../../../modules/dbconnection.php";

$UID = $_SESSION['UID'];

//for getting lastname and firstname of the user
$sql = "select * from tbl_users a inner join tbl_roles b where a.roleid=b.roleid and userID='$UID' limit 1";
$result = mysqli_query($connection,$sql);
$fetch=mysqli_fetch_assoc($result);

$user = $fetch['lastname'] . ', ' . $fetch['firstname'];
$role = $fetch['roleDesc'];

//getting schoolid of user
$sql1 = "select b.schoolid,schooldesc from tbl_users a inner join tbl_user_school b inner join tbl_schools c where a.userid=b.userid and b.schoolid=c.schoolid and a.userid=$UID";
$result1 = mysqli_query($connection,$sql1);
$fetch1 = mysqli_fetch_assoc($result1);

?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
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
                    <h1>COMPOSE MESSAGE</h1>
                    <br>
                    <form method="post" action="../../../modules/client-sendMessage.php">
                        <div class="mb-3">
                            <h4>RECIPIENT</h4>
                            <input type="hidden" name="toID" value="10">
                            <input type="text" class="form-control" value="CHEDROXI" readonly>
                        </div>
                        <div class="mb-3">
                            <h4>SENDER</h4>
                            <input type="hidden" name="fromID" value="<?=$fetch1['schoolid']?>">
                            <input type="text" class="form-control" value="<?=$fetch1['schooldesc']?>" readonly>
                        </div>
                        <div class="mb-3">
                            <h4>MESSAGE</h4>
                            <textarea name="message" cols="169" rows="10" required></textarea>
                        </div>
                        <div class="mb-3">
                            <div class="row">
                                <div class="col-3"></div>
                                <div class="col">
                                    <input type="submit" class="btn btn-outline-success col-4" value="SEND">
                                    <a href="viewMessages.php?search=" class="btn btn-outline-danger col-4">BACK</a>
                                </div>
                            </div>
                        </div>
                    </form>
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