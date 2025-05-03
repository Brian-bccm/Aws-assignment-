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
<div class="forget-password">
  <div class="form-container">
      <div class="logo-container">
        Forgot Password
      </div>
      <?php
      if (isset($_GET['reset'])) {
        if ($_GET['reset'] == "success") {
          echo  '<p class="success">Check your email!</p>';
        }
      }
      ?>
      <form action="reset-request.php" class="form" method="POST">
        <div class="form-group">
          <label for="email">Email</label>
          <input type="text" id="email" name="email" placeholder="Enter your email" required="">
        </div>
        <button class="form-submit-btn" type="submit" name="reset-request-submit">Send Email</button>
      </form>
      <p class="signup-link">
        Don't have an account?
        <a href="signup.php" class="signup-link link"> Sign up now</a>
        <br>
        Already have an account?
        <a href="signup.php" class="signup-link link"> Sign In now</a>
      </p>
    </div>
</div>
  </body>
</html>