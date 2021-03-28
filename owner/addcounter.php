<?php
session_start();
$type = $_SESSION['user'];
$id = $_SESSION['user_id'];
include("../connection.php");
include("../includes/isloggedout.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../style.css">
    <title>ticket.com</title>
</head>

<body>
    <!-- Carousel Header -->
    <div class="container-fluid">

    </div>

    <!-- NAVBAR -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm text-center">
                <?php
                include("../includes/navbar.php");
                ?>
            </div>
        </div>
    </div>

    <!-- MENU,MAIN,SIDEBAR -->
    <div class="container-fluid">
        <div class="row">
            <!-- MENU -->
            <div class="col-sm-2 text-left">
                <?php
                include("../includes/menu.php");
                ?>
            </div>
            <!-- MAIN -->
            <div class="col-sm-8 text-center">
                <?php
                include("../includes/counterregform.php");
                ?>
            </div>
            <!-- SIDEBAR -->
            <div class="col-sm-2 text-right">
                <?php
                include("../includes/sidebar.php");
                ?>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm">
                <?php
                include("../includes/footer.php");
                ?>
            </div>
        </div>
    </div>


</body>

</html>