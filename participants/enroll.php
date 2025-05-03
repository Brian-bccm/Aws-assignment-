<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Enroll</title>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link
      rel="stylesheet"
      href="https://www.w3schools.com/lib/w3-theme-black.css"
    />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Roboto"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link rel="stylesheet" href="../css/ryan-styles.css">
  </head>
  <body>
    <!-- Navbar content -->
    <!-- Navbar (sit on top) -->
    <section class="nav">
        <div class="logo">
          <img src="../img/wushu_society_logo.png" alt="Wushu Society Logo" />
        </div>
        <nav>
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="product.php">Product</a></li>
              <li><a href='society.php'>Society</a>
                <ul>
                  <li><a href='announcement.php'>announcement</a></li>
                  <li><a href='timetable.php'>timetable</a></li>
                </ul>
              </li>


              <li><a href="event.php">Event</a>
                <ul>
                  <li><a href=event.php>Up Coming Events</a></li>
                  <li><a href="participate.php">Participate</a></li> <!-- Join Competition -->
                  <li><a href=ranking.php>Ranking</a></li>
                </ul>
              </li>
              <li><a href="account.php">Account</a>
                <ul>
                  <li><a href='../participants/account.php'>Your Account</a></li>
                  <li><a href="login.php">User</a></li>
                  <li><a href="../admin/login.php">Admin</a></li>
                  <li><a href='../participants/logout.php'>Logout</a></li>
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
            <img src="../img/grocery-store.png" alt="cart" class="cart-img">
          </div>
        </div>
    </section>

      <!-- Navbar on small screens -->
      <div
        id="navDemo"
        class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium"
      >
        <a
          href="#about"
          class="w3-bar-item w3-button"
          onclick="toggleFunction()"
          >Enroll</a
        >
        <a href="" class="w3-bar-item w3-button" onclick="toggleFunction()"
          >Timetable</a
        >
        <a
          href="#contact"
          class="w3-bar-item w3-button"
          onclick="toggleFunction()"
          >Ticketing</a
        >
        <a href="#" class="w3-bar-item w3-button">SEARCH</a>
      </div>

    <div style="background-color: black">
      <div class="w3-display-container" style="margin-bottom: 50px">
        <img src="../img/kungfu2.webp" style="width: 100%" />
        <div
          class="w3-display-bottomleft w3-container w3-amber w3-hover-orange w3-hide-small"
          style="bottom: 10%; opacity: 0.7; width: 70%"
        >
          <h2><b>Enroll</b></h2>
        </div>
      </div>
    </div>

    <form
      action="/action_page.php"
      class="w3-container w3-card-4 w3-light-grey w3-text-blue w3-margin"
    >
      <h2 class="w3-center">Join Us Today</h2>

      <div class="w3-row w3-section">
        <div class="w3-col" style="width: 50px">
          <i class="w3-xxlarge fa fa-user"></i>
        </div>
        <div class="w3-rest">
          <input
            class="w3-input w3-border"
            name="first"
            type="text"
            placeholder="Name"
          />
        </div>
      </div>

      <div class="w3-row w3-section">
        <div class="w3-col" style="width: 50px">
          <i class="w3-xxlarge fa fa-user"></i>
        </div>
        <div class="w3-rest">
          <input
            class="w3-input w3-border"
            name="last"
            type="text"
            placeholder="Student Number"
          />
        </div>
      </div>

      <div class="w3-row w3-section">
        <div class="w3-col" style="width: 50px">
          <i class="w3-xxlarge fa fa-pencil"></i>
        </div>
        <div class="w3-rest">
          <input
            class="w3-input w3-border"
            name="action_page"
            type="text"
            placeholder="Password"
          />
        </div>
      </div>

      <div class="w3-row w3-section">
        <div class="w3-col" style="width: 50px">
          <i class="w3-xxlarge fa fa-envelope-o"></i>
        </div>
        <div class="w3-rest">
          <input
            class="w3-input w3-border"
            name="email"
            type="text"
            placeholder="Gmail"
          />
        </div>
      </div>

      <div class="w3-row w3-section">
        <div class="w3-col" style="width: 50px">
          <i class="w3-xxlarge fa fa-phone"></i>
        </div>
        <div class="w3-rest">
          <input
            class="w3-input w3-border"
            name="phone"
            type="text"
            placeholder="Phone"
          />
        </div>
      </div>

      <p class="w3-center">
        <button class="w3-button w3-section w3-blue w3-ripple">Send</button>
      </p>
    </form>
    <script>
      // Change style of navbar on scroll
      window.onscroll = function () {
        myFunction()
      }
      function myFunction() {
        var navbar = document.getElementById("myNavbar")
        if (
          document.body.scrollTop > 100 ||
          document.documentElement.scrollTop > 100
        ) {
          navbar.className =
            "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white"
        } else {
          navbar.className = navbar.className.replace(
            " w3-card w3-animate-top w3-white",
            ""
          )
        }
      }
    </script>
    <!-- Footer Start here -->
    <footer>
        <div class="wrapper">
            <div class="sm">
                <h1>Wushu Society</h1>
                <div class="sm-links">
                    <img src="../img/instagram.png" alt="instagram">
                    <img src="../img/facebook.png" alt="facebook">
                    <img src="../img/youtube.png" alt="youtube">
                </div>
            </div>
            <div class="col-4">
                <p>About Us</p>
                <br>
                <a href="">About Us</a>
                <br>
                <a href="">Contact Us</a>
                <br>
                <a href="">FAQs</a>
            </div>
            <div class="col-4">
                <p>Links</p>
                <br>
                <a href="">Membership</a>
                <br>
                <a href="">Events</a>
                <br>
                <a href="">Resources</a>
                <br>
                <a href="">Blog</a>
            </div>
            <div class="col-4">
                <p>Social Media</p>
                <br>
                <a href="">Social Media Links</a>
                <br>
                <a href="">Newsletter Signup</a>
                <br>
                <a href="">Volunteer Opportunities</a>
            </div>
            <div class="col-4">
                <p>Policy</p>
                <br>
                <a href="">Privacy Policy</a>
                <br>
                <a href="">Terms of Use</a>
                <br>
                <a href="">Copyright Information</a>
                <br>
                <a href="">Accessibility Statement</a>
            </div>
            <div class="clearfix"></div>
        </div>
    </footer>
<!-- Footer Ended here -->
  </body>
</html>
