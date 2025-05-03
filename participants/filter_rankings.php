<?php
include("../admin/config.php");

// Get category filter value from AJAX request
$category = isset($_GET['category']) ? $_GET['category'] : '';

// Prepare SQL query with category filtering
$sql = "SELECT * FROM rankings";
if (!empty($category)) {
    $sql .= " WHERE category = '$category'";
}
$sql .= " ORDER BY score DESC"; // Sort by score in descending order

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Generate ranking tables dynamically based on filtered data
    echo "<table>";
    echo "<thead>";
    echo "<tr>";
    echo "<th>User ID</th>";
    echo "<th>Username</th>";
    echo "<th>Category</th>";
    echo "<th>Score</th>";
    echo "</tr>";
    echo "</thead>";
    echo "<tbody>";
    while ($row = $result->fetch_assoc()) {
        // Output table rows with ranking data
        // Adjust HTML structure as per your requirements
        echo "<tr>";
        echo "<td>" . $row['user_id'] . "</td>";
        echo "<td>" . $row['username'] . "</td>";
        echo "<td>" . $row['category'] . "</td>";
        echo "<td>" . $row['score'] . "</td>";
        echo "</tr>";
    }
    echo "</tbody>";
    echo "</table>";
} else {
    echo "No ranking entries found.";
}

$conn->close();
?>