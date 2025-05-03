<?php 
include('parties/nav.php');
$sql = "SELECT * 
        FROM tbl_admin
        ORDER BY id ASC";
$result = mysqli_query($conn, $sql);
 ?>
    <!-- Main Content Section Starts -->
    <main>
        <h1>MANAGE ADMIN</h1>
            <div class="action text-center">
                <div class="wrapper">
                    <div class="action-list">
                        <?php
                        if(isset($_SESSION['admin-update']))
                        {
                            echo $_SESSION['admin-update'];
                            unset($_SESSION['admin-update']);
                        }
                        if(isset($_SESSION['delete-admin']))
                        {
                            echo $_SESSION['delete-admin'];
                            unset($_SESSION['delete-admin']);
                        }
                        if(isset($_SESSION['add-admin']))
                        {
                            echo $_SESSION['add-admin'];
                            unset($_SESSION['add-admin']);
                        }
                        if(isset($_SESSION['update-password-admin']))
                        {
                            echo $_SESSION['update-password-admin'];
                            unset($_SESSION['update-password-admin']);
                        }
                        ?>
                        <div class="action-text">
                            <h1>Add Admin</h1>
                        </div>
                        <div class="action-btn">
                            <a href="add-admin.php" class="btn-admin btn-primary">Add</a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Button to add admin -->
            <div class="list-table">
                <h2>Admins</h2>
                <div class="wrapper">
                <table class="tbl-full text-center">
                    <thead>
                        <tr>
                            <th>S.N.</th>
                            <th>Full Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone Number</th>
                            <th>Image</th>
                            <th>Join Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                    $sn = 1;
                    if(mysqli_num_rows($result) > 0)
                    {
                        while($row = mysqli_fetch_assoc($result))
                        {
                            $id = $row['id'];
                            $full_name = $row['full_name'];
                            $username = $row['username'];
                            $email = $row['email'];
                            $phone_number = $row['phone_number'];
                            ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td><?php echo $full_name; ?></td>
                            <td><?php echo $username; ?></td>
                            <td style="width:20%;"><?php echo $email; ?></td>
                            <td><?php echo '0' . $phone_number; ?></td>
                            <td width="100px"><img src="../img/admin/<?php echo $row['img']; ?>"></td>
                            <td><?php echo $row['datetime']; ?></td>
                            <td>
                                <a href="update-admin-password.php?id=<?php echo $id; ?>" class="btn-admin btn-primary">Change</a>
                                <a href="update-admin.php?id=<?php echo $id; ?>" class="btn-admin btn-secondary">Update</a>
                                <a href="delete-admin.php?id=<?php echo $id; ?>" class="btn-admin btn-danger">Delete</a>
                            </td>
                        </tr> 
                        <?php   
                        }
                    }
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>
    <!-- Main Content Section Ends -->
<?php include('parties/footer.php') ?>