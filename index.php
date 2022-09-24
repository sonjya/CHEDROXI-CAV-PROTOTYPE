<?php 
session_start();
?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="src/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body class="body-bg bg-image">
        <div class="container" style="width: 30rem;">
                <div class="col-12">
                    <div class="card">
                        <img src="images/logo.png" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">LOGIN</h5>
                            <form method="POST" action="modules/auth.php">
                                <div class="mb-3">
                                    <label for="username" class="form-label">USERNAME</label>
                                    <input type="text" class="form-control" id="username" name="username" required>
                                    <label for="password" class="form-label">PASSWORD</label>
                                    <input type="password" class="form-control" id="password" name="password" required>
                                </div>
                                <?php 
                                    if (isset($_SESSION['error_message'])) { ?>
                                        <div class="alert alert-danger" role="alert">
                                            <?= $_SESSION['error_message'] ?>
                                        </div>
                                <?php } ?>

                                <div class="row">
                                    <div class="col-3"></div>
                                    <input type="submit" class="btn btn-outline-success col-6" value="LOGIN">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
        </div>


 
        <script src="src/js/bootstrap.bundle.min.js"></script>


        <style>
            .container {
                margin-top: 100px;
            }
            .body-bg {
                background-color:#E0E0E0;
            }
            .bg-image {
            background-image: url("images/chedroxi.png");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            }
        </style>

    </body>



</html>