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
      <img src="../img/kungfu2.webp" style="width: 100%" />
      <div
        class="w3-display-bottomleft w3-container w3-amber w3-hover-orange w3-hide-small"
        style="bottom: 10%; opacity: 0.7; width: 70%"
      >
        <h2><b>Kung Fu Society</b></h2>
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
      <h2 class="w3-wide">What is Wushu</h2>
      <p class="w3-opacity"><i>We love wushu</i></p>
      <p class="w3-justify">
        Wushu (traditional Chinese: 武術; simplified Chinese: 武术; pinyin:
        wǔshù) (/ˌwuːˈʃuː/), or kung fu, is a competitive Chinese martial art.
        It integrates concepts and forms from various traditional and modern
        Chinese martial arts, including Shaolin kung fu, tai chi, and
        Wudangquan.[1] "Wushu" is the Chinese term for "martial arts" (武 "Wu" =
        combat or martial, 術 "Shu" = art), reflecting the art's goal as a
        compilation and standardization of various styles.
      </p>
      <div class="w3-row w3-padding-32">
        <div class="w3-third">
          <p>Xiao Yi Jia</p>
          <img
            src="../img/xiaoyijia.PNG"
            class="w3-round w3-margin-bottom"
            alt="Random Name"
            style="width: 60%"
          />
          <p class="mb-0">
            Do not fight with the strength, absorb it, and it flows, use it.
          </p>
          <footer class="blockquote-footer">
            Best Coach in
            <cite title="Source Title">2022</cite>
          </footer>
        </div>
        <div class="w3-third">
          <p>Lee Da Long</p>

          <img
            src="../img/lee.PNG"
            class="w3-round w3-margin-bottom"
            alt="Random Name"
            style="width: 60%"
          />
          <p class="mb-0">
            The ultimate aim of wushu is not having to use them.
          </p>
          <footer class="blockquote-footer">
            Best Coach in
            <cite title="Source Title">2023</cite>
          </footer>
        </div>

        <div class="w3-third">
          <p>Wang Da Niang</p>
          <img
            src="../img/wang.PNG"
            class="w3-round"
            alt="Random Name"
            style="width: 60%"
          />
          <p class="mb-0">
            In the face of adversity, one's true character is revealed.
          </p>
          <footer class="blockquote-footer">
            Best Coach in
            <cite title="Source Title">2024</cite>
          </footer>
        </div>
      </div>
    </div>

    <!--Ticket-->
    <div class="w3-black" id="tour">
      <div
        class="w3-container w3-content w3-padding-64"
        style="max-width: 800px"
      >
        <h2 class="w3-wide w3-center">Ticket For Competition</h2>
        <p class="w3-opacity w3-center">
          <i>Remember to book your tickets!</i>
        </p>
        <br />

        <ul class="w3-ul w3-border w3-white w3-text-grey">
          <li class="w3-padding">
            Fed <span class="w3-tag w3-red w3-margin-left">Sold Out</span>
          </li>
          <li class="w3-padding">
            March <span class="w3-badge w3-right w3-margin-right">1</span>
          </li>
          <li class="w3-padding">
            April <span class="w3-badge w3-right w3-margin-right">1</span>
          </li>
          <li class="w3-padding">
            May <span class="w3-badge w3-right w3-margin-right">1</span>
          </li>
        </ul>

        <div class="w3-row-padding w3-padding-32" style="margin: 0 -16px">
          <div class="w3-third w3-margin-bottom">
            <img
              src="../img/place1.PNG"
              alt="place11"
              style="width: 100%"
              class="w3-hover-opacity"
            />
            <div class="w3-container w3-white">
              <p><b>U16</b></p>
              <p class="w3-opacity">Fri 27 April 2024</p>
              <p>
                Unleashing strength, agility, and grace: Wushu competition
                showcases martial arts excellence in action-packed showdowns.
              </p>
              <button
                class="w3-button w3-black w3-margin-bottom"
                onclick="document.getElementById('ticketModal').style.display='block'"
              >
                Buy Tickets
              </button>
            </div>
          </div>
          <div class="w3-third w3-margin-bottom">
            <img
              src="../img/place 2.PNG"
              alt="Place2"
              style="width: 100%"
              class="w3-hover-opacity"
            />
            <div class="w3-container w3-white">
              <p><b>U17</b></p>
              <p class="w3-opacity">Sat 28 March 2024</p>
              <p>
                Wushu warriors showcase skill, agility, and artistry in
                electrifying competition of martial prowess and finesse
              </p>
              <br />
              <button
                class="w3-button w3-black w3-margin-bottom"
                onclick="document.getElementById('ticketModal').style.display='block'"
              >
                Buy Tickets
              </button>
            </div>
          </div>
          <div class="w3-third w3-margin-bottom">
            <img
              src="../img/place3.PNG"
              alt="place3"
              style="width: 100%"
              class="w3-hover-opacity"
            />
            <div class="w3-container w3-white">
              <p><b>National</b></p>
              <p class="w3-opacity">Sun 29 May 2014</p>
              <p>
                Precision, agility, and mastery on display: The electrifying
                intensity."
              </p>
              <br />

              <button
                class="w3-button w3-black w3-margin-bottom"
                onclick="document.getElementById('ticketModal').style.display='block'"
              >
                Buy Tickets
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Ticket Modal -->
    <div id="ticketModal" class="w3-modal">
      <div class="w3-modal-content w3-animate-top w3-card-4">
        <header class="w3-container w3-teal w3-center w3-padding-32">
          <span
            onclick="document.getElementById('ticketModal').style.display='none'"
            class="w3-button w3-teal w3-xlarge w3-display-topright"
            >×</span
          >
          <h2 class="w3-wide">
            <i class="fa fa-suitcase w3-margin-right"></i>Tickets
          </h2>
        </header>
        <div class="w3-container">
          <p>
            <label
              ><i class="fa fa-shopping-cart"></i> Tickets, RM15 per
              person</label
            >
          </p>
          <input
            class="w3-input w3-border"
            type="text"
            placeholder="How many?"
          />
          <p>
            <label><i class="fa fa-user"></i> Send To</label>
          </p>
          <input
            class="w3-input w3-border"
            type="text"
            placeholder="Enter email"
          />
          <button
            class="w3-button w3-block w3-teal w3-padding-16 w3-section w3-right"
          >
            PAY <i class="fa fa-check"></i>
          </button>
          <button
            class="w3-button w3-red w3-section"
            onclick="document.getElementById('ticketModal').style.display='none'"
          >
            Close <i class="fa fa-remove"></i>
          </button>
          <p class="w3-right">
            Need <a href="#" class="w3-text-blue">help?</a>
          </p>
        </div>
      </div>
    </div>
    <!--timetable-->

    <div
      class="w3-container w3-content w3-center w3-padding-64"
      style="max-width: 800px"
      id="band"
    >
      <h2 class="w3-wide">Timetable for Society Members</h2>
      <p class="w3-opacity"><i>Change every week</i></p>
      <p class="w3-justify">
        Join us on the path to mastery! Check out our Wushu timetable for
        exhilarating training sessions.Experienced Couch will be giving out
        classes everyweek check out our timetable for more
      </p>
      <button><a href="timetable.html">timetable</a></button>
    </div>

    <!--Slide code -->

    <div class="w3-black">
      <div
        class="w3-container w3-content w3-center w3-padding-64"
        style="max-width: 800px"
        id="band"
      >
        <h2 class="w3-wide">Wall Of Honor</h2>
        <p class="w3-opacity"><i>2020-2024</i></p>

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
                  src="../img/LIM_HUI_YING_01_1688306116.jpg"
                />
                <div class="carousel-caption d-none d-md-block"></div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../img/teacher.jpeg" />
                <div class="carousel-caption d-none d-md-block">
                  <h2>Best Teacher 2023 Teaching</h2>
                  <p>teacher teaching our members wushu</p>
                </div>
              </div>
              <div class="carousel-item">
                <img class="d-block w-100" src="../img/national.jpeg" />
                <div class="carousel-caption d-none d-md-block">
                  <h3>U16 champion</h3>
                  <p>rep of our society taking part in national comp</p>
                </div>
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
        <button><a href="timetable.html">Rankings</a></button>
      </div>
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
