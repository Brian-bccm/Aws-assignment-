<?php 
include('parties/nav.php');
if (isset($_GET['id']))
{
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM tbl_event WHERE id = $id";
    $result1 = mysqli_query($conn, $sql1);
    $row = mysqli_fetch_assoc($result1);
}
?>
<main>
    <h1>Update EVENT</h1>
    
    <div class="wrapper">
        <div class="update-admin">
            <form action="event/update-event.php" method="POST" enctype="multipart/form-data">
                <table class="tbl-full">
                    <tr>
                        <td class="col-30">Category: </td>
                        <td class="col-70">
                            <select name="event_category" class="input">
                                <option value="<?php echo $row['event_category']; ?>">Select Category</option>
                                <option value="Competition">Competition</option>
                                <option value="Trials">Trials</option>
                                <option value="Course">Course</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Title: </td>
                        <td class="col-70">
                            <input type="text" name="event_title" class="input" value="<?php echo $row['event_title']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Description: </td>
                        <td class="col-70">
                            <textarea name="event_detail" class="input" cols="50" rows="10"><?php echo $row['event_detail']; ?></textarea>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Date: </td>
                        <td class="col-70">
                            <input type="date" name="event_date" class="input" value="<?php echo $row['event_date']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Location: </td>
                        <td class="col-70">
                            <input type="text" name="event_location" class="input" value="<?php echo $row['event_location']; ?>">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Image: </td>
                        <td class="col-70">
                            <input type="file" name="event_img">
                            <input type="hidden" name="img">
                        </td>
                    </tr>
                    </table>
                    <div class="action-submit">
                        <input type="hidden" name="id" value="<?php echo $id; ?>">
                        <input type="submit" name="submit" value="Update Event" class="btn-admin btn-secondary">
                    </div>
            </form>
        </div>
    </div>
</main>
<?php include('parties/footer.php') ?>