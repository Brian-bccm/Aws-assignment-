<?php

function check_user_error () {
    if(isset($_SESSION['errors_user'])) {
        $errors = $_SESSION['errors_user'];
        foreach ($errors AS $error) {
            echo "<h3 class='error'>" . $error . "</h3>";
        }
        unset($_SESSION['errors_user']);
    }
}