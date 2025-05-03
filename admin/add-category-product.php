<?php
include('parties/nav.php');
$sql2 = "SELECT * FROM tbl_category_product";
$result2 = mysqli_query($conn, $sql2);
?>
<main>
    <h1>Add Category</h1>
    <?php
    if(isset($_SESSION['category_name'])) {
        echo $_SESSION['category_name'];
        unset($_SESSION['category_name']);
    }
    if(isset($_SESSION['add-category-product'])) {
        echo $_SESSION['add-category-product'];
        unset($_SESSION['add-category-product']);
    }
    if(isset($_SESSION['upload'])) {
        echo $_SESSION['upload'];
        unset($_SESSION['upload']);
    }
    ?>
    <div class="wrapper">
        <form action="" method="POST" enctype="multipart/form-data">
            <table class="tbl-full">
                <tr>
                    <td class="col-30">Name: </td>
                    <td class="col-70">
                        <input type="text" name="category_name" class="input" placeholder="Full Name">
                    </td>
                </tr>
                <tr>
                    <td class="col-30">Select Image: </td>
                    <td class="col-70">
                        <input type="file" name="img">
                    </td>
                </tr>
            </table>
            <div class="action-submit">
                <input type="submit" name="submit" value="Add category" class="btn-admin btn-secondary">
            </div>
        </form>
        <?php
        if(isset($_POST['submit'])) {
            if(empty($_POST['category_name'])) {
                $_SESSION['category_name'] = "<h2 class='error'>Enter The Category Name!</h2>";
                header('location:add-category-product.php');
                exit();
            }

            if(empty($_FILES['img']['name'])) {
                $_SESSION['upload'] = "<h2 class='error'>Please select an image to upload</h2>";
                header('location:add-category-product.php');
                exit();
            }

            $category_name = $_POST['category_name'];

            // Image upload code
            $img = $_FILES['img']['name'];
            $ext = pathinfo($img, PATHINFO_EXTENSION);
            $img = "Product_Category_" . rand(0000,9999) . '.' . $ext;

            $source_path = $_FILES['img']['tmp_name'];
            $destination_path = "../img/category/" . $img;

            $upload = move_uploaded_file($source_path, $destination_path);
            if(!$upload) {
                $_SESSION['upload'] = "<h2 class='error'>Failed To Upload Image</h2>";
                header('location:add-category.php');
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
    </div>

    <div class="list-table">
        <h2>Category</h2>
        <div class="wrapper">
            <table class="tbl-full text-center">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Category Name</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sn = 1;
                    if($result2 && mysqli_num_rows($result2) > 0) {
                        while($row = mysqli_fetch_assoc($result2)) {
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $row['category_name']; ?></td>
                                <td style="width: 100px">
                                    <?php if($row['img'] != "") { ?>
                                        <img src="../img/category/<?php echo $row['img']; ?>">
                                    <?php } else {
                                        echo "<div class='error'>Image not Added</div>";
                                    } ?>
                                </td>
                                <td>
                                    <a href="update-category-product.php" class="btn-admin btn-secondary">Update Category</a>
                                    <a href="delete-category-product.php" class="btn-admin btn-danger">Delete Category</a>
                                </td>
                            </tr>
                            <?php
                        }
                    } else {
                        echo "<tr><td colspan='4'>No categories found</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
<?php include('parties/footer.php') ?>
