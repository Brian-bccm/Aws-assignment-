<?php include('config.php'); ?>
<?php include('parties/nav.php'); ?>

<main>
    <h1>MANAGE RANKINGS</h1>
    <?php
    if (isset($_SESSION['ranking_update'])) {
        echo $_SESSION['ranking_update'];
        unset($_SESSION['ranking_update']);
    }
    ?>
    <div class="wrapper">
    <!-- Form for creating a new ranking entry -->
        <form method="post" action="create_ranking.php">
            <table class="tbl-full">
                <tr>
                    <td>
                        <label for="user_id">User ID:</label>
                    </td>
                    <td>
                        <input type="text" class="input" name="user_id" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="username">Username:</label>
                    </td>
                    <td>
                        <input type="text" class="input" name="username" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="category">Category:</label>
                    </td>
                    <td>
                        <input type="text" class="input" name="category" required>
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="score">Score:</label>
                    </td>
                    <td>
                        <input type="number" class="input" name="score" required>
                    </td>
                </tr>
            </table>
            <div class="action-submit">
                <input type="submit" name="submit" value="Add Ranking Entry" class="btn-admin btn-secondary">
            </div>
        </form>
    </div>
    <?php include('read_rankings.php'); ?>
</main>

<?php include('parties/footer.php'); ?>
