<?php

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $product_category = $_POST['product_category'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    if ($_FILES['product_img']['name']) {
        $product_img = $_FILES['product_img']['name'];
        $ext = end(explode('.' , $product_img));
        $product_img = "Product_" . rand(0000,9999) . '.' . $ext;
        $source_path = $_FILES['product_img']['tmp_name'];
        $destination_path = "../../img/product/" . $product_img;
        $upload = move_uploaded_file($source_path, $destination_path);
    }
    else {
        $product_img = $_POST['product_img_2'];
    }

    require_once '../../config/constants.php';
    require_once 'product-model.php';
    require_once 'product-view.php';
    require_once 'product-contr.php';

    update_product ($conn, $id, $product_category, $product_name, $product_description, $product_price, $product_img);

    $_SESSION['update_product'] = "<div class='success'>Product Updated Successfully!</div>";

    header('location:../manage-products.php');
    $conn = null;
    $stmt = null;
    die();
}