<?php
session_start();
include("connection.php");
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.24/css/jquery.dataTables.min.css">
    <script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/png" href="logo.png" />
    <title>ticket.com</title>

</head>

<body>
    <!-- Carousel Header -->
    <div class="container-fluid p-0">
        <?php
        include("includes/carouselheader.php");
        ?>
    </div>

    <!-- NAVBAR -->
    <div class="container-fluid p-0 sticky-top">
        <div class="row no-gutters">
            <div class="col-sm text-center">
                <?php
                include("includes/navbarhome.php");
                ?>
            </div>
        </div>
    </div>

    <!-- MENU,MAIN,SIDEBAR -->
    <div class="container-fluid">
        <div class="row">
            <!-- MENU -->
            <div class="col-sm-2 text-left">

            </div>
            <!-- MAIN -->
            <div class="col-sm-8 text-center">
                <?php
                include("includes/searchform.php");
                include("includes/searchresult.php");
                include("includes/ticketformpayment.php");
                ?>
            </div>
            <!-- SIDEBAR -->
            <div class="col-sm-2 text-right">
                <?php
                include("includes/sidebar.php");
                ?>
            </div>
        </div>
    </div>

    <!-- FOOTER -->
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-sm">
                <?php
                include("includes/footer.php");
                ?>
            </div>
        </div>
    </div>

</body>

</html>