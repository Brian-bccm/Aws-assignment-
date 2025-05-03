<?php
if(isset($_POST['submit']))
{
    $full_name = $_POST['full_name'];
    $username = $_POST['username'];
    $email = trim($_POST['email']);
    $phone_number = $_POST['phone_number'];
    $password = MD5($_POST['password']);
    if(isset($_FILES['img']['name']))
    {
        $newImg = $_FILES['img']['name'];
        $ext = end(explode('.' , $newImg));
        $img = "Admin_" . time() . '.' . $ext;

        $source_path = $_FILES['img']['tmp_name'];
        $destination_path = "../../img/admin/" . $img;

        $upload = move_uploaded_file($source_path, $destination_path);
    }
    else
    {
        $img = "";
    }

    require_once '../../config/constants.php';
    require_once 'admin-model.php';
    require_once 'admin-view.php';
    require_once 'admin-contr.php';

    //Error Handlers
    $errors = [];

    if (is_user_input_empty ($full_name, $username, $email, $phone_number, $password)) {
        $errors['admin_input_empty'] = "Fill In All The Fields!";
    }
    if (is_email_invalid ($email)) {
        $errors['invalid_email'] = "Invalid email used!";
    }
    if (is_username_taken ($conn, $username)) {
        $errors['admin_taken'] = "Username Already Taken!";
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
    if (!empty($_POST['password']) && strlen($_POST['password']) < 8) {
        $errors['weak-password'] = "Password must be at least 8 characters long.";
    }

    if ($errors) {
        $_SESSION['errors_admin'] = $errors;
        header('location:../add-admin.php');
        die();
    }

    add_admin ($conn, $full_name, $username, $email, $phone_number, $img, $password);
        
    $_SESSION['add-admin'] = "<h2 class='success'>Admin Added Successfully</h2>";

    header('location:../manage-admin.php');
    $conn = null;
    $stmt = null;
    die();
}
?>