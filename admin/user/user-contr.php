<?php

function add_user (object $conn, $fullname, $username, $email, $phone_number, $img, $pwd) {
    call_add_user ($conn, $fullname, $username, $email, $phone_number, $img, $pwd);
}

function is_user_input_empty ($fullname, $username, $email, $phone_number, $pwd) {
    if (empty($fullname) || empty($username) || empty($email) || empty($phone_number) || empty($pwd)) {
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
    if (!empty($phone_number) && !preg_match('/^01[0-9]{8}$/', $phone_number)) {
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