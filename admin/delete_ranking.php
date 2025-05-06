<?php
// Include the config.php file to establish the database connection
include('config.php');

// Check if the connection is successful
if ($conn) {
    // Proceed with your delete operation here
} else {
    echo "Error: Unable to connect to the database.";
}
?>

<?php
// Include the database configuration file
include('config.php');

// Check if the 'id' parameter is set in the URL
if(isset($_GET['id']) && !empty($_GET['id'])){
    // Sanitize the input to prevent SQL injection
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    
    // Prepare a delete statement
    $sql = "DELETE FROM rankings WHERE ranking_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    
    // Attempt to execute the prepared statement
    if($stmt->execute()){
        // Redirect back to the manage rankings page after successful deletion
        header("Location: manage_ranking.php");
        exit();
    } else {
        // If deletion fails, display an error message
        echo "Error: Unable to delete the ranking entry.";
    }

    // Close statement
    $stmt->close();
    
} else {
    // If 'id' parameter is not set, redirect back to the manage rankings page
    header("Location: manage_ranking.php");
    exit();
}

// Close connection
$conn->close();
?>


<!-- Back button -->
<div style="margin-top: 20px;">
    <a href="manage_ranking.php" style="text-decoration: none; background-color: #007bff; color: #fff; padding: 10px 20px; border-radius: 5px;">Back to Manage Rankings</a>
</div>
