<?php include("parties/navbar.php"); 
$row = $_SESSION['login-check'];
$sql = "SELECT * FROM tbl_user WHERE id = '" . $row['id'] . "'";
$result = mysqli_query($conn, $sql);
$rows = mysqli_fetch_assoc($result);
?>

    <section class="account">
        <div class="account-wrapper">
            <div class="account-profile">
                <div class="account-profile-img">
                    <img src="http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/user/<?php echo $rows['img']; ?>" alt="">
                </div>
                <div class="account-logout">
                    <p><?php echo $rows['fullname'] ?></p>
                    <a href="logout.php">Logout</a>
                </div>
            </div>

            <div class="account-details">

                <div class="account-nav">
                    <ul>
                        <a href="account.php"><li class="active">User Information</li></a>
                        <a href=""><li>Purchase Order</li></a>
                    </ul>
                </div>

                <div class="account-information">
                    <h1>User Information</h1>
                    <?php
                        if (isset($_SESSION['account'])) {
                            echo '<h3 class="success" >' . $_SESSION['account'] .'</h3>';
                            unset($_SESSION['account']);
                        }
                    ?>
                    <div class="user-information">
                        <form action="" method="post" class="form1">
                            <?php
                            if (isset($_SESSION['information'])) {
                                $errors = $_SESSION['information'];
                                foreach ($errors as $error) {
                                    echo '<h3 class="error">'.$error.'</h3>';
                                }
                                unset($_SESSION['information']);
                            }
                            ?>
                            <label for="full_name">Full name: </label>
                            <br>
                            <input type="text" name="fullname" value="<?php echo $rows['fullname'] ?>">
                            <br>
                            <label for="username">Username: </label>
                            <br>
                            <input type="text" name="username" value="<?php echo $rows['username'] ?>">
                            <br>
                            <label for="full_name">Email: </label>
                            <br>
                            <input type="email" name="email" value="<?php echo $rows['email'] ?>">
                            <br><br>
                            <input type="submit" name="information_submit" value="Update">
                        </form>
                        
                        <form action="" method="post" class="form2">
                            <?php
                            if (isset($_SESSION['password'])) {
                                $errors = $_SESSION['password'];
                                foreach ($errors as $error) {
                                    echo '<h3 class="error">'.$error.'</h3>';
                                }
                                unset($_SESSION['password']);
                            }
                            ?>
                            <label for="current-password">Old Password: </label>
                            <br>
                            <input type="password" name="current_password" placeholder="Current Password">
                            <br>
                            <label for="new-password">New Password: </label>
                            <br>
                            <input type="password" name="new_password" placeholder="New Password">
                            <br>
                            <input type="password" name="confirm_password" placeholder="Confirm Password">
                            <br><br>
                            <input type="submit" name="password_submit" value="Change Password">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php
if (isset($_POST['information_submit'])) {
    $id = $row['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];

    $errors = [];

    if (empty($fullname)) {
        $errors[] = "Full name is required.";
    }
    if (empty($username)) {
        $errors[] = "Username is required.";
    } else {
        $sql = "SELECT * FROM tbl_user WHERE username = '$username' AND id != '$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $errors[] = "Username already exists.";
        }
    }
    
      // Email verification (requires additional steps)
    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    } else {
        // Check if email already exists in database (replace with your query)
        $sql = "SELECT * FROM tbl_user WHERE email = '$email' AND id != '$id'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0) {
            $errors[] = "Email address already exists.";
        }
    }

    if (!empty($errors)) {
        $_SESSION['information'] = $errors;
        header('location:account.php');
        die();
    } 
    $sql = "UPDATE tbl_user SET fullname='$fullname', username='$username', email='$email' WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result == true) {
        $_SESSION['account'] = "Account Information Updated Successfully!!!";
        header('location:account.php');
    }
}

if (isset($_POST['password_submit'])) {
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    $errors = [];

    if (empty($current_password) || empty($new_password) || empty($confirm_password)) {
        $errors['empty_input'] = "Fill Up All Field!!!";
    }
    $sql = "SELECT pwd FROM tbl_user WHERE id = '" . $row['id'] . "'";
    $result = mysqli_query($conn, $sql);
    if ($result && mysqli_num_rows($result) == 1) {
        $user_data = mysqli_fetch_assoc($result);
        $hashed_password = $user_data['pwd'];
    }
    // Verify current password
    if (!empty($current_password) && md5($current_password) != $hashed_password) {
        $errors['wrong_password'] = "Incorrect old password.";
    }
    if (!empty($new_password) && strlen($new_password) < 8) {
        $errors['update-password-admin'] = "Password must be at least 8 characters long !!!";
    } else if ($new_password != $confirm_password) {
        $errors['not_match'] = "Incorrect Matching password.";
    }
    if (!empty($errors)) {
        $_SESSION['password'] = $errors;
        header('location:account.php');
        die();
    } 
        // Hash the new password before storing it in the database
    $hashed_new_password = MD5($new_password); 
    $sql = "UPDATE tbl_user SET pwd='$hashed_new_password' WHERE id = '" . $row['id'] . "'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['account'] = "Password Changed Successfully!";
        header('location:account.php');
        die();
    }
}
?>
<?php include("parties/footer.php"); ?>