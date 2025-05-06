<?php

function call_delete_announcement (object $conn, $id) {
    $sql = "DELETE FROM tbl_announment WHERE id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
}

function call_update_announcement (object $conn, $id, string $title, string $description, string $location, $date) {
    $sql = "UPDATE tbl_announment SET title = ?, description = ?, location = ?, date = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssssi", $title, $description, $location, $date, $id);
    $stmt->execute();
}