<?php 
include("parties/navbar.php"); 
$sql1 = "SELECT * FROM tbl_event";
$result1 = mysqli_query($conn, $sql1);
?>

<section class="events">
    <div class="events-form-wrapper">
        <h1 class="text-center">Upcoming Events</h1>
        <form action="" method="post">
            <input type="date" name="" class="text-center">
            <select class="text-center">
                <option value="">Any Category</option>
                <option value="">Competition</option>
                <option value="">Trials</option>
                <option value="">Course</option>
            </select>
        </form>
    </div>
    <div class="events-lists">
        <div class="events-wrapper">
            <?php
            while ($row = mysqli_fetch_assoc($result1)) {
                $week = date('w', strtotime($row['event_date']));
                $date = date('F d, Y', strtotime($row['event_date']));
                $weeks = array("Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday");
                $week_name = $weeks[$week];
                ?>
                <div class="cards-wrapper">
                    <div class="events-card">
                        <div class="events-img">
                            <a href="">
                                <img src="../img/event/<?php echo $row['event_img'] ?>">
                            </a>
                        </div>
                        <div class="events-info">
                            <h3><?php echo $row['event_category'] ?></h3>
                            <a href="">
                                <h2><?php echo $row['event_title'] ?></h2>
                            </a>
                            <p><?php echo $row['event_detail'] ?></p>
                        </div>
                        <div class="events-date">
                            <p><?php echo $week_name . ', ' . $date; ?></p>
                            <a href="">
                                <?php echo $row['event_location'] ?>
                            </a>
                        </div>
                        <div class="events-btn">
                            <input type="submit" value="Buy Ticket" name="buy-ticket-btn">
                            <input type="submit" value="Participate" name="participate-btn">
                        </div>
                    </div>    
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</section>

<?php include("parties/footer.php"); ?>