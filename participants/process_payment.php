<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Start the session
session_start();

// Include the database connection file
include("db_connection.php");

// Check if the form was submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Fetch the payment method
    $paymentMethod = $_POST['payment_method'];

    // Here you would handle the payment processing logic for each payment method
    // For this example, we'll simulate a successful payment
    $paymentSuccessful = true; // This should be based on actual payment processing logic

    if ($paymentSuccessful) {
        // Payment was successful
        echo "<script type='text/javascript'>
                alert('You had successfully paid!');
                window.location.href = 'intro.php'; // Redirect to a success page or another page if needed
              </script>";
    } else {
        // Payment failed
        echo "<script type='text/javascript'>
                alert('Payment failed. Please try again.');
                window.location.href = 'payment.php'; // Redirect to a retry page or another page if needed
              </script>";
    }
}

?>
