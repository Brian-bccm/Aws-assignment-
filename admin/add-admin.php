<?php 
include('parties/nav.php');
require_once 'admins/admin-view.php'
?>
    <main>
        <h1>ADD ADMIN</h1>
        
        <div class="wrapper">
            <?php
            check_admin_error ();
            ?>
            <form action="admins/add-admin.php" method="POST"  enctype="multipart/form-data">
                <table class="tbl-full">
                    <tr>
                        <td class="col-30">Full Name: </td>
                        <td class="col-70">
                            <input type="text" name="full_name" class="input" placeholder="Full Name">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Username: </td>
                        <td class="col-70">
                            <input type="text" name="username" class="input" placeholder="Username">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Email: </td>
                        <td class="col-70">
                            <input type="text" name="email" class="input" placeholder="Email Address">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Phone Number: </td>
                        <td class="col-70">
                            <input type="text" name="phone_number" class="input" placeholder="Phone Number/Tel.">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Password: </td>
                        <td class="col-70">
                            <input type="password" name="password" class="input" placeholder="Password">
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
                    <input type="submit" name="submit" value="Add Admin" class="btn-admin btn-secondary">
                </div>
            </form>
        </div>
    </main>

<?php
if(isset($_POST['submit']))
{
    $sql1 = "INSERT INTO
            tbl_admin SET
            full_name = '$full_name',
            username = '$username',
            email = '$email',
            phone_number = '$phone_number',
            password = '$password'
    ";
    $result1 = mysqli_query($conn, $sql1);
    if($result1 == TRUE)
    {
        $_SESSION['add-admin'] = "<h2 class='success'>Admin Added Succesfully</h2>";
        header('location:manage-admin.php');
    }
    else
    {
        $_SESSION['add-admin'] = "<h2 class='error'>Failed to Added Admin</h2>";
        header('location:manage-admin.php');
    }
}
?>
<?php include('parties/footer.php') ?>