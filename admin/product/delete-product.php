<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "wushu-society";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    require_once 'product-model.php';
    require_once 'product-view.php';
    require_once 'product-contr.php';
    
    delete_product ($conn, $id);
    $_SESSION['delete_product_success'] = "<h2 class='success'>Product Deleted Successfully!!!</h2>";
    header('location:../manage-products.php');
    die();
}
