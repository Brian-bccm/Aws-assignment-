<?php

function add_admin (object $conn, $full_name, $username, $email, $phone_number, $img, $password) {
    call_add_admin ($conn, $full_name, $username, $email, $phone_number, $img, $password);
}

function is_user_input_empty ($full_name, $username, $email, $phone_number, $password) {
    if (empty($full_name) || empty($username) || empty($email) || empty($phone_number) || empty($password)) {
        return true;
    } else {
        return false;
    }
}

function is_email_invalid ($email) {
    if(!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

function is_phoneNumber_invalid ($phone_number) {
    if (!empty($phone_number) && !preg_match('/^0?(1[0-9]{8,10})/', $phone_number)) {
        return true;
    } else {
        return false;
    }
}

function is_username_taken ($conn, $username) {
    if(get_username ($conn, $username)) {
        return true;
    } else {
        return false;
    }
}

function is_phoneNumber_taken ($conn, $phone_number) {
    if(get_phoneNumber ($conn, $phone_number)) {
        return true;
    } else {
        return false;
    }
}

function is_email_registered ($conn, $email) {
    if(get_email ($conn, $email)) {
        return true;
    } else {
        return false;
    }
}

