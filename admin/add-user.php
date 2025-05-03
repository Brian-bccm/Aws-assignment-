<?php 
include('parties/nav.php');
require_once 'user/user-view.php';
?>
    <main>
        <h1>ADD USER</h1>
        
        <div class="wrapper">
            <?php
            check_user_error();
            ?>
            <form action="user/add-user.php" method="POST" enctype="multipart/form-data">
                <table class="tbl-full">
                    <tr>
                        <td class="col-30">Full Name: </td>
                        <td class="col-70">
                            <input type="text" name="fullname" class="input" placeholder="Full Name">
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
                            <input type="password" name="pwd" class="input" placeholder="Password">
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
                    <input type="submit" name="submit" value="Add User" class="btn-admin btn-secondary">
                </div>
            </form>
        </div>
    </main>
<?php include('parties/footer.php') ?>