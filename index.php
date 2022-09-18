<?php 
session_start();
?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="src/css/bootstrap.min.css" rel="stylesheet">
    </head>

    <body>
        <div class="container" style="width: 30rem;">
                <div class="col-9">
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

                                <input type="submit" class="btn btn-success" value="LOGIN">
                            </form>
                        </div>
                    </div>
                </div>
            <!-- </div> -->
        </div>


 
        <script src="src/js/bootstrap.bundle.min.js"></script>


        <style>
            .container {
                margin-top: 100px;
            }
        </style>

    </body>



</html>