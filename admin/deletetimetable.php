<?php
include 'db_connect.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $timetable_id = $_GET['timetable_id'];

    $sql = "DELETE FROM Timetable WHERE timetable_id=$timetable_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
        header("Location: manage-timetable.php");
    exit();
}
?>
