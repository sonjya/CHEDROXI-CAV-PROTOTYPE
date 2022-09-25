<?php 

session_start();

include "../../../modules/dbconnection.php";

$UID = $_SESSION['UID'];

$sql = "select * from tbl_users where userID='$UID' limit 1";
$result = mysqli_query($connection,$sql);
$fetch=mysqli_fetch_assoc($result);

$user = $fetch['lastname'] . ', ' . $fetch['firstname'];

//for setting up school of the user and school city.
$qry = "select a.schoolid,schooldesc,schoolcity from tbl_user_school a inner join tbl_users b inner join tbl_schools c where a.userID=b.userID and a.schoolID=c.schoolID and a.userid='$UID' limit 1";
$res = mysqli_query($connection,$qry);
$fetchschool = mysqli_fetch_assoc($res);

//for school courses
$sql2 = "select courseid,coursedesc from tbl_courses a inner join tbl_schools b inner join tbl_user_school c where a.schoolid=b.schoolid and b.schoolid=c.schoolid and c.userid='$UID'";
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
                <div class="card-body">
                    <h1>SPECIAL ORDER</h1>
                </div>
            </div>
            <br>

            <form method="post" enctype="multipart/form-data" action="../../../modules/clientSubmitSO.php">

                <div class="card">

                    <div class="card-body">
                        
                        <div class="card border-primary">
                            <div class="card-header text-bg-primary">SCHOOL INFORMATION</div>
                            <div class="card-body">

                                <div class="mb-3">
                                    <label class="form-label">HEI</label>
                                    <select class="form-select" aria-label="Default select example" name="schoolID" readonly>
                                        <option value="<?= $fetchschool['schoolid']?>" selected><?= $fetchschool['schooldesc']?></option>
                                    </select>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">School Address</label>
                                    <input type="text" class="form-control" name="schoolcity" value="<?= $fetchschool['schoolcity']?>" readonly required>
                                </div>

                            </div>

                        </div>
                        
                        <br>

                        <div class="card border-primary">
                            <div class="card-header text-bg-primary">STUDENT INFORMATION</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">First Name</label>
                                    <input type="text" class="form-control" name="firstname" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Middle Name</label>
                                    <input type="text" class="form-control" name="middlename">
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Last Name</label>
                                    <input type="text" class="form-control" name="lastname" required>
                                </div>
                                
                                <div class="mb-3">
                                    <label class="form-label">Course</label>
                                    <select class="form-select" aria-label="Default select example" name="course" >
                                        
                                        <?php while($fetch2 = mysqli_fetch_assoc($result2)) { ?>
                                            <option value="<?= $fetch2['courseid']?>"><?= $fetch2['coursedesc']?></option>
                                        <?php } ?>
                            
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Date of Graduation</label>
                                    <input type="text" class="form-control" name="dateofgraduation" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Date Started</label>
                                    <input type="text" class="form-control" name="datestarted" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Date Ended</label>
                                    <input type="text" class="form-control" name="dateended" required>
                                </div>

                            </div>
                        </div>
                        
                        <br>

                        <div class="card border-primary">
                            <div class="card-header text-bg-primary">FILES</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Letter of Request</label>
                                    <input class="form-control" type="file" name="requestletter" accept=".pdf,.jpg,.jpeg,.png" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Endorsement Letter</label>
                                    <input class="form-control" type="file" name="indorsementletter" accept=".pdf,.jpg,.jpeg,.png" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Transcript of Record</label>
                                    <input class="form-control" type="file" name="tor" accept=".pdf,.jpg,.jpeg,.png" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Diploma</label>
                                    <input class="form-control" type="file" name="diploma" accept=".pdf,.jpg,.jpeg,.png" required>
                                </div>
                            </div>
                        </div>

                        <br>

                        <div class="card border-primary">
                            <div class="card-header text-bg-primary">DOCUMENT INFORMATION</div>
                            <div class="card-body">
                                <div class="mb-3">
                                    <label class="form-label">Type of Application</label>
                                    <input type="text" class="form-control" name="typeofapplication" value="Special Order" readonly required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Mode of Study</label>
                                    <input type="text" class="form-control" name="modeofstudy" value="Conventional" readonly required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">SO No.</label>
                                    <input type="text" class="form-control" name="SOnumber">
                                </div>


                                <div class="mb-3">
                                    <label class="form-label">Application Type</label>
                                    <select class="form-select" aria-label="Default select example" name="applicationtype">
                                        <option value="Local">Local</option>
                                        <option value="DFA">DFA</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <br>
                        <hr>
                        
                        <p style="color:red;font-style:italic;text-align:center;">* Sir/Ma'am <?=$fetch['lastname']?>, please take time to review before submitting it to avoid errors for smoother and faster process.*</p>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col">
                                <input type="submit" name="submit" value="SUBMIT" class="btn btn-outline-success col-4">   
                                <a href="../index.php" class="btn btn-outline-danger col-4">Cancel</a>
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
                margin-bottom: 100px;
            }
            .body-bg {
                background-color:#E0E0E0E0;
            }
        </style>
   

    </body>






</html>