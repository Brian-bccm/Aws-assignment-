<?php
include 'config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $timetable_id = $_POST['timetable_id'];
    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $student_category = $_POST['student_category'];

    $sql = "UPDATE Timetable SET day='$day', start_time='$start_time', end_time='$end_time', student_category='$student_category' WHERE timetable_id=$timetable_id";

    if ($conn->query($sql) === TRUE) {
        header("Location: manage-timetable.php");
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
