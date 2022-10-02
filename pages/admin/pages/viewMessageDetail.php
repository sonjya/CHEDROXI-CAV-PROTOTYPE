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

//viewed message na here
$id = $_GET['id'];
$sql1 = "update tbl_messages set active=0 where id='$id'";
try {
    mysqli_query($connection,$sql1);
} catch(exception $e) {

}

//get school desc
$sql2 = "select a.id,a.schoolid,schooldesc,message,a.date from tbl_messages a inner join tbl_schools b where a.schoolid=b.schoolid and a.id='$id' limit 1";
$result2 = mysqli_query($connection,$sql2);
$fetch2 = mysqli_fetch_assoc($result2);

//getting replies
$sql3 = "select a.id,messageid,a.schoolid,schooldesc,reply,datetime from tbl_message_replies a inner join tbl_schools b where a.schoolid=b.schoolid and messageid='$id' order by datetime asc;";
$result3 = mysqli_query($connection,$sql3);

//get user schoolid
$sql4 = "select schoolid from tbl_user_school where userid='$UID'";
$result4 = mysqli_query($connection,$sql4);
$fetch4 = mysqli_fetch_assoc($result4);

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
                    <div class="card mb-1">
                        <div class="card-body">
                            <h5><?=$fetch2['schooldesc']?></h5>
                            <h6><?=$fetch2['date']?></h6>
                            <br>
                            <p style="text-indent:5ch;font-style:italic;"><?=$fetch2['message']?></p>
                        </div>
                    </div>
                    <?php while($fetch3 = mysqli_fetch_assoc($result3)) { ?>
                        <div class="card mb-1">
                            <div class="card-body">
                                <div class="row">
                                    <p><strong><?=$fetch3['schooldesc'] . ": "?></strong> <?=$fetch3['reply']?></p>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                    <div class="card">
                        <div class="card-body">
                            <form method="post" action="../../../modules/sendReply.php">
                                <div class="row">
                                    <div class="col-1">
                                        <h5>REPLY:</h5>
                                    </div>
                                    <div class="col-10">
                                        <input type="hidden" name="mid" value="<?=$id?>">
                                        <input type="hidden" name="schoolid" value="<?=$fetch4['schoolid']?>">
                                        <input type="text" class="form-control" name="reply">
                                    </div>
                                    <div class="col-1">
                                        <input type="submit" class="btn btn-outline-primary" value="SEND">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
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