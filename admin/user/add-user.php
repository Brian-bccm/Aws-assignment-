
<?php
if(isset($_POST['submit']))
{
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $pwd = MD5($_POST['pwd']);
    if(isset($_FILES['img']['name']))
    {
        $newImg = $_FILES['img']['name'];
        $ext = end(explode('.' , $newImg));
        $img = "User_" . time() . '.' . $ext;

        $source_path = $_FILES['img']['tmp_name'];
        $destination_path = "../../img/user/" . $img;

        $upload = move_uploaded_file($source_path, $destination_path);
    }
    else
    {
        $img = "";
    }

    require_once '../../config/constants.php';
    require_once 'user-model.php';
    require_once 'user-view.php';
    require_once 'user-contr.php';

    //Error Handlers
    $errors = [];

    if (is_user_input_empty ($fullname, $username, $email, $phone_number, $pwd)) {
        $errors['user_input_empty'] = "Fill In All The Fields!";
    }
    if (is_email_invalid ($email)) {
        $errors['invalid_email'] = "Invalid email used!";
    }
    if (is_username_taken ($conn, $username)) {
        $errors['username_taken'] = "Username Already Taken!";
    }
    if (is_email_registered ($conn, $email)) {
        $errors['email_taken'] = "Email Already Registry!";
    }
    if (is_phoneNumber_taken ($conn, $phone_number)) {
        $errors['email_taken'] = "Phone Number Already Registry!";
    }
    if (is_phoneNumber_invalid ($phone_number)) {
        $errors['invalid-phone'] = "Invalid Phone Number Format!";
    }
    if (!empty($_POST['pwd']) && strlen($_POST['pwd']) < 8) {
        $errors['weak-password'] = "Password must be at least 8 characters long.";
    }

    if ($errors) {
        $_SESSION['errors_user'] = $errors;
        header('location:../add-user.php');
        die();
    }

    add_user ($conn, $fullname, $username, $email, $phone_number, $img, $pwd);
        
    $_SESSION['add-user'] = "<h2 class='success'>User Added Successfully</h2>";

    header('location:../manage-user.php');
    $conn = null;
    $stmt = null;
    die();
}
?>