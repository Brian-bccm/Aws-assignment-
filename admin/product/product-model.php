<?php

function call_delete_product (object $conn, $id) {
    $sql = "DELETE FROM tbl_product WHERE product_id = '$id'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
}

function call_update_product (object $conn, $id, string $product_category, string $product_name, string $product_description, $product_price, string $product_img) {
    $sql = "UPDATE tbl_product SET product_category = ?, product_name = ?, product_description = ?, product_price = ?, product_img = ? WHERE product_id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssssi", $product_category, $product_name, $product_description, $product_price, $product_img, $id);
    $stmt->execute();
}