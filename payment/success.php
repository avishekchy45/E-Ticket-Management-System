<?php
session_start();
$type = $_SESSION['user'];
$user_id = $_SESSION['user_id'];
include("../connection.php");
include("../includes/isloggedout.php");
include("../includes/isuser.php");

$counter = $_SESSION['counter'];
$schedule_id = $_SESSION['schedule_id'];
$bus_id = $_SESSION['bus_id'];
$class = $_SESSION['class'];
$coach = $_SESSION['coach'];
$name = $_SESSION['name'];
$phone = $_SESSION['phone'];
$phone = $_SESSION['phone'];
$choosedseat = $_SESSION['choosedseat'];
$total_seat = $_SESSION['total_seat'];
$ticket_id = $_SESSION['ticket_id'];
$allseat = $_SESSION['allseat'];

// Include configuration file  
require_once 'config.php';

// Include database connection file  
include_once '../connection.php';

$payment_id = $statusMsg = '';
$ordStatus = 'error';

// Check whether stripe checkout session is not empty 
if (!empty($_GET['session_id'])) {
    $session_id = $_GET['session_id'];

    // Fetch transaction data from the database if already exists 
    $sql = "SELECT * FROM payment WHERE CHECKOUT_SESSION_ID = '" . $session_id . "'";
    $result = $con->query($sql);
    if ($result->num_rows > 0) {
        $orderData = $result->fetch_assoc();

        $transactionID = $orderData['TXN_ID'];
        $paidAmount = $orderData['AMOUNT'];
        $paidCurrency = $orderData['AMOUNT_CURR'];
        $paymentStatus = $orderData['PAYMENT_STATUS'];

        $ordStatus = 'success';
        $statusMsg = 'Your Payment has been Successful!';
    } else {
        // Include Stripe PHP library  
        require_once 'stripe-php/init.php';

        // Set API key 
        \Stripe\Stripe::setApiKey(STRIPE_API_KEY);

        // Fetch the Checkout Session to display the JSON result on the success page 
        try {
            $checkout_session = \Stripe\Checkout\Session::retrieve($session_id);
        } catch (Exception $e) {
            $api_error = $e->getMessage();
        }

        if (empty($api_error) && $checkout_session) {
            // Retrieve the details of a PaymentIntent 
            try {
                $intent = \Stripe\PaymentIntent::retrieve($checkout_session->payment_intent);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }

            // Retrieves the details of customer 
            try {
                // Create the PaymentIntent 
                $customer = \Stripe\Customer::retrieve($checkout_session->customer);
            } catch (\Stripe\Exception\ApiErrorException $e) {
                $api_error = $e->getMessage();
            }

            if (empty($api_error) && $intent) {
                // Check whether the charge is successful 
                if ($intent->status == 'succeeded') {
                    // Customer details 
                    $name = $customer->name;
                    $email = $customer->email;

                    // Transaction details  
                    $transactionID = $intent->id;
                    $paidAmount = $intent->amount;
                    $paidAmount = ($paidAmount / 100);
                    $paidCurrency = $intent->currency;
                    $paymentStatus = $intent->status;

                    // Insert ticket data into the database 
                    $query = "INSERT INTO ticket (TICKET_ID,SCHEDULE_ID,SEAT,NAME,CONTACT,BOOKED_BY,PRICE) VALUES ('$ticket_id','$schedule_id','$allseat','$name','$phone','$counter','$price')";
                    if (mysqli_query($con, $query)) {
                        echo "<script>alert('Successfully Booked Seat ( $allseat )')</script>";
                    } else {
                        echo "<div class='text-danger'> Booking error! </div>" . mysqli_error($con);
                    }

                    $n = 0;
                    $failed = 0;
                    while ($n < $total_seat) {
                        $seat = $choosedseat[$n++];
                        $query = "INSERT INTO bookedseat (TICKET_ID,SEAT) VALUES ('$ticket_id','$seat')";
                        if (!mysqli_query($con, $query)) {
                            $failed++;
                            echo "<div class='text-danger'> Booking error! </div>" . mysqli_error($con);
                        }
                    }
                    /*
                    if ($failed == 0) {
                        echo ("<script>location.href = 'printticket.php?ticket=$ticket_id';</script>");
                    */
                    // Insert transaction data into the database 
                    $sql = "INSERT INTO payment(TICKET_ID,AMOUNT,AMOUNT_CURR,TXN_ID,PAYMENT_STATUS,CHECKOUT_SESSION_ID,CREATED,MODIFIED) VALUES('$ticket_id','$paidAmount','$paidCurrency','$transactionID','$paymentStatus','$session_id',NOW(),NOW())";
                    $insert = $con->query($sql);

                    // If the order is successful 
                    if ($paymentStatus == 'succeeded') {
                        $statusMsg = 'Your Payment has been Successful!';
                    } else {
                        $statusMsg = "Your Payment has failed!";
                    }
                } else {
                    $statusMsg = "Transaction has been failed!";
                }
            } else {
                $statusMsg = "Unable to fetch the transaction details! $api_error";
            }

            $ordStatus = 'success';
        } else {
            $statusMsg = "Transaction has been failed! $api_error";
        }
    }
} else {
    $statusMsg = "Invalid Request!";
}
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

                <h1 class="text-warning text-center <?php echo $ordStatus; ?>"><?php echo $statusMsg; ?></h1>
                <h5 class="text-info text-center">Payment Information</h5>
                <p class="text-justify"><b>Transaction ID:</b> <?php echo $transactionID; ?></p>
                <p class="text-justify"><b>Paid Amount:</b> <?php echo $paidAmount . ' ' . strtoupper($paidCurrency); ?></p>
                <p class="text-justify"><b>Payment Status:</b> <?php echo strtoupper($paymentStatus); ?></p>

                <h5 class="text-info text-center">Product Information</h5>
                <p class="text-justify"><b>Ticket ID:</b> <?php echo $ticket_id; ?></p>
                <p class="text-justify"><b>Price:</b> <?php echo $productPrice . ' ' . strtoupper($currency); ?></p>

                <a href='<?php echo"../all/printticket.php?ticket=$ticket_id"; ?>' class='btn btn-outline-primary'>PRINT TICKET</a><br>

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