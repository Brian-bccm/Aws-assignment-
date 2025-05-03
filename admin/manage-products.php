<?php
include('parties/nav.php');
require_once 'product/product-view.php';
$sql1 = "SELECT p.product_id,
        p.product_name, 
        p.product_description, 
        p.product_price,
        p.product_img,
        c.category_name,
        c.img
        FROM tbl_product AS p
        JOIN tbl_category_product AS c
        ON p.product_category = c.id
        ORDER BY id ASC";
$result1 = mysqli_query($conn,$sql1);
?>

<!-- Main Content Section Starts -->
<main>
    <h1>MANAGE PRODUCT</h1>
        <!-- Button to add admin -->
        <div class="action text-center">
            <div class="wrapper">
                <div class="action-list">
                    <?php
                    if(isset($_SESSION['add-product']))
                    {
                        echo $_SESSION['add-product'];
                        unset($_SESSION['add-product']);
                    }
                    check_product_errors();
                    ?>
                    <div class="action-text">
                        <h1>Add Product</h1>
                    </div>
                    <div class="action-btn">
                        <a href="add-product.php" class="btn-admin btn-primary">Add</a>
                    </div>
                </div>
            </div>
            <div class="wrapper">
                <div class="action-list">
                    <?php
                    if(isset($_SESSION['add-category-product']))
                    {
                        echo $_SESSION['add-category-product'];
                        unset($_SESSION['add-category-product']);
                    }
                    ?>
                    <div class="action-text">
                        <h1>Category Information</h1>
                    </div>
                    <div class="action-btn">
                        <a href="add-category-product.php" class="btn-admin btn-primary">Add</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="list-table">
            <h2>Products</h2>
            <div class="wrapper">
            <table class="tbl-full text-center">
                <thead>
                    <tr>
                        <th>S.N.</th>
                        <th>Category</th>
                        <th>Product Name</th>
                        <th>Description</th>
                        <th>Price</th>
                        <th>IMG</th>
                        <th>Action</th>
                    </tr> 
                </thead>
                <tbody>
                    <?php
                    $sn = 1;
                    if($result1 == TRUE)
                    {
                        while($row = mysqli_fetch_assoc($result1))
                        {
                            ?>
                            <tr>
                                <td><?php echo $sn++; ?></td>
                                <td><?php echo $row['category_name']; ?></td>
                                <td><?php echo $row['product_name']; ?></td>
                                <td width="20%"><?php echo $row['product_description']; ?></td>
                                <td><?php echo $row['product_price']; ?></td>
                                <td style="width: 100px">
                                    <img src="../img/product/<?php echo $row['product_img']; ?>">
                                </td>
                                <td>
                                    <a href="update-product.php?id=<?php echo $row['product_id']; ?>" class="btn-admin btn-secondary">Update</a> 
                                    <a href="product/delete-product.php?id=<?php echo $row['product_id']; ?>" class="btn-admin btn-danger">Delete</a>
                                </td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
            </div>
        </div>
</main>
<!-- Main Content Section Ends -->

<?php include('parties/footer.php') ?>