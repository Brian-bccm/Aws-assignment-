<?php
include('parties/nav.php');
$sql1 = "SELECT * FROM tbl_category_product";
$result1 = mysqli_query($conn, $sql1);
?>
<main>
    <h1>ADD PRODUCT</h1>
    <?php
    if (isset($_SESSION['upload'])) {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    if (isset($_SESSION['add-product'])) {
        echo $_SESSION['add-product'];
        unset($_SESSION['add-product']);
    }
    if (isset($_SESSION['validation-error'])) {
        echo $_SESSION['validation-error'];
        unset($_SESSION['validation-error']);
    }
    ?>
    <div class="wrapper">
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-full">
                <tr>
                    <td class="col-30">Product Category : </td>
                    <td class="col-70">
                        <select name="product_category" class="input">
                            <?php
                            if ($result1 == TRUE) {
                                while ($row = mysqli_fetch_assoc($result1)) {
                                    ?>
                                    <option value="<?php echo $row['id']; ?>"><?php echo $row['category_name']; ?></option>
                                    <?php
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td class="col-30">Product Name : </td>
                    <td class="col-70">
                        <input type="text" name="product_name" class="input" placeholder="Product Name">
                    </td>
                </tr>
                <tr>
                    <td class="col-30">Description : </td>
                    <td class="col-70">
                        <textarea name="product_description" cols="50" rows="10"
                            placeholder="Type Something ..."></textarea>
                    </td>
                </tr>
                <tr>
                    <td class="col-30">Price : </td>
                    <td class="col-70">
                        <input type="text" name="product_price" class="input" placeholder="Price / RM">
                    </td>
                </tr>
                <tr>
                    <td class="col-30">Image</td>
                    <td class="col-70">
                        <input type="file" name="product_img">
                    </td>
                </tr>
            </table>
            <div class="action-submit">
                <input type="submit" name="submit" value="Add Product" class="btn-admin btn-secondary">
            </div>
        </form>
    </div>
</main>

<?php
if (isset($_POST['submit'])) {
    $product_category = $_POST['product_category'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];
    $product_img_name = isset($_FILES['product_img']['name']) ? $_FILES['product_img']['name'] : "";

    // Initialize validation error variable
    $validation_error = "";

    // Validate product name
    if (empty($product_name)) {
        $validation_error .= "<h2 class='error'>Product Name is required.</h2>";
    }

    // Validate product description
    if (empty($product_description)) {
        $validation_error .= "<h2 class='error'>Product Description is required.</h2>";
    }

    // Validate the product price
    if (!is_numeric($product_price) || $product_price < 0) {
        $validation_error .= "<h2 class='error'>Price must be a non-negative number.</h2>";
    }

    // Validate image upload (check if a file was selected)
    if (empty($product_img_name)) {
        $validation_error .= "<h2 class='error'>Product image is required.</h2>";
    }

    // Check if there are any validation errors
    if (!empty($validation_error)) {
        $_SESSION['validation-error'] = $validation_error;
        header('location:add-product.php');
        exit();
    }

    $product_img = ""; // Initialize $product_img here

    if ($product_img_name != "") {
        $ext = end(explode('.', $product_img_name));
        $product_img = "Product_" . rand(0000, 9999) . '.' . $ext;

        $source_path = $_FILES['product_img']['tmp_name'];
        $destination_path = "../img/product/" . $product_img;

        $upload = move_uploaded_file($source_path, $destination_path);
        if ($upload == FALSE) {
            $_SESSION['upload'] = "<h2 class='error'>Failed To Upload Image</h2>";
            header('location:add-product.php');
            exit();
        }
    }

    $sql2 = "INSERT INTO tbl_product SET
                product_category = '$product_category',
                product_name = '$product_name',
                product_description = '$product_description',
                product_price = $product_price,
                product_img = '$product_img'
            ";
    $result2 = mysqli_query($conn, $sql2);
    if ($result2 == TRUE) {
        $_SESSION['add-product'] = "<h2 class='success'>Product Added Successfully</h2>";
        header('location:manage-products.php');
    } else {
        $_SESSION['add-product'] = "<h2 class='error'>Failed To Add Product</h2>";
        header('location:add-product.php');
    }
}
?>
<?php include('parties/footer.php') ?>