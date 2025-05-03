<?php 
include('parties/nav.php');
if(isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql1 = "SELECT password
            FROM tbl_admin
            WHERE id = $id";
    $result1 = mysqli_query($conn, $sql1);
    $count = mysqli_num_rows($result1);
    if($count == 1)
    {
        $row = mysqli_fetch_assoc($result1);

        $password = $row['password'];
    }
}
?>
<main>
    <h1>Change Password</h1>
    
    <div class="wrapper">
        <?php
        if(isset($_SESSION['update-password-admin']))
        {
            echo $_SESSION['update-password-admin'];
            unset($_SESSION['update-password-admin']);
        }
        ?>
        <form action="" method="POST">
            <table class="tbl-full">
                <tr>
                    <td class="col-30">Current Password: </td>
                    <td class="col-70">
                        <input type="password" class="input" name="current_password" placeholder="Old Password">
                    </td>
                </tr>
                <tr>
                    <td class="col-30">New Password: </td>
                    <td class="col-70">
                        <input type="password" class="input" name="new_password" placeholder="New Password">
                    </td>
                </tr>
                <tr>
                    <td class="col-30">Confirm Password: </td>
                    <td class="col-70">
                        <input type="password" class="input" name="confirm_password" placeholder="Confirm Password">
                    </td>
                </tr>
            </table>
            <div class="action-submit">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Change Password" class="btn-admin btn-secondary">
            </div>
        </form>
    </div>
</main>
<?php
if(isset($_POST['submit']))
{
    $id = $_POST['id'];
    $currentPassword = MD5($_POST['current_password']);
    $newPassword = MD5($_POST['new_password']);
    $confirmPassword = MD5($_POST['confirm_password']);

    if (empty($_POST['current_password']) || empty($_POST['new_password']) || empty($_POST['confirm_password'])) {
        $_SESSION['update-password-admin'] = "<h3 class='error'>Fill Up All The Field !!!</h3>";
        header('location:update-admin-password.php?id=' . $id);
        die();
    } else if ($password != $currentPassword) {
        $_SESSION['update-password-admin'] = "<h3 class='error'>Old Password Not Match !!!</h3>";
        header('location:update-admin-password.php?id=' . $id);
        die();
    } else {
        if (!empty($_POST['new_password']) && strlen($_POST['new_password']) < 8) {
            $_SESSION['update-password-admin'] = "<h3 class='error'>Password must be at least 8 characters long !!!</h3>";
            header('location:update-admin-password.php?id=' . $id);
            die();
        }
        if ($newPassword != $confirmPassword) {
            $_SESSION['update-password-admin'] = "<h3 class='error'>New Password and Confirm Not Match !!!</h3>";
            header('location:update-admin-password.php?id=' . $id);
            die();
        } else {
            $sql2 = "UPDATE tbl_admin SET
                    password = '$newPassword'
                    WHERE id = '$id'";
            $result2 = mysqli_query($conn, $sql2);
            if ($result2 == TRUE) {
                $_SESSION['update-password-admin'] = "<h2 class='success'>Admin Password Updated Successfully</h2>";
                header('location:manage-admin.php');
            }
        }
    }
}
?>
<?php include('parties/footer.php') ?>