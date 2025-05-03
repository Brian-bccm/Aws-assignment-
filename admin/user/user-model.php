<?php

function call_add_user (object $conn, $fullname, $username, $email, $phone_number, $img, $pwd) {
    $sql1 = "INSERT INTO
        tbl_user SET
        fullname = ?,
        username = ?,
        email = ?,
        phone_number = ?,
        pwd = ?,
        img = ?
    ";
    $stmt = $conn->prepare($sql1);
    $stmt->bind_param("ssssss", $fullname, $username, $email, $phone_number, $pwd, $img);
    $stmt->execute();
}

function get_username ($conn, $username) {
    $sql = "SELECT username FROM tbl_user WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
}

function get_email ($conn, $email) {
    $sql = "SELECT username FROM tbl_user WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
}

function get_phoneNumber ($conn, $phone_number) {
    $sql = "SELECT username FROM tbl_user WHERE phone_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $phone_number);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
}