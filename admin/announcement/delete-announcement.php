<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once '../../config/constants.php';
    require_once 'announcement-model.php';
    require_once 'announcement-view.php';
    require_once 'announcement-contr.php';

    //Error Handlers

    delete_announcement($conn, $id);

    $_SESSION['delete_announcement'] = "<h2 class='success'>Announcement Deleted Successfully</h2>";

    header('location:../manage-announcement.php');

    $conn = null;
    $stmt = null;
    die();
}
?>