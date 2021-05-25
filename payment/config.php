<?php
// Product Details  
// Minimum amount is $0.50 US  

$price = $_SESSION['price'];  
$ticket_id = $_SESSION['ticket_id'];  
$productPrice = $price/80;  
$currency = "usd";  

// Convert product price to cent 
$stripeAmount = round($productPrice * 100, 2);

// Stripe API configuration   
define('STRIPE_API_KEY', 'sk_test_51ItZkdA5CMRaeCa6FnrXvVp5BNTgp7tyi5HI9kCkZZBzezZIbY9Xxoy8xFajh7BGkmGH6hLRHb5ObbNHk9siazyj00FYGKHbvK');
define('STRIPE_PUBLISHABLE_KEY', 'pk_test_51ItZkdA5CMRaeCa6gkHE8iaiHgYAtlKw52bgR7gNCagjgo7aZWbPnS3iyVMQDHt9DFIIO2zTXlzAZ9AbP2F2t9ym009cCnbOct');
define('STRIPE_SUCCESS_URL', 'http://localhost/ticket.com/payment/success.php');
define('STRIPE_CANCEL_URL', 'http://localhost/ticket.com/payment/cancel.php');
