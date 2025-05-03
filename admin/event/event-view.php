<?php

function check_event_errors () {
    if (isset($_SESSION['errors_event'])) {
        $errors = $_SESSION['errors_event'];
        foreach ($errors as $error) {
            echo '<div class="error">' . $error . '</div>';
        }
        unset($_SESSION['errors_event']);
    }else if (isset($_SESSION['add_event_success'])) {
        echo $_SESSION['add_event_success'];
        unset($_SESSION['add_event_success']);
    }else if (isset($_SESSION['upload'])) {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }else if (isset($_SESSION['delete_event'])) {
        echo $_SESSION['delete_event'];
        unset($_SESSION['delete_event']);
    }else if (isset($_SESSION['update_event_success'])) {
        echo $_SESSION['update_event_success'];
        unset($_SESSION['update_event_success']);
    }
}