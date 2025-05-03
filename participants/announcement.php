<?php 
include("parties/navbar.php"); 
$sql1 = "SELECT * FROM tbl_announment";
$result1 = mysqli_query($conn, $sql1);
?>

<section class="announcement">
    <div class="announcement-wrapper">
        <h1 class="text-left">Announcement</h1>
        <input type="date" name="date" class="text-center">
        <table class="announcement-list ">
            <tr>
                <th>Date</th>
                <th>Attention</th>
            </tr>
            <?php
            while ($row = mysqli_fetch_assoc($result1)) {
                $year = date('Y', strtotime($row['date']));
                $date = date('F d', strtotime($row['date']));
                ?>
                <tr>
                    <td class="announcement-dates text-left">
                        <br>
                        <p><?php echo $year; ?></p>
                        <h3><?php echo $date; ?></h3>  
                    </td>

                    <td class="announcement-details">
                        <br>
                        <h3><?php echo $row['title']; ?></h3>
                        <br>
                        <h4>Location: <?php echo $row['location']; ?></h4>
                        <br>
                        <p><?php echo $row['description']; ?></p>
                        <br>
                    </td>
                </tr>
                <?php
            }
            ?>
        </table>
    </div>
</section>

<?php include("parties/footer.php"); ?>