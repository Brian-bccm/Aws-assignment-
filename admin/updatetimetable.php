<?php
include 'db_connect.php';

$timetable_id = $_GET['timetable_id'];

$sql = "SELECT * FROM Timetable WHERE timetable_id=$timetable_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>

    <form method="post" action="update.php">
        <input type="hidden" name="timetable_id" value="<?php echo $row['timetable_id']; ?>">
        Day: <input type="text" name="day" value="<?php echo $row['day']; ?>"><br>
        Start Time: <input type="time" name="start_time" value="<?php echo $row['start_time']; ?>"><br>
        End Time: <input type="time" name="end_time" value="<?php echo $row['end_time']; ?>"><br>
        Student Category: 
        <select name="student_category">
            <option value="Beginner" <?php if($row['student_category'] == 'Beginner') echo 'selected'; ?>>Beginner</option>
            <option value="Intermediate" <?php if($row['student_category'] == 'Intermediate') echo 'selected'; ?>>Intermediate</option>
            <option value="Advanced" <?php if($row['student_category'] == 'Advanced') echo 'selected'; ?>>Advanced</option>
        </select><br>
        <input type="submit" value="Update">
    </form>

    <?php
} else {
    echo "No record found";
}

$conn->close();
?>
