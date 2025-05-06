<?php
if (isset($_POST['submit'])) {
    $event_category = $_POST['event_category'];
    $event_title = $_POST['event_title'];
    $event_detail = $_POST['event_detail'];
    $event_date = $_POST['event_date'];
    $event_location = $_POST['event_location'];
    if ($_FILES['event_img']['name']) {
        $event_img = $_FILES['event_img']['name'];
        $ext = end(explode('.' , $event_img));
        $event_img = "Event_" . rand(0000,9999) . '.' . $ext;
        $source_path = $_FILES['event_img']['tmp_name'];
        $destination_path = "../../img/event/" . $event_img;
        $upload = move_uploaded_file($source_path, $destination_path);if($upload == FALSE)
        {
            $_SESSION['upload'] = "<h2 class='error'>Failed To Upload Image</h2>";
            header('location:add-category.php');
        }
    }
    else {
        $event_img = "";
    }

    require_once '../../config/constants.php';
    require_once 'event-model.php';
    require_once 'event-view.php';
    require_once 'event-contr.php';

    //Error Handlers
    $errors = [];

    if(is_event_input_empty ($event_category, $event_title, $event_detail, $event_date, $event_location)) {
        $errors['event_input_empty'] = "Fill In All The Fields!";
    }

    if ($errors) {
        $_SESSION['errors_event'] = $errors;
        header('location:../add-event.php');
        die();
    }

    create_event ($conn, $event_category, $event_title, $event_detail, $event_date, $event_location, $event_img);

    $_SESSION['add_event_success'] = "<div class='success'>Event Added Successfully!</div>";

    header('location: ../add-event.php');
    $conn = null;
    $stmt = null;
    die();
}
?>