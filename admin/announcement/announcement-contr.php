<?php

function delete_announcement (object $conn, $id) {
    call_delete_announcement ($conn, $id);
}

function update_announcement (object $conn, $id, string $title, string $description, string $location, $date) {
    call_update_announcement ($conn, $id, $title, $description, $location, $date);
}