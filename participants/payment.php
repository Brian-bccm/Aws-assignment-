<?php
include("parties/navbar.php");
include("../admin/db_connect.php");

// Check if the user has items in the cart
if (empty($_SESSION['cart'])) {
    echo "Your cart is empty. Please add items before proceeding to payment.";
    exit;
}

// Retrieve the total price from the session
$totalPrice = isset($_SESSION['total_price']) ? $_SESSION['total_price'] : 0;

// Process the payment if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $paymentMethod = $_POST['payment_method'];
    $userId = 1; // Replace with the actual user ID
    $paymentStatus = 'Paid';
    $transactionId = uniqid(); // Generate a unique transaction ID

    // Insert the payment details into the database
    $sql = "INSERT INTO tbl_payment (user_id, payment_method, payment_status, transaction_id, amount, payment_date)
            VALUES ('$userId', '$paymentMethod', '$paymentStatus', '$transactionId', '$totalPrice', NOW())";

    if (mysqli_query($conn, $sql)) {
        // Clear the cart after successful payment
        unset($_SESSION['total_price']);

        // Display a success message
        echo '<script>alert("Payment successful! Thank you for your purchase.");</script>';
        header('location:intro.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Payment</title>
    <link rel="stylesheet" href="../css/style.css" />
    <style>
        .payment-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .payment-form label {
            display: block;
            margin-bottom: 10px;
        }
        .payment-form input[type="radio"] {
            margin-right: 5px;
        }
        .payment-form button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #1a73e8;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .credit-card-info, .tng-info {
            margin-top: 10px;
            padding: 10px;
            background-color: #f5f5f5;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <br><br><br><br>
    <a href='cart.php' class="btn-back">Back to Cart</a>
    <h1>Payment</h1>
    <div class="payment-form">
        <h2>Total Price: $<?php echo $totalPrice; ?></h2>
        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label>
                <input type="radio" name="payment_method" value="tng" required>
                TNG
                <div class="tng-info" style="display: none;">
                    <img src="../img/tng.jpg" alt="TNG" width="150" height="150">
                </div>
            </label>
            <label>
                <input type="radio" name="payment_method" value="credit_card" required>
                Credit Card
            </label>
            <div class="credit-card-info" style="display: none;">
                <label>
                    Card Number:
                    <input type="text" name="card_number" placeholder="Enter card number" required>
                </label>
                <label>
                    Expiration Date:
                    <input type="text" name="expiration_date" placeholder="MM/YY" required>
                </label>
                <label>
                    CVV:
                    <input type="text" name="cvv" placeholder="CVV" required>
                </label>
            </div>
            <button type="submit">Proceed</button>
        </form>
    </div>
    <script>
        // Show/hide credit card information and TNG image based on the selected payment method
        const paymentMethodRadios = document.querySelectorAll('input[name="payment_method"]');
        const creditCardInfo = document.querySelector('.credit-card-info');
        const tngInfo = document.querySelector('.tng-info');

        paymentMethodRadios.forEach(radio => {
            radio.addEventListener('change', () => {
                if (radio.value === 'credit_card') {
                    creditCardInfo.style.display = 'block';
                    tngInfo.style.display = 'none'; // Hide TNG info
                } else if (radio.value === 'tng') {
                    creditCardInfo.style.display = 'none';
                    tngInfo.style.display = 'block'; // Show TNG info
                } else {
                    creditCardInfo.style.display = 'none';
                    tngInfo.style.display = 'none';
                }
            });
        });
    </script>
</body>
<?php include("parties/footer.php"); ?>
</html>
