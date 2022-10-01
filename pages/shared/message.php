<?php 

session_start();

require_once "../../modules/dbconnection.php";

$UID = $_SESSION['UID'];
$schoolid = $_GET['id'];

$sql = "select a.id,a.schoolid,schooldesc,message,date,a.active from tbl_messages a inner join tbl_schools b where a.schoolid=b.schoolid and a.schoolid='$schoolid' order by date desc";
$result = mysqli_query($connection,$sql);

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
                <div class="card-header">
                    <h1>MESSAGES</h1>
                </div>
                <div class="card-body">
                    <?php while($fetch = mysqli_fetch_assoc($result)) { ?>
                        <div class="card mb-2">
                            <div class="card-header">
                                <div class="row">
                                    <div class="col-2">
                                        <?=$fetch['date']?>
                                    </div>
                                    <div class="col-1">
                                        <?php if($fetch['active'] == "1") { ?>
                                            <p style="background-color:green;text-align:center;color:white;">NEW</p>
                                        <?php }?>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <h6 style="text-indent:5ch;"><?=$fetch['message']?></h6>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>


        <script src="../../src/js/bootstrap.bundle.min.js"></script>

        <style>
            .container {
                margin-top: 50px;
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