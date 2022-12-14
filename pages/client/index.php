<?php 

session_start();

include "../../modules/dbconnection.php";

$UID = $_SESSION['UID'];

//for getting lastname and firstname of the user
$sql = "select * from tbl_users where userID='$UID' limit 1";
$result = mysqli_query($connection,$sql);
$fetch=mysqli_fetch_assoc($result);

$user = $fetch['lastname'] . ', ' . $fetch['firstname'];

//for school name and school address
$sql2 = "select a.schoolid,schooldesc,schoolcity from tbl_schools a inner join tbl_user_school b where a.schoolid=b.schoolid and b.userid='$UID' and b.active='yes' limit 1";
$result2 = mysqli_query($connection,$sql2);
$fetch2 = mysqli_fetch_assoc($result2);

$sid = $fetch2['schoolid'];

$school = $fetch2['schooldesc'];
$schoolAddress = $fetch2['schoolcity'];

//getting status values group by
$sql3 = "select count(a.id) as total,status from tbl_process a inner join tbl_user_school b where a.schoolid=b.schoolid and userid='$UID' group by status";
$result3 = mysqli_query($connection,$sql3);

$sql4 = "select count(*) as total from tbl_process a inner join tbl_user_school b where a.schoolid=b.schoolid and userid='$UID'";
$result4 = mysqli_query($connection,$sql4);
$fetch4 = mysqli_fetch_assoc($result4);

//announcements
$qry = "select * from tbl_announcements where active='yes' order by id desc";
$res = mysqli_query($connection,$qry);

//count replies
$qry1 = "select count(id) as total from tbl_message_replies where schoolid=10 and status=1";
$res1 = mysqli_fetch_assoc(mysqli_query($connection,$qry1));

?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="../../src/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="body-bg">

        <!-- navbar -->
        <nav class="navbar fixed-top" style="background-color: #69F0AE;">
            <div class="container-fluid">
                <a class="navbar-brand">CHEDROXI-CAV</a>
                
                <li class="nav-item dropdown d-flex">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $user ?></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="pages/viewMessages.php?search=">Messages <span class="badge bg-primary"><?=$res1['total']?></span></a></li>
                            <li><a class="dropdown-item" href="../shared/viewProfile.php">Profile settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../../modules/logout.php" style="color: red;">LOGOUT</a></li>
                        </ul>
                </li>

            </div>
        </nav>
        
        <div class="container">

            <div class="card text-bg-success">
                <div class="card-header"><?=$school . ' - School Registrar'?></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-2 m-3">
                            <img src="https://randomuser.me/api/portraits/men/39.jpg" class="img-thumbnail img-profile" alt="NO-IMAGE">
                        </div>
                        <div class="col mt-4">
                            <h1>Welcome <?=$user?></h1>
                            <h5><?=$school?></h5>
                            <p><?=$schoolAddress?></p>
                        </div>
                    </div>
                    
                    <hr>

                    <div class="card text-bg-dark">
                        <div class="card-header">Applications</div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-1"></div>
                                    <div class="col-3">
                                        <h6>All Files</h6>
                                        <h1><?=$fetch4['total']?></h1>
                                    </div>
                                <?php while($fetch3=mysqli_fetch_assoc($result3)) {?>
                                    <div class="col-2" <?php if($fetch3['status'] == 'Pending') {echo "style='color:orange;'";} elseif ($fetch3['status'] == 'Processing') {echo "style='color:#00E676;'";} elseif ($fetch3['status'] == 'Rejected') {echo "style='color:red;'";} ?>>
                                        <h6><?=$fetch3['status']?></h6>
                                        <h1><?=$fetch3['total']?></h1>
                                    </div>
                                <?php } ?>
                            </div>
                            <div class="row">
                                <div class="col-4"></div>
                                <div class="col"><a href="../../modules/client-viewfiles-route.php" class="btn btn-outline-primary col-6">VIEW</a></div>
                            </div>
                        </div>
                    </div>
                    
                    <hr>
                    <div class="row mt-4">
                        
                        <div class="col-6">
                            <div class="card text-bg-dark">
                                <div class="card-header">SUBMIT APPLICATION</div>
                                <div class="card-body">
                                    <form method="post" action="../../modules/client-applicationtype-route.php">
                                        <p>select application type.</p>
                                        <div class="row">
                                            <div class="col-8">
                                                <select class="form-select" name="applicationtype">
                                                    <option value="1">SPECIAL ORDER</option>
                                                    <option value="2">UNITS EARNER</option>
                                                    <option value="3">CAR</option>
                                                    <option value="4">ACCREDITATION STATUS</option>
                                                    <option value="5">ASSOCIATE/DIPLOMA/GRADUATE</option>
                                                    <option value="6">CTE/RSTC/ECE</option>
                                                    <option value="7">LEBC/LAW COURSE</option>
                                                </select>
                                            </div>
                                            <input type="submit" class="btn btn-outline-primary col-3" value="APPLY">
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card text-bg-dark">
                                <div class="card-header">SCHOOL COURSES</div>
                                <div class="card-body">
                                    <p>view courses.</p>
                                    <a href="pages/viewCourses.php?search=" class="btn btn-outline-primary col-4">VIEW</a>
                                </div>
                            </div>
                        </div>
                            
                    </div>

                </div>
            </div>
            
            <br>

            <div class="card text-bg-success">
                <div class="card-body">
                    <h1>ANNOUNCEMENTS</h1>
                        <?php while($fet = mysqli_fetch_assoc($res)) { $tmpid = $fet['ID']; ?>
                            <div class="card mb-2">
                                <div class="card-body">
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <div class="row">
                                                <div class="col-1 mb-3">
                                                    <img src="../../images/logo.png" class="img-thumbnail"alt="">
                                                </div>
                                                <div class="col"><h2 style="color:black;">CHEDROXI</h2><h6 style="color:black;"><?=$fet['date']?></h6></div>
                                      
                                            </div>
                                            <h6 style="color:red;font-style:italic;text-indent:5ch;"><?=$fet['description']?></h6>
                                        </div>
                                    </div>
                                    <form method="post" action="../../modules/announcement-reply.php">
                                        <div class="card">
                                            <div class="card-body">

                                                <?php $tmpsql = "select id,schooldesc,announcementid,reply,date from tbl_announcement_replies a inner join tbl_schools b where a.schoolid=b.schoolid and announcementid='$tmpid' order by date asc";$tmpres = mysqli_query($connection,$tmpsql);
                                                    while($tmpfet=mysqli_fetch_assoc($tmpres)){ ?>
                                                        <div class="card mb-2">
                                                            <div class="card-body">
                                                                <div class="col" style="color:black;">
                                                                    <h6><?=$tmpfet['schooldesc']?></h6>
                                                                    <p style="font-size:10px;"><?=$tmpfet['date']?></p>
                                                                </div>
                                                                <div class="col" style="color:black;"><p style="text-indent:5ch;font-size:14px;"><?=$tmpfet['reply']?></p></div>
                                                            </div>
                                                        </div>
                                                <?php } ?>
                                                <br>
                                                <div class="row">
                                                    <div class="col-1" style="color: black;"><h5>REPLY:</h5></div>
                                                    <div class="col-10">
                                                        <input type="hidden" name="announcementid" value="<?=$fet['ID']?>">
                                                        <input type="hidden" name="schoolid" value="<?=$sid?>">
                                                        <input type="text" class="form-control" name="reply" required>
                                                    </div>
                                                    <div class="col"><input type="submit" class="btn btn-outline-primary" value="SEND"></div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        <?php } ?>
                </div>
            </div>

        <!-- container -->
        </div> 

         


        <script src="../../src/js/bootstrap.bundle.min.js"></script>

        <style>
            .container {
                margin-top: 80px;
                margin-bottom: 50px;
            }
            .greeting {
                margin-left: 30px;
            }
            .img-profile {
                border-radius:50%;
            }
            .body-bg {
                background-color:#E0E0E0E0;
            }
        </style>
   

    </body>






</html>