<?php

if(!isset($_SESSION['check_user'])) {
    $_SESSION['no-login-message'] = '<h2 class="error">Please login to access Admin Page!!!</h2>';
    header('location:login.php');
}