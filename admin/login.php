<?php include('../config/constants.php') ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food Order System</title>
    <link rel="stylesheet" href="../css/admin.css">
    <link rel="icon" type="image/x-icon" href="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/wushu_society_logo.png">
</head>
<body class="admin-login">
    <div class="login">  
        <a href="../participants/intro.php">
             <img src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/left.png" alt="">Back
        </a>

        <?php
        if(isset($_SESSION['login']))
        {
            echo $_SESSION['login'];
            unset($_SESSION['login']);
        }
        if(isset($_SESSION['no-login-message']))
        {
            echo $_SESSION['no-login-message'];
            unset($_SESSION['no-login-message']);
        }
        ?>

        <br><br>

        <h1 class="text-center">Login as a Admin User</h1>

        <br><br>
        <!-- Login Form Starts Here -->
        <form action="" method="POST" class="admin-login-form">
            <div class="input-box">
                <input required="required" type="text" name="username">
                <span>Enter Username</span>
                <i></i>
            </div>  
            <div class="input-box">
                <input required="required" type="password" name="password">
                <span>Enter Password</span>
                <i></i>
            </div>
            <div class="login-btn text-center">
                <input type="submit" name="submit" value="Login" class="admin-login-btn">
            </div>
        </form>
        <br>
        <!-- Login Form Ends Here -->
    </div>
</body>
</html>

<?php

if(isset($_POST['submit']))
{
    $username = $_POST['username'];
    $password = MD5($_POST['password']);

    $sql1 = "SELECT *
            FROM tbl_admin
            WHERE username = '$username' 
            AND password = '$password'";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);

    $count = mysqli_num_rows($result1);
    if($count == 1)
    {
        $_SESSION['login'] = "<h2 class='success'>Login Successfully</h2>";
        $_SESSION['check_user'] = $row;
        header('location:index.php');
    }
    else
    {
        $_SESSION['login'] = "<h2 class='text-center error'>Failed to Login</h2>";
        header('location:login.php');
    }
}
?>