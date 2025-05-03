
  
<!DOCTYPE html>
<html lang="en">
<head>
<title>Time Table</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
<link rel="stylesheet" href="../css/bootstrap.css" />
<link rel="stylesheet" href="../css/ryan-styles.css">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css">

</head>

<body class="w3-light-grey">

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
<div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
  <a href="#about" class="w3-bar-item w3-button" onclick="toggleFunction()">Enroll</a>
  <a href="" class="w3-bar-item w3-button" onclick="toggleFunction()">Timetable</a>
  <a href="#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">Ticketing</a>
  <a href="#" class="w3-bar-item w3-button">SEARCH</a>
</div>


<div style="background-color: black;" >
  <div class="w3-display-container" style="margin-bottom:50px  ">
      <img src="../img/kungfu2.webp" style="width:100%">
      <div class="w3-display-bottomleft w3-container w3-amber w3-hover-orange w3-hide-small"
       style="bottom:10%;opacity:0.7;width:70%">
      <h2><b>Events</b></h2>
    </div>
    </div>
</div>

<div class="w3-content" style="max-width:1100px;">

  <!-- Good offers -->
  <div class="w3-container w3-margin-top">
    <h3>Buy Ur Tickets Right Now</h3>
  </div>
  <div class="w3-row-padding w3-text-white w3-large">
    <div class="w3-half w3-margin-bottom">
      <div class="w3-display-container">
        <img src="../img/place1.PNG"  style="width:100%">
        <span style="text-decoration: solid;" class="w3-display-bottomleft w3-padding">National Competition</span>
      </div>
    </div>
    <div class="w3-half">
      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="../img/place 2.PNG"  style="width:100%">
            <span style="text-decoration: solid;" class="w3-display-bottomleft w3-padding">U16 Competition</span>
          </div>
        </div>
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="../img/place3.PNG"  style="width:100%">
            <span style="text-decoration: solid;" class="w3-display-bottomleft w3-padding">U17 Competition</span>
          </div>
        </div>
      </div>
      <div class="w3-row-padding" style="margin:0 -16px">
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="../img/place 5.jpeg"  style="width:100%">
            <span style="text-decoration: solid;" class="w3-display-bottomleft w3-padding " >U20 Competition</span>
          </div>
        </div>
        <div class="w3-half w3-margin-bottom">
          <div class="w3-display-container">
            <img src="../img/place4.jpeg"  style="width:100%">
            <span style="text-decoration: solid;" class="w3-display-bottomleft w3-padding">Free-For-All Competition</span>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Tickets -->
  <div class="w3-container">
    <h3>Events Right now</h3>
    <p>Buy your tickets now</p>
  </div>
  <div class="w3-row-padding">
    <div class="w3-half w3-margin-bottom">
      <img src="../img/place1.PNG" alt="Norway" style="width:100%">
      <div class="w3-container w3-white">
        <h3>U16 Competition</h3>
        <p class="w3-opacity">Fri 27 April 2024</p>
        <p>Secure your seat to witness the electrifying performances of our U16 wushu champions! Get your tickets now and witness the power, grace, and skill on display.</p>
        <button class="w3-button w3-margin-bottom">Buy Tickets</button>
      </div>
    </div>
    <div class="w3-half w3-margin-bottom">
      <img src="../img/place 2.PNG" alt="Austria" style="width:100%">
      <div class="w3-container w3-white">
        <h3>U17</h3>
        <p class="w3-opacity">Sat 28 March 2024</p>
        <p>Ready to witness the next generation of wushu talent? Reserve your tickets now for the U17 wushu competition and experience the incredible feats of athleticism and artistry firsthand!</p>
        <button class="w3-button w3-margin-bottom">Buy Tickets</button>
      </div>
    </div>
    <br>
    <div class="w3-half w3-margin-bottom">
      <img src="../img/place3.PNG" alt="Austria" style="width:100%">
      <div class="w3-container w3-white">
        <h3>National</h3>
        <p class="w3-opacity">Sat 28 March 2024</p>
        <p>Join us at the pinnacle of wushu excellence! Purchase your tickets today for the National Wushu Competition and be part of the excitement as top athletes from across the nation compete for glory and honor.</p>
        <button class="w3-button w3-margin-bottom">Buy Tickets</button>
      </div>
    </div>
  </div>

  

  <script>

    // Change style of navbar on scroll
  window.onscroll = function() {myFunction()};
  function myFunction() {
      var navbar = document.getElementById("myNavbar");
      if (document.body.scrollTop > 100 || document.documentElement.scrollTop > 100) {
          navbar.className = "w3-bar" + " w3-card" + " w3-animate-top" + " w3-white";
      } else {
          navbar.className = navbar.className.replace(" w3-card w3-animate-top w3-white", "");
      }
  }
  
  </script>
</body>

</html>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="../js/script.js"></script>
<script src="../js/jQuery.js"></script>
<script src="../js/js/bootstrap.js"></script>
</div>
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