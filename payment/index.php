<?php
session_start();
$type = $_SESSION['user'];
$user_id = $_SESSION['user_id'];
$schedule_id=$_SESSION['schedule_id'];
$bus_id=$_SESSION['bus_id'];
include("../connection.php");
include("../includes/isloggedout.php");
include("../includes/isuser.php");
require_once 'config.php';
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
    <link rel="stylesheet" href="../style.css">
    <link rel="icon" type="image/png" href="../logo.png" />
    <title>ticket.com</title>
</head>

<body>
    <!-- Header -->
    <div class="container-fluid p-0">

    </div>

    <!-- NAVBAR -->
    <div class="container-fluid sticky-top p-0">
        <div class="row no-gutters">
            <div class="col-sm text-center">
                <?php
                include("../includes/backtohome.php");
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

                <!-- Display errors returned by checkout session -->
                <div id="paymentResponse"></div>

                <!-- Product details -->
                <div class="card mx-auto border-info" style="width: 20rem;">
                    <img src="../logo.png" class="card-img-top" alt="...">
                    <div class="card-body text-center border-danger">
                        <h5 class="card-title">Confirm Ticket</h5>
                        <p class="card-text text-danger">Before Proceeding to Checkout Confirm Your Ticket Details</p>
                    </div>
                    <ul class="list-group list-group-flush border-danger animate__animated animate__pulse animate__slower animate__repeat-3">
                        <li class="list-group-item">Passenger Name: <?php echo "$_SESSION[name]"; ?></li>
                        <li class="list-group-item">Contact: <?php echo "$_SESSION[phone]"; ?></li>
                        <li class="list-group-item">Total Seat: <?php echo "$_SESSION[total_seat]"; ?></li>
                        <li class="list-group-item">Seat Details: <?php echo "$_SESSION[allseat]"; ?></li>
                        <li class="list-group-item">Class: <?php echo "$_SESSION[class]"; ?></li>
                        <li class="list-group-item">Ticket ID: <?php echo "$_SESSION[ticket_id]"; ?></li>
                    </ul>
                    <div class="card-body">
                        <!-- Buy button -->
                        <div id="buynow">
                            <button class="stripe-button btn btn-success animate__animated animate__zoomIn" id="payButton">Pay $<?php echo "$productPrice" . ' ' . strtoupper($currency); ?></button><br>
                        </div>
                        <form action='<?php echo "../?schedule=$schedule_id&bus=$bus_id"; ?>' target='_self' enctype='multipart/form-data' method='POST'>
                            <br><button type='submit' class='btn btn-outline-danger' value='GO' name='go'>GO Back</button><br>
                        </form>
                    </div>
                </div>

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
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-sm">
                <?php
                include("../includes/footer.php");
                ?>
            </div>
        </div>
    </div>

</body>

</html>

<!-- Stripe JavaScript library -->
<script src="https://js.stripe.com/v3/"></script>
<script>
    var buyBtn = document.getElementById('payButton');
    var responseContainer = document.getElementById('paymentResponse');

    // Create a Checkout Session with the selected product
    var createCheckoutSession = function(stripe) {
        return fetch("stripe_charge.php", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
            },
            body: JSON.stringify({
                checkoutSession: 1,
            }),
        }).then(function(result) {
            return result.json();
        });
    };

    // Handle any errors returned from Checkout
    var handleResult = function(result) {
        if (result.error) {
            responseContainer.innerHTML = '<p>' + result.error.message + '</p>';
        }
        buyBtn.disabled = false;
        buyBtn.textContent = 'Buy Now';
    };

    // Specify Stripe publishable key to initialize Stripe.js
    var stripe = Stripe('<?php echo "pk_test_51ItZkdA5CMRaeCa6gkHE8iaiHgYAtlKw52bgR7gNCagjgo7aZWbPnS3iyVMQDHt9DFIIO2zTXlzAZ9AbP2F2t9ym009cCnbOct"; ?>');

    buyBtn.addEventListener("click", function(evt) {
        buyBtn.disabled = true;
        buyBtn.textContent = 'Please wait...';

        createCheckoutSession().then(function(data) {
            if (data.sessionId) {
                stripe.redirectToCheckout({
                    sessionId: data.sessionId,
                }).then(handleResult);
            } else {
                handleResult(data);
            }
        });
    });
</script>