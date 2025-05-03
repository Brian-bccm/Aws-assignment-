<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $student_category = $_POST['student_category'];

    $sql = "INSERT INTO Timetable (day, start_time, end_time, student_category) VALUES ('$day', '$start_time', '$end_time', '$student_category')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
        
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
    header("Location: manage-timetable.php");
    exit();
}
?>
