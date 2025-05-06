<?php

function check_announcement_error() {
    if(isset($_SESSION['delete_announcement'])) {
        echo $_SESSION['delete_announcement'];
        unset($_SESSION['delete_announcement']);
    }else if (isset($_SESSION['update_announcement_success'])) {
        echo $_SESSION['update_announcement_success'];
        unset($_SESSION['update_announcement_success']);
    }
}