<?php
session_start();
include('config.php'); // Assuming config.php contains the database connection code

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Ensure the ID is an integer to prevent SQL injection
    $id = intval($id);

    // Check if the category exists and get the current image name
    $sql1 = "SELECT img FROM tbl_category_product WHERE id = $id";
    $result1 = mysqli_query($conn, $sql1);

    if($result1 && mysqli_num_rows($result1) > 0) {
        $row = mysqli_fetch_assoc($result1);

        // Remove the image file from the server if it exists
        if($row['img'] != "") {
            $remove_path = "http://awsgraduatebucket.s3-website-us-east-1.amazonaws.com/img/category/" . $row['img'];
            if(file_exists($remove_path)) {
                unlink($remove_path);
            } else {
                $_SESSION['upload'] = "<h2 class='error'>Image file does not exist</h2>";
            }
        }

        // Delete the category from the database
        $sql2 = "DELETE FROM tbl_category_product WHERE id = $id";
        $result2 = mysqli_query($conn, $sql2);

        if($result2) {
            $_SESSION['delete-category-product'] = "<h2 class='success'>Category Deleted Successfully</h2>";
        } else {
            $_SESSION['delete-category-product'] = "<h2 class='error'>Failed To Delete Category</h2>";
        }
    } else {
        $_SESSION['delete-category-product'] = "<h2 class='error'>Category not found</h2>";
    }

    header('location:manage-products.php');
    exit();
} else {
    header('location:manage-products.php');
    exit();
}
?>
