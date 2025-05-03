<?php
include('config.php');

// Fetching the ranking details based on the provided ranking ID
if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM rankings WHERE ranking_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $user_id = $row['user_id'];
        $username = $row['username'];
        $category = $row['category'];
        $score = $row['score'];
    } else {
        echo "Ranking entry not found.";
    }

    $stmt->close();
}

// Updating the ranking entry with new data
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $user_id = $_POST['user_id'];
    $username = $_POST['username'];
    $category = $_POST['category'];
    $score = $_POST['score'];

    $sql = "UPDATE rankings SET user_id=?, username=?, category=?, score=? WHERE ranking_id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('isssi', $user_id, $username, $category, $score, $id);

    if ($stmt->execute()) {
        $_SESSION['ranking_update'] = "<h3 class='success'>Ranking entry updated successfully!</h3";
        header('location:manage_ranking.php');
    } else {
        echo "Error updating ranking entry: " . $conn->error;
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Ranking</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-top: 20px;
        }
        form div {
            margin-bottom: 15px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
        }
        form input[type="text"],
        form input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            font-size: 16px;
            box-sizing: border-box;
        }
        form button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
            border-radius: 3px;
        }
        form button:hover {
            background-color: #0056b3;
        }
        .back-btn {
            display: block;
            margin-top: 20px;
            text-align: center;
        }
        .back-btn a {
            color: #007bff;
            text-decoration: none;
        }
        .back-btn a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<main>
    <div class="container">
    <h1>UPDATE RANKING</h1>
    <br><br>

    <form action="" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <div>
            <label for="user_id">User ID:</label>
            <input type="text" name="user_id" value="<?php echo $user_id; ?>" required>
        </div>
        <div>
            <label for="username">Username:</label>
            <input type="text" name="username" value="<?php echo $username; ?>" required>
        </div>
        <div>
            <label for="category">Category:</label>
                <select name="category" required>
                    <option value="Beginner" <?php echo ($category == 'Beginner') ? 'selected' : ''; ?>>Beginner</option>
                    <option value="Intermediate" <?php echo ($category == 'Intermediate') ? 'selected' : ''; ?>>Intermediate</option>
                    <option value="Advanced" <?php echo ($category == 'Advanced') ? 'selected' : ''; ?>>Advanced</option>
                </select>
        </div>
        <div>
            <label for="score">Score:</label>
            <input type="text" name="score" value="<?php echo $score; ?>">
        </div>
        <div>
            <button type="submit">Update Ranking</button>
        </div>
    </form>
    </div>
</main>
</body>
</html>
