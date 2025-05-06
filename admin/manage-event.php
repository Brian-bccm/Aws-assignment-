<?php 
include('parties/nav.php');
$sql1 = "SELECT * FROM tbl_event";
$result1 = mysqli_query($conn, $sql1);
require_once 'event/event-view.php';
?>
<!-- Main Content Section Starts -->
<main>
    <h1>MANAGE EVENT</h1>
    <div class="action text-center">
        <div class="wrapper">
            <div class="action-list">
                <?php
                check_event_errors();
                ?>
                <div class="action-text">
                    <h1>Add Event</h1>
                </div>
                <div class="action-btn">
                    <a href="add-event.php" class="btn-admin btn-primary">Add Event</a>
                </div>
            </div>
        </div>
    </div>
    <div class="list-table">
        <h2>Events</h2>
        <div class="wrapper">
            <table class="tbl-full text-center">
                <tr>
                    <th>S.N.</th>
                    <th>Event Category</th>
                    <th>Event Title</th>
                    <th>Event Detail</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>Image</th>
                    <th>Action</th>
                </tr>
                <?php
                $sn = 1;
                while ($row = mysqli_fetch_assoc($result1)) {
                    ?>
                    <tr>
                        <td><?php echo $sn++; ?></td>
                        <td><?php echo $row['event_category']; ?></td>
                        <td><?php echo $row['event_title']; ?></td>
                        <td><?php echo $row['event_detail']; ?></td>
                        <td><?php echo $row['event_date']; ?></td>
                        <td><?php echo $row['event_location']; ?></td>
                        <td width="100px">
                            <img src="../img/event/<?php echo $row['event_img']; ?>">
                        </td>
                        <td>
                            <a href="update-event.php?id=<?php echo $row['id'] ?>" class="btn-admin btn-secondary">Update</a> 
                            <a href="event/delete-event.php?id=<?php echo $row['id'] ?>" class="btn-admin btn-danger">Delete</a>
                        </td>
                    </tr>
                    <?php
                }
                ?>
            </table>
        </div>
    </div>
</main>
<!-- Main Content Section Ends -->
<?php include('parties/footer.php') ?>