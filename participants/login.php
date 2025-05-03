<?php
include("../config/constants.php");
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Wushu Society</title>
    <!-- <link rel="stylesheet" href="../css/reset.css" /> -->
    <link rel="icon" type="image/x-icon" href="../img/wushu_society_logo.png">
    <link rel="stylesheet" href="../css/style.css" />
    <script src="../js/myjs.js"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    

  </head>
  <body>

    <!-- Main-Content start here -->
    <section class="login-page">
        <div class="login-wrapper">
            <?php
                if (isset($_SESSION['login'])) {
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if (isset($_SESSION['no_email'])) {
                    echo $_SESSION['no_email'];
                    unset($_SESSION['no_email']);
                }
                if (isset($_SESSION['cart'])) {
                    echo $_SESSION['cart'];
                    unset($_SESSION['cart']);
                }
                ?>
            <div class="login">
                <a href="intro.php" class="back-home">
                    <img src="../img/left.png" alt=""><p>Back</p>
                </a>
                <br><br>   
                <h1 class="text-center">Login</h1>

<form class="form text-center" action="" method="POST" class="text-center">
    <input class="input1" type="text" name="username" id="username" placeholder="Enter Username">
    <input class="input1" type="password" name="pwd" id="password" placeholder="Enter Password">
    <a href="forget-password.php">Forget password?</a>
    <div class="g-recaptcha" data-sitekey="6Lf_0-IpAAAAAOi8BwakaS6Ifb36rH0olym0gvTY"></div>
    <input class="input1" type="submit" value="Login In" class="btn-submit" name="submit">
    <label for="sign-up">Don't Have Account? <a href="signup.php">Sign Up</a></label>
</form>

            </div>
        </div>
    </section>
    <!-- Main-Content start here -->
    </body>
</html>

<?php
if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $pwd = MD5($_POST['pwd']);
    $recaptchaResponse = $_POST['g-recaptcha-response'];
    
    // Verify reCAPTCHA
    $secretKey = '6Lf_0-IpAAAAADEMcropftF3VO-oaGF4KWapM6zA'; // replace with your secret key
    $recaptchaUrl = 'https://www.google.com/recaptcha/api/siteverify';
    $recaptchaData = array(
        'secret' => $secretKey,
        'response' => $recaptchaResponse
    );

    $recaptchaOptions = array(
        'http' => array(
            'method'  => 'POST',
            'header'  => 'Content-type: application/x-www-form-urlencoded',
            'content' => http_build_query($recaptchaData)
        )
    );
    $recaptchaContext  = stream_context_create($recaptchaOptions);
    $recaptchaVerify = file_get_contents($recaptchaUrl, false, $recaptchaContext);
    $recaptchaSuccess = json_decode($recaptchaVerify);

    if ($recaptchaSuccess->success) {
        $sql = "SELECT * FROM tbl_user WHERE username = '$username' AND pwd = '$pwd' ";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        if ($count == 1) {
            $_SESSION['login'] = "<h1 class='text-center success'>Login Successfully!!!</h1>";
            $_SESSION['login-check'] = $row;
            header('location:intro.php');
        } else {
            $_SESSION['login'] = "<h1 class='text-center error'>Failed To Login!!!</h1>";
            header('location:login.php');
        }
    } else {
        $_SESSION['login'] = "<h1 class='text-center error'>reCAPTCHA verification failed. Please try again.</h1>";
        header('location:login.php');
    }
}
?>