<?php 

session_start();

require_once "../../modules/dbconnection.php";

$UID = $_SESSION['UID'];

$sql = "select userid,lastname,firstname,username,password,roledesc,picture from tbl_users a inner join tbl_roles b where a.roleid=b.roleid and userid='$UID'";
$result = mysqli_query($connection,$sql);
$fetch = mysqli_fetch_assoc($result);


?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="../../src/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>

        <div class="container">
            <div class="card">
                <div class="card-header">
                    PROFILE SETTINGS
                </div>
                <div class="card-body">
                    <form method="post" action="../../modules/updateProfile.php">
                        <div class="mb-3">
                            <input type="hidden" name='id' value="<?=$UID?>">
                            <div class="form-label">LAST NAME</div>
                            <input type="text" class="form-control" name="lastname" style="text-transform:uppercase" value="<?=$fetch['lastname']?>" required>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">FIRST NAME</div>
                            <input type="text" class="form-control" name="firstname" style="text-transform:uppercase" value="<?=$fetch['firstname']?>" required>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">USERNAME</div>
                            <input type="text" class="form-control" name="username" value="<?=$fetch['username']?>" required>
                        </div>
                        <div class="mb-3">
                            <div class="form-label">NEW PASSWORD</div>
                            <input type="password" class="form-control" name="newpassword1" value="<?=$fetch['password']?>" required>
                        </div>
                        <div class="mb-5">
                            <div class="form-label">CONFIRM PASSWORD</div>
                            <input type="password" class="form-control" name="newpassword2" value="<?=$fetch['password']?>" required>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <div class="form-label" style="color: red;font-style:italic;">**CURRENT PASSWORD**</div>
                            <input type="password" class="form-control" name="password" required>
                        </div>
                        <div class="row">
                            <div class="col-3"></div>
                            <div class="col">
                                <input type="submit" class="btn btn-outline-success col-4" value="UPDATE">
                                <a href="javascript:history.go(-1)" class="btn btn-outline-danger col-4">CANCEL</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>


    
        </div>


        <script src="../../src/js/bootstrap.bundle.min.js"></script>

        <style>
            .container {
                margin-top: 100px;
                margin-bottom: 50px;
            }
            .greeting {
                margin-left: 30px;
            }
        </style>
   

    </body>






</html>