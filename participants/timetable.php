<?php
// Include your database connection file
include('../admin/config.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $student_category = $_POST['student_category'];

    // Update the timetable entry in the database
    $sql = "UPDATE timetable SET start_time='$start_time', end_time='$end_time', student_category='$student_category' WHERE day='$day'";
    if (mysqli_query($conn, $sql)) {
        echo "Timetable updated successfully!";
    } else {
        echo "Error updating timetable: " . mysqli_error($conn);
    }
}

// Fetch timetable data from the database
$sql = "SELECT * FROM timetable";
$result = mysqli_query($conn, $sql);
?>
    
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


    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: black;
            margin: 0;
            padding: 0;
        }
 
        h1 {
            text-align: center;
            color: #343a40;
        }
 
        table {
            border-collapse: collapse;
            margin: 20px auto;
            background-color: white;
            border: 2px solid #dee2e6;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
 
        th,
        td {
            border: 1px solid #dee2e6;
            padding: 10px;
            text-align: center;
        }
 
        th {
            background-color: #f2f2f2;
            color: #343a40;
        }
 
        .highlight {
            background-color: #f8f9fa;
        }
 
        .special {
            background-color: #f0f0f0;
        }
    </style>
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
    <div id="navDemo" class="w3-bar-block w3-white w3-hide w3-hide-large w3-hide-medium">
      <a href="#about" class="w3-bar-item w3-button" onclick="toggleFunction()">Enroll</a>
      <a href="" class="w3-bar-item w3-button" onclick="toggleFunction()">Timetable</a>
      <a href="#contact" class="w3-bar-item w3-button" onclick="toggleFunction()">Ticketing</a>
      <a href="#" class="w3-bar-item w3-button">SEARCH</a>
    </div>
  </div>
  <div style="background-color: black;" >
    <div class="w3-display-container" style="margin-bottom:50px  ">
        <img src="../img/kungfu2.webp" style="width:100%">
        <div class="w3-display-bottomleft w3-container w3-amber w3-hover-orange w3-hide-small"
         style="bottom:10%;opacity:0.7;width:70%">
        <h2><b>Timetable</b></h2>
      </div>
      </div>


    <!-- Display the timetable -->
    <table>
        <thead>
            <tr>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Student Category</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Display timetable data
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['day'] . "</td>";
                echo "<td>" . $row['start_time'] . "</td>";
                echo "<td>" . $row['end_time'] . "</td>";
                echo "<td>" . $row['student_category'] . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
<!-- Footer Start here -->
<footer>
        <div class="wrapper">
            <div class="sm">
                <h1>Wushu Society</h1>
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
</body>
 
</html>



<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.min.js" integrity="sha384-w1Q4orYjBQndcko6MimVbzY0tgp4pWB4lZ7lr30WKz0vr/aWKhXdBNmNb5D92v7s" crossorigin="anonymous"></script>
<script src="../js/script.js"></script>
<script src="../js/jQuery.js"></script>
<script src="../js/js/bootstrap.js"></script>
</body>
</html>