<?php 
session_start();
include("parties/navbar.php");

if (!isset($_SESSION['login-check'])) {
    $_SESSION['cart'] = '<h2 class="danger text-center">Login To Purchase Order!!!</h2>';
    header('location:login.php');
    die();
}

// Initialize cart if not already set
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Add item to cart
if (isset($_GET['action']) && $_GET['action'] === 'add' && isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];
    if (!isset($_SESSION['cart'][$productId])) {
        $_SESSION['cart'][$productId] = 1; // Initialize quantity to 1 if not already set
    } else {
        $_SESSION['cart'][$productId]++; // Increment quantity if product is already in the cart
    }
}

// Remove item from cart
if (isset($_GET['action']) && $_GET['action'] === 'remove' && isset($_GET['product_id'])) {
    $productId = $_GET['product_id'];
    if (isset($_SESSION['cart'][$productId])) {
        if ($_SESSION['cart'][$productId] > 1) {
            $_SESSION['cart'][$productId]--; // Decrement quantity if greater than 1
        } else {
            unset($_SESSION['cart'][$productId]); // Remove product from cart if quantity is 1
        }
    }
}

// Fetch products from database based on the cart items
include("../admin/db_connect.php");

// Fetch products in the cart along with their quantities
$cartProducts = [];
if (!empty($_SESSION['cart'])) {
    $cartProductIds = implode(",", array_keys($_SESSION['cart']));
    $sql = "SELECT * FROM tbl_product WHERE product_id IN ($cartProductIds)";
    $result = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($result)) {
        $row['quantity'] = $_SESSION['cart'][$row['product_id']];
        $cartProducts[] = $row;
    }
}

// Calculate total price
$totalPrice = array_sum(array_column($cartProducts, 'product_price'));

// Store total price in session
$_SESSION['total_price'] = $totalPrice;

?>

<!DOCTYPE html>
<html>
<head>
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="../css/style.css" />
    <style>
        /* Additional CSS for cart styling */
        .cart-container {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            grid-gap: 20px;
            padding: 20px;
        }
        .cart-item {
            width: 200px; /* Set fixed width */
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
        .cart-item img {
            max-width: 100px;
            max-height: 100px;
            margin-bottom: 10px;
        }
        .cart-item h3, .cart-item p {
            margin: 5px 0;
        }
        .btn-pay {
            display: block;
            width: 200px;
            margin: 20px auto;
            padding: 10px;
            text-align: center;
            background-color: #1a73e8;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-remove {
            color: red;
            cursor: pointer;
        }
    </style>
</head>
<body><br><br><br><br>
    <a href='product.php' class="btn-back">Back</a>
    <h1>Shopping Cart</h1>
    <div class="cart-container">
        <?php foreach ($cartProducts as $product): ?>
            <div class="cart-item">
                <img src="../img/product/<?php echo $product['product_img']; ?>" width="100" height="100" alt="product image">
                <h3><?php echo $product['product_name']; ?></h3>
                <p>Quantity: <?php echo $product['quantity']; ?></p>
                <p>Price: <?php echo $product['product_price']; ?></p>
                <a href="cart.php?action=remove&product_id=<?php echo $product['product_id']; ?>" class="btn-remove">Remove</a>
            </div>
        <?php endforeach; ?>
    </div>
    <div id="total-price-container">
        <h2>Total Price: $<?php echo $totalPrice; ?></h2>
    </div>
    <?php
    if ($totalPrice != 0) {
        ?>
        <a href="payment.php" class="btn-pay">Proceed to Payment</a>
        <?php
    } else {
        ?>
        <br><br><br>
        <?php
    }
    ?>
</body>
<?php include("parties/footer.php"); ?>
</html>
