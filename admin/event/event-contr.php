<?php

function is_event_input_empty (string $event_category, string $event_title, string $event_detail, $event_date, string $event_location) {

    if (empty($event_category) || empty($event_title) || empty($event_detail) || empty($event_date) || empty($event_location)) {
        return true;
    }
    else {
        return false;
    }

}

function create_event (object $conn, string $event_category, string $event_title, string $event_detail, $event_date, string $event_location, $event_img) {
    set_event($conn, $event_category, $event_title, $event_detail, $event_date, $event_location, $event_img);
}

function delete_event (object $conn, $id) {
    call_delete_event ($conn, $id);
}

function update_event (object $conn, $id, string $event_category, string $event_title, string $event_detail, $event_date, string $event_location, string $event_img) {
    call_update_event ($conn, $id, $event_category, $event_title, $event_detail, $event_date, $event_location, $event_img);
}