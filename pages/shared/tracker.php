<?php 

session_start();

require_once "../../modules/dbconnection.php";

$search = $_GET['search'];

$sql = "select status from tbl_process where ornumber='$search' limit 1";
$result = mysqli_query($connection,$sql);
$fetch = mysqli_fetch_assoc($result);

error_reporting(0);

?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="../../src/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="body-bg">

        <div class="container">
            <div class="card">
                <div class="card-header text-bg-primary">
                    TRACKING
                </div>
                <div class="card-body">
                    <form method="post" action="../../modules/shared-track-route.php">
                        <div class="row">
                            <div class="col-3 mt-2"><h1>OR NUMBER:</h1></div>
                            <div class="col-6 mt-3"><input type="number" class="form-control" name="search" required></div>
                            <div class="col"><input type="submit" class="btn btn-outline-primary col-9 mt-3" value="SUBMIT"></div>
                        </div>
                    </form>

                    <div class="card">
                        <div class="card-body">

                            <?php if($fetch['status'] == 'Pending' || $fetch['status'] == 'Processing' || $fetch['status'] == 'Validated') { ?>
                                <div class="row">
                                    <div class="col-3">
                                        <div class="text-center">
                                            <div class="spinner-grow" role="status"></div>
                                        </div>
                                    </div>
                                        <div class="col-3" style="color:red;"><h1>PENDING</h1></div>
                                        <div class="col-3" style="color:orange;"><h1>PROCESSING</h1></div>
                                        <div class="col-3" style="color:green;"><h1>VALIDATED</h1></div>
                                    </div>
                          
                                    <?php if($fetch['status'] == 'Pending') { ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="width: 40%"></div>
                                        </div>
                                    <?php } elseif ($fetch['status'] == 'Processing') { ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 70%"></div>
                                        </div>
                                    <?php } elseif ($fetch['status'] == 'Validated') { ?>
                                        <div class="progress">
                                            <div class="progress-bar bg-success" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    <?php } elseif ($fetch['status'] == 'Rejected') { ?>
                                        <div class="progress">
                                            <div class="progress-bar bg-danger" role="progressbar" style="width: 100%" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div>
                                    <?php } ?>
                                    
                            <?php } else { ?>

                                <div class="card mt-3">
                                    <div class="card-body">
                                        <h1 style="color:red;font-style:italic">Sorry :( , We can't find OR No. <?=$search?>. Please make sure you entered the correct OR Number.</h1>
                                    </div>
                                </div>

                            <?php } ?>









                        </div>



                    </div>

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
            .body-bg {
                background-color:#E0E0E0;
            }
        </style>
   

    </body>






</html>