<?php include('../config/constants.php'); ?>

<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Wushu Society</title>
  <!-- <link rel="stylesheet" href="../css/reset.css" /> -->
  <link rel="icon" type="image/x-icon" href="../img/wushu_society_logo.png">
  <link rel="stylesheet" href="../css/style.css" />
  <script src="../js/myjs.js"></script>
</head>

<body>
  <section class="nav">
    <div class="logo">
      <img src="../img/GP-logo-design-vector-Graphics-19461850-1-1-580x386.jpg" />
    </div>
    <nav>
      <ul>
        <li><a href="intro.php">Home</a></li>
        <li><a href="product.php">Product</a></li>
        <?php
        if (isset($_SESSION['login-check'])) {
          ?>
          <?php
        }
        ?>
        <li><a href="account.php">Account</a>
          <ul>
            <?php if (isset($_SESSION['login-check'])) { ?>
              <li><a href=' account.php'>Your Account</a></li>
              <li><a href='logout.php'>Logout</a></li>
            <?php } else {
              ?>
              <li><a href="login.php">User</a></li>
              <li><a href="../admin/login.php">Admin</a></li>
              <?php
            } ?>
          </ul>
        </li>
      </ul>
    </nav>
    <div class="search">
      <form action="" method="post">
        <input type="text" name="search" placeholder="Search ... ">
        <button type="submit"><img src="../img/search.png" alt="search button"></button>
      </form>
      <div class="cart">
        <a href="cart.php"><img src="../img/grocery-store.png" alt="cart" class="cart-img"></a>
      </div>
    </div>
  </section>
  <!-- Navigation Section Ended Here -->