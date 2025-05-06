<?php

function set_event (object $conn, string $event_category, string $event_title, string $event_detail, $event_date, string $event_location, $event_img) {
    $sql = "INSERT INTO tbl_event (event_category, event_title, event_detail, event_date, event_location, event_img) VALUES (?,?,?,?,?,?);";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssss", $event_category, $event_title, $event_detail, $event_date, $event_location, $event_img);
    $stmt->execute();
}

function call_delete_event (object $conn, $id) {
    $sql = "DELETE FROM tbl_event WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

function call_update_event (object $conn, $id, string $event_category, string $event_title, string $event_detail, $event_date, string $event_location, string $event_img) {
    $sql = "UPDATE tbl_event SET event_category = ?, event_title = ?, event_detail = ?, event_date = ?, event_location = ?, event_img = ? WHERE id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssssi", $event_category, $event_title, $event_detail, $event_date, $event_location, $event_img, $id);
    $stmt->execute();
}