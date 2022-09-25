<?php 

session_start();

include "../../../modules/dbconnection.php";

$UID = $_SESSION['UID'];

//for getting lastname and firstname of the user
$sql = "select * from tbl_users where userID='$UID' limit 1";
$result = mysqli_query($connection,$sql);
$fetch=mysqli_fetch_assoc($result);

$user = $fetch['lastname'] . ', ' . $fetch['firstname'];

$id = $_GET['id'];

//getting all data
$sql1 = "select a.id,schooldesc,firstname,middlename,lastname,coursedesc,applicationtype,mode,sonumber,graduationdate,systarted,syended,documenttype,requestletter,indorsementletter,tor,diploma,ornumber,preparedby,reviewedby,status,created_at,updated_at,updatedby,a.active from tbl_process a inner join tbl_schools b inner join tbl_courses c where a.schoolid=b.schoolid and a.courseid=c.courseid and a.id='$id'";
$result1 = mysqli_query($connection,$sql1);
$fetch1 = mysqli_fetch_assoc($result1);

//getting commissioner
$sql2 = "select * from tbl_commissioners";
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
            <form method="post" action="../../../modules/acceptFile.php">
                <div class="card">
                    <div class="card-body">
                        <div class="row">

                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                            <div class="col-4"><h5>ID</h5></div>
                                            <div class="col"><input type="text" class="form-control" value="<?=$fetch1['id']?>" name="id" readonly></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><h5>First Name</h5></div>
                                            <div class="col"><input type="text" class="form-control" value="<?=$fetch1['firstname']?>" readonly></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><h5>Middle Name</h5></div>
                                            <div class="col"><input type="text" class="form-control" value="<?=$fetch1['middlename']?>" readonly></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><h5>Last Name</h5></div>
                                            <div class="col"><input type="text" class="form-control" value="<?=$fetch1['lastname']?>" readonly></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><h5>School</h5></div>
                                            <div class="col"><input type="text" class="form-control" value="<?=$fetch1['schooldesc']?>" readonly></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><h5>Course</h5></div>
                                            <div class="col"><input type="text" class="form-control" value="<?=$fetch1['coursedesc']?>" readonly></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><h5>Application Type</h5></div>
                                            <div class="col"><input type="text" class="form-control" value="<?=$fetch1['applicationtype']?>" readonly></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><h5>Mode</h5></div>
                                            <div class="col"><input type="text" class="form-control" value="<?=$fetch1['mode']?>" readonly></div>
                                        </div>
                                        <div class="row mb-2">
                                            <div class="col-4"><h5>SO Number</h5></div>
                                            <div class="col"><input type="text" class="form-control" value="<?=$fetch1['sonumber']?>" readonly></div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="col-6">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row mb-2">
                                                <div class="col-4"><h5>Graduation Date</h5></div>
                                                <div class="col"><input type="text" class="form-control" value="<?=$fetch1['graduationdate']?>" readonly></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-4"><h5>SY Started</h5></div>
                                                <div class="col"><input type="text" class="form-control" value="<?=$fetch1['systarted']?>" readonly></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-4"><h5>SY Ended</h5></div>
                                                <div class="col"><input type="text" class="form-control" value="<?=$fetch1['syended']?>" readonly></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-4"><h5>Document Type</h5></div>
                                                <div class="col"><input type="text" class="form-control" value="<?=$fetch1['documenttype']?>" readonly></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-4"><h5>Prepared By</h5></div>
                                                <input type="hidden" value="<?=$user?>" name="preparedby">
                                                <div class="col"><input type="text" class="form-control" value="<?=$fetch1['preparedby']?>" readonly></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-4"><h5>Reviewed By</h5></div>
                                                <div class="col"><input type="text" class="form-control" value="<?=$fetch1['reviewedby']?>" readonly></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-4"><h5>Status</h5></div>
                                                <div class="col"><input type="text" class="form-control" value="<?=$fetch1['status']?>" readonly></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-4"><h5>Date Applied</h5></div>
                                                <div class="col"><input type="text" class="form-control" value="<?=$fetch1['created_at']?>" readonly></div>
                                            </div>
                                            <div class="row mb-2">
                                                <div class="col-4"><h5>Last Update</h5></div>
                                                <div class="col"><input type="text" class="form-control" value="<?=$fetch1['updated_at'] . ' by ' . $fetch1['updatedby']?>" readonly></div>
                                            </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    <br>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <a href="../../../files/<?=$fetch1['requestletter']?>" target="blank" class="btn col-3"><u style="color:blue;">REQUEST LETTER</u></a>
                                <a href="../../../files/<?=$fetch1['indorsementletter']?>" target="blank" class="btn col-3"><u style="color:blue;">ENDORSEMENT LETTER</u></a>
                                <a href="../../../files/<?=$fetch1['tor']?>" target="blank" class="btn col-3"><u style="color:blue;">TRANSCRIPT OF RECORDS</u></a>
                                <a href="../../../files/<?=$fetch1['diploma']?>" target="blank" class="btn col-3"><u style="color:blue;">DIPLOMA</u></a>
                            </div>
                        </div>
                    </div>

                    <br>

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-4">
                                    <h6>OR NUMBER: </h6>
                                    <input type="number" class="form-control" name="ornumber" value="<?=$fetch1['ornumber']?>" required>
                                </div>

                                <?php if($fetch1['status'] == 'Pending') {?>
                                    <div class="col-4">
                                        <h6>COMMISSIONER: </h6>
                                        <select class="form-select" name="commissioner">
                                            <?php while($fetch2 = mysqli_fetch_assoc($result2)) { ?>
                                                <option value="<?=$fetch2['commissionerID']?>"><?=$fetch2['fullName']?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                <?php } elseif ($fetch1['status'] == 'Processing') {
                                    $qry = "select fullname from tbl_commissioners a inner join tbl_process b where a.commissionerid=b.commissionerid and b.id='$id' order by a.commissionerid desc limit 1";
                                    $res = mysqli_query($connection,$qry);
                                    $fet = mysqli_fetch_assoc($res);
                                    ?>   
                                        <div class="col-4">
                                            <h6>COMMISSIONER:</h6>
                                            <input type="text" class="form-control" name="valcommissioner" value="<?=$fet['fullname']?>" disabled>
                                        </div>                  
                                <?php } ?>
                                
                                <?php if ($fetch1['status'] == 'Pending') { ?>
                                    <div class="col-4 mt-4">
                                        <input type="submit" class="btn btn-outline-success col-3" value="ACCEPT">
                                        <a href="" class="btn btn-outline-warning col-3">REJECT</a>
                                        <a href="../../../modules/admin-viewfiles-route.php" class="btn btn-outline-danger col-3">BACK</a>
                                    </div>
                                <?php } elseif ($fetch1['status'] == 'Processing') { ?>
                                    <div class="col-4 mt-4">
                                        <a href="" class="btn btn-outline-success col-3 <?php if($fetch1['preparedby'] == $user) {echo "disabled";}?>">VALIDATE</a>
                                        <a href="print.php?print=yes&id=<?=$fetch1['id']?>" target="blank" class="btn btn-outline-primary col-3">PRINT</a>
                                        <a href="../../../modules/admin-viewfiles-route.php" class="btn btn-outline-danger col-3">BACK</a>
                                    </div>
                                <?php } ?>

                            </div>
                        </div>
                    </div>


                    
                    </div>
                </div>
            </form>

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