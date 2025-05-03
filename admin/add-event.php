<?php 
include('parties/nav.php');
require_once('event/event-view.php');
?>
    <main>
        <h1>ADD EVENT</h1>
        <div class="wrapper">
            <?php
            check_event_errors();
            ?>
            <form action="event/add-event.php" method="POST" enctype="multipart/form-data">
                <table class="tbl-full">
                    <tr>
                        <td class="col-30">Event Category: </td>
                        <td class="col-70">
                            <select name="event_category" class="input">
                                <option value="competition">Competition</option>
                                <option value="trails">Trails</option>
                                <option value="course">Course</option>
                            </select>
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Event Title: </td>
                        <td class="col-70">
                            <input type="text" name="event_title" class="input" placeholder="Titles ...">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Event Detail: </td>
                        <td class="col-70">
                            <input type="text" name="event_detail" class="input" placeholder="Description ...">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Date: </td>
                        <td class="col-70">
                            <input type="date" name="event_date" class="input">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Location: </td>
                        <td class="col-70">
                            <input type="text" name="event_location" class="input" placeholder="Location">
                        </td>
                    </tr>
                    <tr>
                        <td class="col-30">Image: </td>
                        <td class="col-70">
                            <input type="file" name="event_img">
                        </td>
                    </tr>
                </table>
                <div class="action-submit">
                    <input type="submit" name="submit" value="Add Event" class="btn-admin btn-secondary">
                </div>
            </form>
        </div>
    </main>
<?php include('parties/footer.php') ?>