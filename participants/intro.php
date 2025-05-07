<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

echo $undefinedVariable;
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Introduction Page</title>
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css"
      integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="../css/bootstrap.css" />
    <link rel="stylesheet" href="../css/ryan-styles.css" />
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css" />
    <link
      rel="stylesheet"
      href="https://fonts.googleapis.com/css?family=Lato"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      type="text/css"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css"
    />
    <style></style>
  </head>

  <body>
    <!-- Navbar content -->
    <!-- Navbar (sit on top) -->
    <?php include("parties/navbar-2.php") ?>

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


    <!-- Introduction content -->
    <div class="w3-display-container" style="margin-bottom: 50px">
      <img src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/Graduation - Cap throw.webp" style="width: 100%" />
      <div
        class="w3-display-bottomleft w3-container w3-amber w3-hover-orange w3-hide-small"
        style="bottom: 10%; opacity: 0.7; width: 70%"
      >
        <h2><b>GP World</b></h2>
      </div>
    </div>

    <div
      class="w3-container w3-content w3-center w3-padding-64"
      style="max-width: 800px"
      id="band"
    >
        <?php
        if (isset($_SESSION['login'])) {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        ?>
      <h2 class="w3-wide">High Quality Graduation Products</h2>
      <p class="w3-justify">
        Graduation World manufactures and distributes high quality graduation products at prices everyone can afford and delivered to you on time, every time. Whether you’re looking for a simple cap and gown combo, a graduation hood or other graduation accessories for kindergarten, high school or college, we have everything you need to look and feel great on your graduation day. For an extra special look, we even have a range of custom graduation products to ensure an edge to your graduation get-up. With a range of beautifully made doctoral robes and accessories and complete selection of academic regalia, Graduation World has the full set to cover all the needs of academic institutions.
      </p>
      <div class="w3-row w3-padding-32">
        <div class="w3-third">
          <img
            src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/grad-cover2-new_1024x1024.avif"
            class="w3-round w3-margin-bottom"
            alt="Random Name"
            style="width: 60%"
          />
        </div>
        <div class="w3-third">
          <img
            src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/grad-cover3-new_1024x1024.avif"
            class="w3-round w3-margin-bottom"
            alt="Random Name"
            style="width: 60%"
          />
        </div>

        <div class="w3-third">
          <img
            src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/grad-cover4.webp"
            class="w3-round"
            alt="Random Name"
            style="width: 60%"
          />
        </div>
      </div>
    </div>

    <!--Ticket-->
    <div class="w3-black" id="tour">
      <div
        class="w3-container w3-content w3-padding-64"
        style="max-width: 800px"
      >
        <h2 class="w3-wide w3-center">Our Products</h2>
        <p class="w3-opacity w3-center">
        </p>
        <div class="w3-row-padding w3-padding-32" style="margin: 0 -16px">
          <div class="w3-third w3-margin-bottom">
            <img
              src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/p1.webp"
              alt="place11"
              style="width: 100%"
              class="w3-hover-opacity"
            />
            <div class="w3-container w3-white">
              <p>
                Shiny Black College and University Graduation Cap, Gown & Tassel
              </p>
              <a href="../participants/product.php"><button>
                Buy 
              </button></a>
            </div>
          </div>
          <div class="w3-third w3-margin-bottom">
            <img
              src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/p2.webp"
              alt="Place2"
              style="width: 100%"
              class="w3-hover-opacity"
            />
            <div class="w3-container w3-white">
              <p>
                Matte Navy Blue College and University Graduation Cap, Gown & Tassel
              </p>
              <br />
              <a href="../participants/product.php"><button>
                Buy 
              </button></a>
            </div>
          </div>
          <div class="w3-third w3-margin-bottom">
            <img
              src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/p3.webp"
              alt="place3"
              style="width: 100%"
              class="w3-hover-opacity"
            />
            <div class="w3-container w3-white">
              <p>
                Deluxe Tam & Gown Package
              </p>
              <br />

              <a href="../participants/product.php"><button>
                Buy 
              </button></a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!--Slide code -->

    <div class="w3-black">
      <div
        class="w3-container w3-content w3-center w3-padding-64"
        style="max-width: 800px"
        id="band"
      >
        <h2 class="w3-wide">Wall Of Honor</h2>

        <div class="container">
          <div
            id="carouselExampleIndicators"
            class="carousel slide"
            data-ride="carousel"
          >
            <div class="carousel-inner" role="listbox">
              <div class="carousel-item active">
                <img
                  class="d-block w-100"
                  src="../img/gpbg1.jpeg"
                />
                <div class="carousel-caption d-none d-md-block"></div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../img/gpbg2.jpeg" />
              </div>
            </div>
            <a
              class="carousel-control-prev"
              href="#carouselExampleIndicators"
              role="button"
              data-slide="prev"
            >
              <span
                class="carousel-control-prev-icon"
                aria-hidden="true"
              ></span>
              <span class="sr-only">Previous</span>
            </a>
            <a
              class="carousel-control-next"
              href="#carouselExampleIndicators"
              role="button"
              data-slide="next"
            >
              <span
                class="carousel-control-next-icon"
                aria-hidden="true"
              ></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
          <br />

    </div>

    <!-- Footer Start here -->
    <footer>
        <div class="wrapper">
            <div class="sm">
                <h1>GP World</h1>
                <div class="sm-links">
                    <img src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/instagram.png" alt="instagram">
                    <img src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/facebook.png" alt="facebook">
                    <img src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/youtube.png" alt="youtube">
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
    <script
      src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
      integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js"
      integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s"
      crossorigin="anonymous"
    ></script>
    <script src="../js/script.js"></script>
    <script src="../js/jQuery.js"></script>
    <script src="../js/js/bootstrap.js"></script>
    <?php
    if (isset($_SESSION['cart'])) {
      echo '<script>alert("Payment successful! Thank you for your purchase.");</script>';
      unset($_SESSION['cart']);
    }
    ?>
  </body>
</html>
