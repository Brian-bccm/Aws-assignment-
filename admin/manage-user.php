<?php
include('parties/nav.php');
$sql1 = "SELECT *
        FROM tbl_user
        ORDER BY id ASC";
$result1 = mysqli_query($conn, $sql1);
?>

<!-- Main Content Section Starts -->
    <main>
        <h1>MANAGE USER</h1>
            <div class="action text-center">
                <div class="wrapper">
                    <div class="action-list">
                        <?php
                        if(isset($_SESSION['add-user']))
                        {
                            echo $_SESSION['add-user'];
                            unset($_SESSION['add-user']);
                        }
                        if(isset($_SESSION['update-user']))
                        {
                            echo $_SESSION['update-user'];
                            unset($_SESSION['update-user']);
                        }
                        if(isset($_SESSION['update-password-user']))
                        {
                            echo $_SESSION['update-password-user'];
                            unset($_SESSION['update-password-user']);
                        }
                        if(isset($_SESSION['delete-user']))
                        {
                            echo $_SESSION['delete-user'];
                            unset($_SESSION['delete-user']);
                        }
                        ?>
                        <div class="action-text">
                            <h1>Add User</h1>
                        </div>
                        <div class="action-btn">
                            <a href="add-user.php" class="btn-admin btn-primary">Add</a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="list-table">
                <h2>Users</h2>
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
                                <th>Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $sn = 1;
                        if (mysqli_num_rows($result1) > 0) {
                            while ($row = mysqli_fetch_assoc($result1)) {
                                $id = $row['id'];
                                $fullname = $row['fullname'];
                                $username = $row['username'];
                                $email = $row['email'];
                                $phone_number = $row['phone_number'];
                                ?>
                                <tr>
                                    <td><?php echo $sn++; ?></td>
                                    <td><?php echo $fullname; ?></td>
                                    <td><?php echo $username; ?></td>
                                    <td style="width:20%;"><?php echo $email; ?></td>
                                    <td><?php echo '0' . $phone_number; ?></td>
                                    <td width="100px">
                                        <img src="../img/user/<?php echo $row['img']; ?>">
                                    </td>
                                    <td><?php echo $row['datetime']; ?></td>
                                    <td>
                                        <a href="update-user-password.php?id=<?php echo $id; ?>" class="btn-admin btn-primary">Change</a>
                                        <a href="update-user.php?id=<?php echo $id; ?>" class="btn-admin btn-secondary">Update</a>
                                        <a href="delete-user.php?id=<?php echo $id; ?>" class="btn-admin btn-danger">Delete</a>
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