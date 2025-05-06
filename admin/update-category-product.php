<?php
session_start();
include('config.php'); // Assuming config.php contains the database connection code

if(isset($_POST['submit'])) {
    $category_name = $_POST['category_name'];

    // Validate category name
    if(empty($category_name)) {
        $_SESSION['category_name'] = "<h2 class='error'>Enter The Category Name!</h2>";
        header('location:add-category-product.php');
        exit();
    }

    // Validate image
    if(empty($_FILES['img']['name'])) {
        $_SESSION['upload'] = "<h2 class='error'>Please select an image to upload</h2>";
        header('location:add-category-product.php');
        exit();
    }

    // Image upload code
    $img = $_FILES['img']['name'];
    $ext = pathinfo($img, PATHINFO_EXTENSION);
    $img = "Product_Category_" . rand(0000,9999) . '.' . $ext;

    $source_path = $_FILES['img']['tmp_name'];
    $destination_path = "http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/category/" . $img;

    $upload = move_uploaded_file($source_path, $destination_path);
    if(!$upload) {
        $_SESSION['upload'] = "<h2 class='error'>Failed To Upload Image</h2>";
        header('location:add-category-product.php');
        exit();
    }

    // Database insertion
    $sql1 = "INSERT INTO tbl_category_product (category_name, img) VALUES ('$category_name', '$img')";
    $result1 = mysqli_query($conn, $sql1);

    if($result1) {
        $_SESSION['add-category-product'] = "<h2 class='success'>Category Added Successfully</h2>";
        header('location:manage-products.php');
        exit();
    } else {
        $_SESSION['add-category-product'] = "<h2 class='error'>Failed To Add Category</h2>";
        header('location:add-category-product.php');
        exit();
    }
}
?>
