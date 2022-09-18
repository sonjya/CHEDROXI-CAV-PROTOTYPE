<?php 

session_start();

include "../../../modules/dbconnection.php";

$UID = $_SESSION['UID'];
$ID = $_GET['id'];

//for getting lastname and firstname of the user for NAVBAR
$sql = "select * from tbl_users where userID='$UID' limit 1";
$result = mysqli_query($connection,$sql);
$fetch=mysqli_fetch_assoc($result);

$user = $fetch['lastname'] . ', ' . $fetch['firstname'];

//for getting the data from tbl_process
$sql2 = "select a.schoolid,schooldesc,schoolcity,firstname,middlename,lastname,a.courseid,coursedesc,applicationtype,mode,SOnumber,graduationdate,systarted,syended,documenttype,requestletter,indorsementletter,tor,diploma,preparedby,referencenumber,reviewedby,commissionerid,status,remarks,a.active from tbl_process a inner join tbl_schools b inner join tbl_courses c inner join tbl_payments d where a.schoolid=b.schoolid and a.courseID=c.courseID and c.schoolid=b.schoolid and a.paymentid=d.paymentid and a.id='$ID'";
$result2 = mysqli_query($connection,$sql2);
$fetch2=mysqli_fetch_assoc($result2);

$viewedName = $fetch2['lastname'];

// $sql3 = "select referencenumber from tbl_cashier";
$sql3 = "select paymentid,concat(fullname,' // ',referencenumber) as fullname from tbl_payments where active='yes' and fullname like '%$viewedName%'";
$result3 = mysqli_query($connection,$sql3);

?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="../../../src/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

        <!-- navbar -->
        <nav class="navbar fixed-top" style="background-color: #FDD835;">
            <div class="container-fluid">
                <a class="navbar-brand">CHEDROXI-CAV</a>
                
                <li class="nav-item dropdown d-flex">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false"><?= $user ?></a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Profile settings</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="../../../modules/logout.php" style="color: red;">LOGOUT</a></li>
                        </ul>
                </li>

            </div>
        </nav>

       <div class="container">

                <!-- <div class="mb-3">
                    <label class="form-label">HEI</label>
                    <select class="form-select" aria-label="Default select example" name="schoolID" readonly disabled>
                        <option value="<?= $fetch2['schoolid']?>" selected><?= $fetch2['schooldesc']?></option>
                    </select>
                </div> -->

                <div class="mb-3">
                    <label class="form-label">HEI</label>
                    <input type="text" class="form-control" name="schoolID" value="<?= $fetch2['schooldesc']?>" disabled readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">School Address</label>
                    <input type="text" class="form-control" name="schoolcity" value="<?= $fetch2['schoolcity']?>" disabled readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">First Name</label>
                    <input type="text" class="form-control" name="firstname" value="<?=$fetch2['firstname']?>" disabled readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Middle Name</label>
                    <input type="text" class="form-control" name="middlename" value="<?=$fetch2['middlename']?>" disabled readonly>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Last Name</label>
                    <input type="text" class="form-control" name="lastname" value="<?=$fetch2['lastname']?>" disabled readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Course</label>
                    <input type="text" class="form-control" name="course" value="<?=$fetch2['coursedesc']?>" disabled readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Type of Application</label>
                    <input type="text" class="form-control" name="typeofapplication" value="<?=$fetch2['applicationtype']?>" disabled readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Mode of Study</label>
                    <input type="text" class="form-control" name="modeofstudy" value="<?=$fetch2['mode']?>" disabled readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">SO No.</label>
                    <input type="text" class="form-control" name="SOnumber" value="<?=$fetch2['SOnumber']?>" disabled>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date of Graduation</label>
                    <input type="text" class="form-control" name="dateofgraduation" value="<?=$fetch2['graduationdate']?>" disabled readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date Started</label>
                    <input type="text" class="form-control" name="datestarted" value="<?=$fetch2['systarted']?>" disabled readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Date Ended</label>
                    <input type="text" class="form-control" name="dateended" value="<?=$fetch2['syended']?>" disabled readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Application Type</label>
                    <input class="form-control" type="text" name="requestletter"value="<?=$fetch2['documenttype']?>" disabled readonly >
                </div>

                <div class="mb-3">
                    <a href="../../../files/<?= $fetch2['requestletter'] ?>" target="_blank">Request Letter</a>
                </div>

                <div class="mb-3">
                    <a href="../../../files/<?= $fetch2['indorsementletter'] ?>" target="_blank">Indorsement Letter</a>
                </div>

                <div class="mb-3">
                   <a href="../../../files/<?= $fetch2['tor'] ?>" target="_blank">Transcript of Records</a>
                </div>

                <div class="mb-3">
                    <a href="../../../files/<?= $fetch2['diploma']?>" target="_blank">Diploma</a>
                </div>

                <div class="mb-3">
                    <label class="form-label">Reference Number</label>
                    <input class="form-control" type="text" name="referencenumber" value="<?=$fetch2['referencenumber']?>" disabled readonly >
                </div>


                <div class="mb-3">
                    <label class="form-label">Prepared By</label>
                    <input type="text" class="form-control" name="preparedby" value="<?=$user?>" disabled>
                </div>

                <input type="hidden" name="id" value="<?=$ID?>">

                <div class="mb-3">
                    <label class="form-label">Reviewed By</label>
                    <input type="text" class="form-control" name="reviewedby" value="<?=$user?>" readonly required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Commissioner</label>
                        <select class="form-select" aria-label="Default select example" name="commissioner" disabled >  
                        <option value="">Director VI</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <input type="text" class="form-control" name="status" value="<?=$fetch2['status']?>" disabled readonly>
                </div>

                <div class="mb-3">
                    <label class="form-label">Remarks</label>
                    <input type="text" class="form-control" name="remarks" value="<?=$fetch2['remarks']?>" disabled >
                </div>

                <div class="container-fluid">
                    <input type="submit" class="btn btn-success" value="VALIDATE">
                    <a href="../index.php" class="btn btn-danger">BACK</a>
                </div>

       </div>




        <script src="../../../src/js/bootstrap.bundle.min.js"></script>

        <style>
            .container {
                margin-top: 80px;
                margin-bottom:50px;
            }
        </style>
   

    </body>






</html>