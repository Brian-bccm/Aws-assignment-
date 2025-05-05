<?php include('../config/constants.php'); ?>
<section class="nav">
  <div class="logo">
    <img src="../img/GP-logo-design-vector-Graphics-19461850-1-1-580x386.jpg" alt="GP Logo" />
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
            <li><a href='account.php'>Your Account</a></li>
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