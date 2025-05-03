<?php

function check_admin_error () {
    if(isset($_SESSION['errors_admin'])) {
        $errors = $_SESSION['errors_admin'];
        foreach ($errors AS $error) {
            echo "<h3 class='error'>" . $error . "</h3>";
        }
        unset($_SESSION['errors_admin']);
    }
}