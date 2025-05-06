<?php
$sql = "SELECT * FROM rankings ORDER BY score DESC"; // Order by score in descending order
$result = $conn->query($sql);
?>
    <div class="list-table">
        <h2>Ranking</h2>
            <div class="wrapper">
                <table class="tbl-full text-center">
                    <thead>
                        <tr>
                            <th>User ID</th>
                            <th>Username</th>
                            <th>Category</th>
                            <th>Score</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                            while ($row = $result->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['user_id'] . "</td>";
                                echo "<td>" . $row['username'] . "</td>";
                                echo "<td>" . $row['category'] . "</td>";
                                echo "<td>" . $row['score'] . "</td>";
                                echo "<td><a href='update_ranking.php?id=" . $row['ranking_id'] . "'  class='btn-admin btn-secondary'>Update</a><a href='delete_ranking.php?id=" . $row['ranking_id'] . "' class='btn-admin btn-danger'>Delete</a></td>";
                                echo "</tr>";
                            }
                        } else {
                            ?>
                            <tr>
                                <td colspan="5">
                                    <?php
                                    echo "No ranking entries found.";
                                    ?>
                                </td>
                            </tr>
                            <?php
                        }
                    ?>
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
