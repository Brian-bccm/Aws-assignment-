<?php
include('config.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $category = $_POST['category'];
    $score = $_POST['score'];

    $sql = "INSERT INTO rankings (user_id, username, category, score) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('issi', $user_id, $username, $category, $score);

    if ($stmt->execute()) {
        echo "Ranking entry added successfully!";
    } else {
        echo "Error adding ranking entry: " . $conn->error;
    }
    header("Location: manage_ranking.php");
    exit();
    $stmt->close();
    $conn->close();
}
?>
