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
</head>

<body>
    <!-- Main-Content start here -->
    <section class="login-page">
        <div class="login-wrapper">
            <div class="login">
                <a href="login.php">
                    <div class="back-home">
                        <img src="../img/left.png" alt="">
                        <p>Back</p>
                    </div>
                </a>
                <h1 class="text-center">Sign Up</h1>
                <form class="form text-center" action="" method="POST" enctype="multipart/form-data">
                    <p class="message">Signup now and get full access to our app. </p>
                    <?php
                    if (isset($_SESSION['errors_user'])) {
                        $errors = $_SESSION['errors_user'];
                        foreach ($errors as $error) {
                            echo '<p class="error">' . $error . '</p>';
                        }
                        unset($_SESSION['errors_user']);
                    }
                    ?>
                    <div class="full_name_username">
                        <input class="input1" type="text" name="fullname" id="fullname" placeholder="Enter Full Name">
                        <input class="input1" type="text" name="username" id="username" placeholder="Enter Username">
                    </div>
                    <input class="input1" type="email" name="email" id="email" placeholder="Enter Email">
                    <input class="input1" type="text" name="phone_number" id="email" placeholder="Enter Phone Number">
                    <input class="input1" type="password" name="pwd" id="password" placeholder="Enter Password">
                    <input class="input1" type="password" name="confirm_password" id="confirm_password"
                        placeholder="Confirm Password">
                    <input class="input input1" type="file" name="img">
                    <input class="input1" type="submit" value="Sign Up" class="btn-submit" name="submit">
                    <label for="login-in">Already have an account? <a href="login.php">login Up</a></label>
                </form>
            </div>
        </div>
    </section>
    <!-- Main-Content start here -->
</body>

</html>
<?php
if (isset($_POST['submit'])) {
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $password = $_POST['pwd'];
    $confirm_password = $_POST['confirm_password'];
    if ($_FILES['img']['error'] === UPLOAD_ERR_OK) {
        $newImg = $_FILES['img']['name'];
        $ext = end(explode('.', $newImg));
        $img = "User_" . time() . '.' . $ext;

        $source_path = $_FILES['img']['tmp_name'];
        $destination_path = "../img/user/" . $img;

        $upload = move_uploaded_file($source_path, $destination_path);
    } else {
        $img = "default-user-profile.jpg";
    }

    $errors = [];

    if (empty($fullname) || empty($username) || empty($email) || empty($phone_number) || empty($password) || empty($confirm_password)) {
        $errors['user_input_empty'] = "Fill In All The Fields!";
    } else {
        if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['invalid_email'] = "Invalid email used!";
        }
        if (!empty($phone_number) && !preg_match('/^01[0-9]{8}$/', $phone_number)) {
            $errors['invalid-phone'] = "Invalid Phone Number Format!";
        }
        if (!empty($username)) {
            $sql = "SELECT username FROM tbl_user WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();
            $count = $result->num_rows;
            if ($count >= 1) {
                $errors['username_taken'] = "Username Already Taken!";
            }
        }
        if (!empty($email)) {
            $sql = "SELECT username FROM tbl_user WHERE email = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            $count = $result->num_rows;
            if ($count >= 1) {
                $errors['email_taken'] = "Email Already Registry!";
            }
        }
        if (!empty($phone_number)) {
            $sql = "SELECT username FROM tbl_user WHERE phone_number = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $phone_number);
            $stmt->execute();
            $result = $stmt->get_result();
            $count = $result->num_rows;
            if ($count >= 1) {
                $errors['email_taken'] = "Phone Number Already Registry!";
            }
        }
        if (!empty($_POST['pwd']) && strlen($_POST['pwd']) < 8) {
            $errors['weak-password'] = "Password must be at least 8 characters long.";
        } else {
            if ($password != $confirm_password) {
                $errors['not_match'] = "Password Not Match";
            }
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors_user'] = $errors;
        header('location:signup.php');
        die();
    }

    $pwd = md5($password);
    $sql = "INSERT INTO tbl_user (fullname, username, email, pwd, phone_number, img) 
            VALUES ('$fullname', '$username', '$email', '$pwd', '$phone_number', '$img')"; // Replace '$img_path' with actual image path after upload

    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['signup'] = "Registration Successful! Please Login.";
        header('location:login.php'); // Redirect to login page
    }
}
?>