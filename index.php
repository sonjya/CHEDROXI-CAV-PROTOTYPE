<?php 
session_start();
?>

<!doctype html>
<html>
    <head>
        <title>CHEDROXI-CAV</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    </head>

    <body class="bg-image">
        <div class="container" style="width:25rem;">
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

                                <input type="submit" class="btn btn-outline-success col-12" value="LOGIN">

                            </form>
                    </div>
                </div>
        </div>
        
        <div class="container tracker" style="width:25rem;">
            <div class="card">
                <div class="card-body">
                    <a href="modules/shared-track-route.php" target="blank" class="btn btn-outline-secondary col-12">TRACKER</a>
                </div>
            </div>
        </div>



 
      
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
        <style>
            .container {
                margin-top: 100px;
            }
            .bg-image {
            background-image: url("images/chedroxi.png");
            height: 100%;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
            }
            .container.tracker {
                margin-top:10px;
            }
        </style>

    </body>



</html>