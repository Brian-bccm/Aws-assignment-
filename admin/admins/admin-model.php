<?php

function call_add_admin (object $conn, $full_name, $username, $email, $phone_number, $img, $password) {
    $sql1 = "INSERT INTO
        tbl_admin SET
        full_name = ?,
        username = ?,
        email = ?,
        phone_number = ?,
        password = ?,
        img = ?
    ";
    $stmt = $conn->prepare($sql1);
    $stmt->bind_param("ssssss", $full_name, $username, $email, $phone_number, $password, $img);
    $stmt->execute();
}

function get_username ($conn, $username) {
    $sql = "SELECT username FROM tbl_admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
}

function get_email ($conn, $email) {
    $sql = "SELECT username FROM tbl_admin WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
}

function get_phoneNumber ($conn, $phone_number) {
    $sql = "SELECT username FROM tbl_admin WHERE phone_number = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $phone_number);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    return $row;
}