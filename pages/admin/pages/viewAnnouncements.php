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

$search = $_GET['search'];

//getting all data fromt tbl_announcements;
$sql1 = "select * from tbl_announcements where description like '%$search%' or date like '%$search%' order by id desc";
$result1 = mysqli_query($connection,$sql1);

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
                <div class="card-header">ANNOUNCEMENTS</div>
                <div class="card-body">
                    <form method='post' action="../../../modules/admin-viewannouncements-route.php">
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-6"><input type="text" name="search" class="form-control"></div>
                            <div class="col-4"><input type="submit" class="col-4 btn btn-outline-primary" value="SEARCH"> <a href="../index.php" class="col-4 btn btn-outline-danger">BACK</a></div>
                        </div>
                    </form>
                    <br>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>DESCRIPTION</th>
                                <th class="col-1">DATE</th>
                                <th>ACTIVE</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($fetch1 = mysqli_fetch_assoc($result1)) {?>
                                <tr <?php if($fetch1['active'] == 'yes') { echo "style='background-color:#C8E6C9;'";} elseif ($fetch1['active'] == 'no') {echo "style='background-color:#FFCDD2;'";}?>>
                                    <td><?=$fetch1['ID']?></td>
                                    <td><?=$fetch1['description']?></td>
                                    <td><?=$fetch1['date']?></td>
                                    <td><?=$fetch1['active']?></td>
                                    <?php if($fetch1['active']=='yes') { ?>
                                        <td><a href="../../../modules/updateAnnouncementDown.php?id=<?=$fetch1['ID']?>" class="btn btn-outline-danger">DOWN</a></td>
                                    <?php }elseif($fetch1['active']=='no') { ?>
                                        <td><a href="../../../modules/updateAnnouncementUp.php?id=<?=$fetch1['ID']?>" class="btn btn-outline-success">UP</a></td>
                                    <?php } ?>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <form method="post" action="../../../modules/addAnnouncement.php">
                        <div class="row">
                            <div class="col-1"></div>
                            <div class="col-8">
                                <input type="text" class="form-control" name="announcementtext" required>
                            </div>
                                <input type="submit" class="col-2 btn btn-outline-warning" value="POST ANNOUNCEMENT">
                            </div>
                        </div>
                    </form>
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