<?php

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $event_category = $_POST['event_category'];
    $event_title = $_POST['event_title'];
    $event_detail = $_POST['event_detail'];
    $event_date = $_POST['event_date'];
    $event_location = $_POST['event_location'];
    if(isset($_FILES['event_img']['name']))
    {
        $event_img = $_FILES['event_img']['name'];
        $ext = end(explode('.' , $event_img));
        $event_img = "Event_" . rand(0000,9999) . '.' . $ext;

        $source_path = $_FILES['event_img']['tmp_name'];
        $destination_path = "../../img/event/" . $event_img;

        $upload = move_uploaded_file($source_path, $destination_path);
    }

    require_once '../../config/constants.php';
    require_once 'event-model.php';
    require_once 'event-view.php';
    require_once 'event-contr.php';

    update_event ($conn, $id, $event_category, $event_title, $event_detail, $event_date, $event_location, $event_img);

    $_SESSION['update_event_success'] = "<h2 class='success'>Event Updated Successfully!!!</h2>";

    header('location: ../manage-event.php');
    $conn = null;
    $stmt = null;
    die();
}