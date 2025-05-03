<?php 
include('parties/nav.php');
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql1 = "SELECT *
            FROM tbl_user
            WHERE id = $id";
    $result1 = mysqli_query($conn, $sql1);
    $count = mysqli_num_rows($result1);
    if($count == 1)
    {
        $row = mysqli_fetch_assoc($result1);
        
        $fullname = $row['fullname'];
        $username = $row['username'];
        $email = $row['email'];
        $phone_number = $row['phone_number'];
        $existing_img = $row['img'];
    }
    else
    {
        header('location:manage-user.php');
    }
}
?>

<main>
    <h1>Update USER</h1>
    
    <div class="wrapper">
        <div class="update-admin">
            <?php
            if (isset($_SESSION['errors'])) {
                $errors = $_SESSION['errors'];
                foreach ($errors as $error) {
                    echo $error;
                }
                unset($_SESSION['errors']);
            }
            ?>
            <form action="" method="POST" enctype="multipart/form-data">
                <table class="tbl-full">
                    <tr>
                        <td class="col-30">Full Name: </td>
                        <td class="col-70">
                            <input type="text" name="fullname" class="input" value="<?php echo $fullname; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Username: </td>
                        <td class="col-70">
                            <input type="text" name="username" class="input" value="<?php echo $username; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Email: </td>
                        <td class="col-70">
                            <input type="text" name="email" class="input" value="<?php echo $email; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Phone Number: </td>
                        <td class="col-70">
                            <input type="text" name="phone_number" class="input" value="<?php echo '0' . $phone_number; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Image: </td>
                        <td class="col-70">
                            <input type="file" name="img">
                        </td>
                    </tr>
                    </table>
                    <div class="action-submit">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update User" class="btn-admin btn-secondary">
                    </div>
            </form>
        </div>
    </div>
</main>

<?php
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];

    $errors = [];

    if (empty($fullname) || empty($username) || empty($email) || empty($phone_number)) {
        $errors['empty-data'] = "<h3 class='error'>Fill Up All Field!!</h3>";
    }
    if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $errors['invalid-email'] = "<h3 class='error'>Invalid Email Format!</h3>";
    }
    if (!empty($phone_number) && !preg_match('/^01[0-9]{8}$/', $_POST['phone_number'])) {
        $errors['invalid-phone'] = "<h3 class='error'>Invalid Phone Number Format!</h3>";
    } 
    if (!empty($username) || !empty($email) || !empty($phone_number)) {
        $check_sql = "SELECT * FROM tbl_user
                    WHERE (username = ? OR email = ? OR phone_number = ?)
                    AND id <> ?";
        $stmt = mysqli_prepare($conn, $check_sql);
        mysqli_stmt_bind_param($stmt, 'ssss', $_POST['username'], $_POST['email'], $_POST['phone_number'], $id);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        if (mysqli_num_rows($result) > 0) {
            $errors['duplicate'] = "<h3 class='error'>Username, Email, or Phone Number already exists!</h3>";
        }
        mysqli_stmt_close($stmt);
    }
    if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) {
        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $ext = strtolower(end(explode('.', $_FILES['img']['name'])));

        if (!in_array($ext, $allowed_extensions)) {
            $errors['invalid-image'] = "<h3 class='error'>Invalid Image File! Only JPG, JPEG, and PNG allowed.</h3>";
        } else if ($_FILES['img']['size'] > 500000) { // Adjust size limit as needed (500KB)
            $errors['large-image'] = "<h3 class='error'>Image File Too Large! Max size 500KB.</h3>";
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('location:update-user.php?id='.$id  );
        die();
    }

    if (isset($_FILES['img']['name']) && !empty($_FILES['img']['name'])) {
        $newImg = $_FILES['img']['name'];
        $ext = end(explode('.' , $newImg));
        $img = "User_" . time() . '.' . $ext;

        $source_path = $_FILES['img']['tmp_name'];
        $destination_path = "../img/user/" . $img;

        $upload = move_uploaded_file($source_path, $destination_path);

        if (!$upload) {
            echo "Error uploading image: " . $_FILES['img']['error'];
            exit();
        }
    } else {
        $img = $existing_img;
    }

    $sql2 = "UPDATE tbl_user SET
            fullname = '$fullname',
            username = '$username',
            email = '$email',
            phone_number = '$phone_number',
            img = '$img'
            WHERE id = $id
            ";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2 == TRUE) {
        if (!empty($existing_img) && file_exists("../img/user/" . $existing_img)) {
            unlink("../img/user/" . $existing_img);
        }

        $_SESSION['update-user'] = "<h2 class='success'>User Updated Successfully</h2>";
        header('location:manage-user.php');
    }
    else
    {
        $_SESSION['update-user'] = "<h2 class='error'>Failed to Updated User</h2>";
        header('location:manage-user.php');
    }
}
?>

<?php include('parties/footer.php') ?>