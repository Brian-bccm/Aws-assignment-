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
    <?php
    $selector = $_GET['selector'];
    $validator = $_GET['validator'];

    if (empty($selector) || empty($validator)) {
        echo "Could not validate your request!!!";
    } else {
        if (ctype_xdigit($selector) != false || ctype_xdigit($validator) != false) {
            ?>
            <div class="logo-container">
              Reset your password
            </div>
            <form action="reset-password.php" class="form" method="POST">
                <input type="hidden" name="selector" value="<?php echo $selector ?>">
                <input type="hidden" name="validator" value="<?php echo $validator ?>">
              <div class="form-group">
                <label for="email">Old Password</label>
                <input type="password" id="pwd" name="pwd" placeholder="Enter a new password" required="">
                <label for="email">New Password</label>
                <input type="password" id="pwd-repeat" name="pwd-repeat" placeholder="Confirm your password" required="">
              </div>
              <button class="form-submit-btn" type="submit" name="reset-password-submit">Reset Password</button>
            </form>
            <?php
        }
    }
    ?>
    </div>
</div>
  </body>
</html>