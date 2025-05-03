<?php 
include('parties/nav.php');
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM tbl_announment WHERE id = $id";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);
}
?>

<main>
    <h1>Update ANNOUNCEMENT</h1>
    
    <div class="wrapper">
        <div class="update-admin">
            <?php
            if (isset($_SESSION['errors'])) {
                $errors = $_SESSION['errors'];
                foreach ($errors as $error) {
                    echo "<h3 class='error'>".$error."</h3>";
                }
                unset($_SESSION['errors']);
            }
            ?>
            <form action="announcement/update-announcement.php" method="POST">
                <table class="tbl-full">
                    <tr>
                        <td class="col-30">Title: </td>
                        <td class="col-70">
                            <input type="text" name="title" class="input" value="<?php echo $row['title'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Description: </td>
                        <td class="col-70">
                            <textarea name="description" cols="50" rows="10"><?php echo $row['description'] ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Location: </td>
                        <td class="col-70">
                        <select name="location" class="input">
                                <option value="<?php echo $row['location'] ?>">Select a Location</option>
                                <optgroup label="Schools">
                                    <option value="Tar UMT Penang Branch">Tar UMT Penang Branch</option>
                                    <option value="Universiti Malaysia Terengganu (UMT) Penang Branch">Universiti Malaysia Terengganu (UMT) Penang Branch</option>
                                    <option value="Penang Free School">Penang Free School</option>
                                    <option value="Penang Chinese Girls' School">Penang Chinese Girls' School</option>
                                </optgroup>
                                <optgroup label="Stadiums">
                                    <option value="Penang State Stadium">Penang State Stadium</option>
                                    <option value="City Bay Stadium">City Bay Stadium</option>
                                    <option value="Batu Kawan Stadium">Batu Kawan Stadium</option>
                                </optgroup>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Date: </td>
                        <td class="col-70">
                            <input class="input" type="date" name="date" value="<?php echo $row['date'] ?>" min="<?php echo date('Y-m-d', strtotime('tomorrow')); ?>">
                        </td>
                    </tr>
                    </table>
                    <div class="action-submit">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Announcement" class="btn-admin btn-secondary">
                    </div>
            </form>
        </div>
    </div>
</main>

<?php include('parties/footer.php') ?>