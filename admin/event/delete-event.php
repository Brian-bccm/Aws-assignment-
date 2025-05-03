<?php

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    require_once '../../config/constants.php';
    require_once 'event-model.php';
    require_once 'event-view.php';
    require_once 'event-contr.php';

    delete_event($conn, $id);

    $_SESSION['delete_event'] = "<h2 class='success'>Event Deleted Successfully!!!</h2>";

    header('location:../manage-event.php');
    $conn = null;
    $stmt = null;
    die();
}