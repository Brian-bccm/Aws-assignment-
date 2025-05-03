<?php include('config.php'); ?>
<?php include('parties/nav.php'); ?>

<main>
    <h1>ADD RANKING</h1>
    

    <form action="" method="POST">
        <table class="tbl-30">
            <tr>
                <td>Username </td>
                <td><input type="text" name="username" placeholder="Enter username"></td>
            </tr>
            <tr>
                <td>UserID</td>
                <td><input type="text" name="user_id" placeholder="Enter UserID"></td>
            </tr>
             <tr>
                <td>Score </td>
                <td><input type="text" name="score" placeholder="Enter Score"></td>
            </tr>
            <tr>
                <td colspan="2">
                    <input type="submit" name="submit" value="Add Ranking" class="btn-primary">
                </td>
            </tr>
        </table>
    </form>

    <?php
    if(isset($_POST['submit'])) {
        $username = $_POST['username'];
        $user_id = $_POST['user_id'];
        $score = $_POST['score'];

       $sql = "INSERT INTO rankings(user_id,username,score) values('$user_id','$username','$score')";

        $res = $conn->query($sql);

        if($res==TRUE) {
            $_SESSION['add'] = "Ranking Added Successfully";
            header("location: manage_ranking.php");
        } else {
            $_SESSION['add'] = "Failed to Add Ranking";
            header("location: add_ranking.php");
        }
    }
    ?>
</main>

<?php include('parties/footer.php'); ?>

