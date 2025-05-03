<?php 
include('parties/nav.php');
require_once 'product/product-view.php';

$row = [];
$id = 0;

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM tbl_product AS p "
            . "JOIN tbl_category_product AS c "
            . "ON p.product_category = c.id "
            . "WHERE p.product_id = ?;";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $row = $result->fetch_assoc();
        $existing_img = $row['product_img'];
    } else {
        echo "Error: Could not retrieve product data.";
    }
    $result->close();
    $stmt->close();
}

$sql1 = "SELECT * FROM tbl_category_product";
$result1 = mysqli_query($conn, $sql1);

if (isset($_POST['submit'])) {
    $product_category = $_POST['product_category'];
    $product_name = $_POST['product_name'];
    $product_description = $_POST['product_description'];
    $product_price = $_POST['product_price'];

    $errors = [];

    // Validate Product Category
    if (empty($_POST["product_category"])) {
        $errors['product_category'] = "Product category is required";
    }
    if (empty($_POST["product_name"])) {
        $errors['product_name'] = "Product name is required";
    }
    if (empty($_POST["product_description"])) {
        $errors['product_description'] = "Product description is required";
    }
    if (empty($_POST["product_price"])) {
        $errors['product_price'] = "Price is required";
    } elseif ($_POST["product_price"] <= 0) {
        $errors['product_price'] = "Price must be greater than zero";
    }
    if (isset($_FILES['product_img']['name']) && !empty($_FILES['product_img']['name'])) {
        $allowed_extensions = ['jpg', 'jpeg', 'png'];
        $ext1 = strtolower(end(explode('.', $_FILES['product_img']['name'])));
    
        if (!in_array($ext1, $allowed_extensions)) {
            $errors['invalid-image'] = "<h3 class='error'>Invalid Image File! Only JPG, JPEG, and PNG allowed.</h3>";
        } else if ($_FILES['product_img']['size'] > 500000) {
            $errors['large-image'] = "<h3 class='error'>Image File Too Large! Max size 500KB.</h3>";
        }
    }    

    if (isset($_FILES['product_img']['name']) && !empty($_FILES['product_img']['name'])) {
        $newImg = $_FILES['product_img']['name'];
        $ext = end(explode('.' , $newImg));
        $img = "Product_" . time() . '.' . $ext;

        $source_path = $_FILES['product_img']['tmp_name'];
        $destination_path = "../img/product/" . $img;

        $upload = move_uploaded_file($source_path, $destination_path);

        if (!$upload) {
            echo "Error uploading image: " . $_FILES['product_img']['error'];
            exit();
        }
    } else {
        $img = $existing_img;
        $existing_img = null;
    }

    if (empty($errors)) {
        require_once 'product/product-model.php';
        require_once 'product/product-view.php';
        require_once 'product/product-contr.php';
        update_product($conn, $_POST['id'], $_POST['product_category'], $_POST['product_name'], $_POST['product_description'], $_POST['product_price'], $img);

        if (!empty($existing_img) && file_exists("../img/product/" . $existing_img)) {
            unlink("../img/product/" . $existing_img);
        }
        header('Location: manage-products.php');
        exit;
    }
}

?>
<main>
    <h1>Update Product Information</h1>
    
    <div class="wrapper">
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-full">
                <tr>
                    <td class="col-30">Product Category: </td>
                    <td class="col-70">
                        <select name="product_category" class="input">
                            <option value="<?php echo $row['product_category']?>">Choose Your Category</option>
                            <?php
                            while ($rows = mysqli_fetch_assoc($result1)) {
                                ?>
                                <option value="<?php echo $rows['id'] ?>; "><?php echo $rows['category_name']; ?></option>
                                <?php
                            }
                            ?>
                            
                        </select>
                        <?php if(isset($errors['product_category'])) echo "<span class='error'>{$errors['product_category']}</span>"; ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-30">Product Name	: </td>
                    <td class="col-70">
                        <input type="text" class="input" name="product_name" value="<?php echo $row['product_name']; ?>">
                        <?php if(isset($errors['product_name'])) echo "<span class='error'>{$errors['product_name']}</span>"; ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-30">Description: </td>
                    <td class="col-70">
                        <textarea name="product_description" cols="50" rows="10"><?php echo $row['product_description']; ?></textarea>
                        <?php if(isset($errors['product_description'])) echo "<span class='error'>{$errors['product_description']}</span>"; ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-30">Price (RM): </td>
                    <td class="col-70">
                        <input type="text" class="input" name="product_price" value="<?php echo $row['product_price']; ?>">
                        <?php if(isset($errors['product_price'])) echo "<span class='error'>{$errors['product_price']}</span>"; ?>
                        <?php if(isset($errors['negative_price'])) echo "<span class='error'>{$errors['negative_price']}</span>"; ?>
                    </td>
                </tr>
                <tr>
                    <td class="col-30">Image: </td>
                    <td class="col-70">
                        <input type="file" name="product_img">
                        <?php if(isset($errors['product_img'])) echo "<span class='error'>{$errors['product_img']}</span>"; ?>
                    </td>
                </tr>
            </table>
            <div class="action-submit">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="submit" value="Update Product" class="btn-admin btn-secondary">
            </div>
        </form>
    </div>
</main>
<?php include('parties/footer.php') ?>
