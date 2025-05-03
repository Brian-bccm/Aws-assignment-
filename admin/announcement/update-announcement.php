<?php

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $location = $_POST['location'];
    $date = $_POST['date'];

    require_once '../../config/constants.php';
    require_once 'announcement-model.php';
    require_once 'announcement-view.php';
    require_once 'announcement-contr.php';

    //error handler
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
        $sql = "SELECT COUNT(*) FROM tbl_announment WHERE title = ? AND description = ? AND location = ? AND date = ? AND id <> ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $title, $description, $location, $date, $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        if ($row['COUNT(*)'] > 0) {
            $errors['duplicate-announcement'] = "Announcement already exists!";
        }
    }

    if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header('location:../update-announcement.php?id=' . $id);
        die();
    }

    update_announcement ($conn, $id, $title, $description, $location, $date);

    $_SESSION['update_announcement_success'] = "<h2 class='success'>Announcement Updated Successfully!!!</h2>";

    header('location:../manage-announcement.php');
    $conn = null;
    $stmt = null;
    die();
}