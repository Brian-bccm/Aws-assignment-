<?php
include 'db_connect.php';

$sql = "SELECT * FROM Timetable";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table class='table'>
            <tr>
                <th>Timetable ID</th>
                <th>Day</th>
                <th>Start Time</th>
                <th>End Time</th>
                <th>Student Category</th>
                <th>Actions</th>
            </tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>" . $row["timetable_id"]. "</td>
                <td>" . $row["day"]. "</td>
                <td>" . $row["start_time"]. "</td>
                <td>" . $row["end_time"]. "</td>
                <td>" . $row["student_category"]. "</td>
                <td>
                    <a href='updatetimetable.php?timetable_id=" . $row["timetable_id"]. "'>Update</a> | 
                    <a href='deletetimetable.php?timetable_id=" . $row["timetable_id"]. "'>Delete</a>
                </td>
              </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
