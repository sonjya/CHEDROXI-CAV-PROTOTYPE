<?php 

session_start();

require_once "../../../modules/dbconnection.php";

$UID = $_SESSION['UID'];
$schoolid = $_GET['id'];

//to get messages
$sql = "select a.id,a.schoolid,schooldesc,message,date,a.active from tbl_messages a inner join tbl_schools b where a.schoolid=b.schoolid and a.schoolid='$schoolid' order by date desc";
$result = mysqli_query($connection,$sql);

//to get replies
$sql1 = "select a.id,messageid,reply,datetime from tbl_message_replies a inner join tbl_messages b where a.messageid=b.id";
$result1 = mysqli_query($connection,$sql1);

?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="../../../src/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="body-bg">

        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h1>MESSAGES</h1>
                    <a href="../../../modules/admin-viewedmessage.php?id=<?=$schoolid?>" class="btn btn-outline-danger">CLOSE</a>
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
                                <div class="card mb-1">
                                    <div class="card-body">
                                        <h6 style="text-indent:5ch;"><?=$fetch['message']?></h6>
                                    </div>
                                </div>
                                <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-1">
                                                <h5>REPLY:</h5>
                                            </div>
                                            <div class="col-10">
                                                <input type="text" class="form-control" name="reply">
                                            </div>
                                            <div class="col-1">
                                                <input type="submit" class="btn btn-outline-success">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }?>
                </div>
            </div>
        </div>


        <script src="../../../src/js/bootstrap.bundle.min.js"></script>

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