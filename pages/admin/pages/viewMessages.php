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

//getting messages
$sql1 = "select a.id,a.schoolid,schooldesc,message,date,a.active from tbl_messages a inner join tbl_schools b where a.schoolid=b.schoolid and (message like '%$search%' or schooldesc like '%$search%' or date like '%$search%') order by a.id desc";
$result1 = mysqli_query($connection, $sql1); 

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
                    <h1>MESSAGES</h1>
                    <form method="post" action="../../../modules/admin-viewmessages-route.php">
                        <div class="row">
                            <div class="col-2">
                                <input type="hidden" name="id" value="<?=$id?>">
                            </div>
                            <div class="col-6">
                                <input type="text" class="form-control" name="search">
                            </div>
                            <div class="col-2">
                                <input type="submit" class="btn btn-outline-primary" value="SEARCH">
                                <a href="../index.php" class="btn btn-outline-danger">BACK</a>
                            </div>
                        </div>
                    </form>
                    <br>
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="col-2">DATE - TIME</th>
                                <th class="col-2">SENDER</th>
                                <th class="col-10">MESSAGE</th>
                                <th class="col-1">ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php while($fetch1 = mysqli_fetch_assoc($result1)) { ?>
                                <tr <?php if ($fetch1['active'] == 1) {echo "style='background-color:#E0E0E0E0;font-style:italic;'";}?>>
                                    <td><?=$fetch1['date']?></td>
                                    <td><?=$fetch1['schooldesc']?></td>
                                    <td><?=$fetch1['message']?></td>
                                    <td><a href="viewMessageDetail.php?id=<?=$fetch1['id']?>" class="btn btn-outline-primary">VIEW</a></td>
                                </tr>
                            <?php }?>
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