<?php 
include('parties/nav.php');
?>
    <main>
        <h1>ADD ANNOUNCEMENT</h1>
        
        <div class="wrapper">
            <?php
            if (isset($_SESSION['errors'])) {
                $errors = $_SESSION['errors'];
                foreach ($errors as $error) {
                    echo '<h3 class="error">'.$error.'</h3>';
                }
                unset($_SESSION['errors']);
            }
            ?>
            <form action="" method="POST">
                <table class="tbl-full">
                    <tr>
                        <td class="col-30">Announcement Title : </td>
                        <td class="col-70">
                            <input type="text" name="title" class="input" placeholder="Full Name">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Description: </td>
                        <td class="col-70">
                            <textarea name="description" cols="50" rows="10" placeholder="Type Something ..."></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Location: </td>
                        <td class="col-70">
                            <select name="location" class="input">
                                <option value="">Select a Location</option>
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
                            <input type="date" name="date" class="input" min="<?php echo date('Y-m-d', strtotime('tomorrow')); ?>">
                        </td>
                    </tr>
                </table>
                <div class="action-submit">
                    <input type="submit" name="submit" value="Add Announcement" class="btn-admin btn-secondary">
                </div>
            </form>
        </div>
    </main>

<?php
if(isset($_POST['submit']))
{
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $date = $_POST['date'];

    $errors = [];

    if (empty($title) || empty($description) || empty($location) || empty($date)) {
        $errors['empty-data'] = "Fill Up All Field!!";
    }
    if (!empty($title)) {
        $wordCount = str_word_count($title);
        if ($wordCount < 3) {
            $errors['title'] = "Announcement Title must contain at least 3 words!";
        }
    }
    if (!empty($description)) {
        $wordCount = str_word_count($description);
        if ($wordCount < 8) {
            $errors['description'] = "Announcement Description must contain at least 8 words!";
        }
    }
    $selectedDate = strtotime($_POST['date']);
    if (!empty($date) &&$selectedDate <= strtotime('today')) {
        $errors['date'] = "Announcement Date cannot be past or present. Please select a future date.";
    }
    if (!empty($title) || !empty($description) || !empty($location) || !empty($date)) {
        $sql = "SELECT COUNT(*) FROM tbl_announment WHERE title = ? AND description = ? AND location = ? AND date = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $title, $description, $location, $date);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['COUNT(*)'] > 0) {
            $errors['duplicate-announcement'] = "Announcement already exists!";
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('location:add-announcement.php');
        die();
    }

    $sql1 = "INSERT INTO
            tbl_announment SET
            title = '$title',
            description = '$description',
            location = '$location',
            date = '$date'";
    $result1 = mysqli_query($conn, $sql1);
    if($result1 == TRUE)
    {
        $_SESSION['add-announcement'] = "<h2 class='success'>Announcement Added Successfully</h2>";
        header('location:manage-announcement.php');
    }
    else
    {
        $_SESSION['add-announcement'] = "<h2 class='error'>Failed to Added Announcement</h2>";
        header('location:manage-announcement.php');
    }
}
?>
<?php include('parties/footer.php') ?>