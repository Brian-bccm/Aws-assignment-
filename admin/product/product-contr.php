<?php

function delete_product (object $conn, $id) {
    call_delete_product ($conn, $id);
}

function update_product (object $conn, $id, string $product_category, string $product_name, string $product_description, $product_price, string $product_img) {
    call_update_product($conn, $id, $product_category, $product_name, $product_description, $product_price, $product_img);
}