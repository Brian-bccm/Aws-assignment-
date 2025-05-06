<?php 
include('parties/nav.php');
$sql1 = "SELECT * FROM tbl_announment";
$result1 = mysqli_query($conn, $sql1);
require_once 'announcement/announcement-view.php';
?>

<!-- Main Content Section Starts -->
<main>
    <h1>MANAGE ANNOUNCEMENTS</h1>
    <div class="action text-center">
        <div class="wrapper">
            <div class="action-list">
                <?php
                if(isset($_SESSION['add-announcement']))
                {
                    echo $_SESSION['add-announcement'];
                    unset($_SESSION['add-announcement']);
                }
                check_announcement_error();
                ?>
                <div class="action-text">
                    <h1>Add Announcement</h1>
                </div>
                <div class="action-btn">
                    <a href="add-announcement.php" class="btn-admin btn-primary">Add</a>
                </div>
            </div>
        </div>
    </div>

    <div class="list-table">
    <h2>Announcements</h2>
        <div class="wrapper">
            <table class="tbl-full text-center">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Announcement Title</th>
                        <th class="announcement-details">Announcement Details</th>
                        <th>Location</th>
                        <th>Date/Time</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sn = 1;
                    while ($row = mysqli_fetch_assoc($result1)) {
                        ?>
                        <tr>
                            <td><?php echo $sn++; ?></td>
                            <td width="180px"><?php echo $row['title']; ?></td>
                            <td width="225px"><?php echo $row['description']; ?></td>
                            <td width="225px"><?php echo $row['location']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td>
                                <a href="update-announcement.php?id=<?php echo $row['id'] ?>" class="btn-admin btn-secondary">Update</a> 
                                <a href="announcement/delete-announcement.php?id=<?php echo $row['id'] ?>" class="btn-admin btn-danger">Delete</a>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                </tbody>     
            </table>
        </div>
    </div>
</main>
<!-- Main Content Section Ends -->

<?php include('parties/footer.php') ?>