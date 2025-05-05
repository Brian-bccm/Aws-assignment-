<?php
include('../config/constants.php');
include('login-check.php');
?>

<html>

<head>
    <meta charset="UTF-8">
    <title>Wushu Society - Home Page</title>
    <!-- <link rel="stylesheet" href="../css/reset.css"> -->
    <link rel="icon" type="image/x-icon" href="../img/wushu_society_logo.png">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">
    <link rel="stylesheet" href="../css/admin.css">
</head>

<body>
    <div class="container">
        <!-- Sidebar Section -->
        <aside>
            <div class="toggle">
                <div class="logo">
                    <img src="../img/graduation-logo.webp">
                    <h2>Grad<span class="danger">Shop</span></h2>
                </div>
                <div class="close" id="close-btn">
                    <span class="material-icons-sharp">
                        close
                    </span>
                </div>
            </div>

            <div class="sidebar">

                <a href="index.php" class="active">
                    <span class="material-icons-sharp">
                        home
                    </span>
                    <h3>Home</h3>
                </a>

                <a href="manage-admin.php">
                    <span class="material-icons-sharp">
                        support_agent
                    </span>
                    <h3>Admin</h3>
                </a>

                <a href="manage-user.php">
                    <span class="material-icons-sharp">
                        person_outline
                    </span>
                    <h3>Users</h3>
                </a>

                <a href="manage-products.php">
                    <span class="material-icons-sharp">
                        production_quantity_limits
                    </span>
                    <h3>Products</h3>
                    <span class="message-count">27</span>
                </a>

                <a href="manage-payment.php">
                    <span class="material-icons-sharp">
                        payments
                    </span>
                    <h3>Payments</h3>
                </a>

                <a href="logout.php" class="logout">
                    <span class="material-icons-sharp">
                        logout
                    </span>
                    <h3>Logout</h3>
                </a>
            </div>
        </aside>
        <!-- End of Sidebar Section -->