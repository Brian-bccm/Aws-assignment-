<?php include('../config/constants.php'); ?>
<section class="nav">
        <div class="logo">
          <img src="../img/wushu_society_logo.png" alt="Wushu Society Logo" />
        </div>
        <nav>
            <ul>
              <li><a href="intro.php">Home</a></li>
              <li><a href="product.php">Product</a></li>
              <?php
              if (isset($_SESSION['login-check'])) {
                ?>
                <li><a href=''>Society</a>
                  <ul>
                    <li><a href='announcement.php'>announcement</a></li>
                    <li><a href='timetable.php'>timetable</a></li>
                  </ul>
                </li>
                <?php
              }
              ?>
              <li><a href="event.php">Event</a>
                <ul>
                  <li><a href=event.php>Up Coming Events</a></li>
                  <li><a href=ranking.php>Ranking</a></li>
                </ul>
              </li>
              <li><a href="account.php">Account</a>
                <ul>
                  <li><a href="login.php">User</a></li>
                  <li><a href="../admin/login.php">Admin</a></li>
                  <?php if(isset($_SESSION['login-check'])) { ?>
                  <li><a href='account.php'>Your Account</a></li>
                  <li><a href='logout.php'>Logout</a></li>
                  <?php } ?>
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