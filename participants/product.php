<!DOCTYPE html>
<html>
<?php include("parties/navbar.php"); ?>

<head>
    <title>Product Page</title>
    <link rel="stylesheet" href="../css/style.css" />
    <style>
        /* Additional CSS styles if needed */
        .quantity {
            display: flex;
            align-items: center;
        }

        .quantity input {
            width: 50px;
            text-align: center;
        }

        .quantity button {
            width: 30px;
            height: 30px;
            background-color: #ddd;
            border: none;
            cursor: pointer;
        }

        body {
            font-family: Arial, sans-serif;
            margin: 0 auto;
            margin-top: 80px;
        }

        .product-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            grid-gap: 20px;
            margin-bottom: 3rem;
        }

        .product {
            border: 1px solid #ccc;
            border-radius: calc(2rem + 1.6rem);
            padding: 2rem;
            margin-top: 1.6rem;

            .product-img {
                aspect-ratio: 1/1;
                border-radius: 1.6rem;
                overflow: hidden;

                img {
                    width: 100%;
                    height: 100%;
                    object-fit: cover;
                }
            }
        }

        .product h2 {
            margin-top: 1rem;
        }

        .product p {
            margin-bottom: 10px;
        }

        .price {
            font-weight: bold;
            color: #1a73e8;
        }

        #total-price-container {
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 20px;
        }

        #total-price-display {
            font-size: 2rem;
            font-weight: bold;
            padding: 10px 20px;
            background-color: #f0f0f0;
            border-radius: 5px;
            margin-left: 10px;
        }

        .btn-add-to-cart {
            background-color: #1a73e8;
            color: white;
            border: none;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <?php
    include("../admin/db_connect.php");
    $sql1 = "SELECT * FROM tbl_category_product";
    $result1 = mysqli_query($conn, $sql1);
    while ($row = mysqli_fetch_assoc($result1)) {
        $category = $row['category_name'];
        ?>
        <h2><?php echo $category; ?></h2>
        <div class="product-container">
            <?php
            $sql2 = "SELECT * FROM tbl_product AS p JOIN tbl_category_product AS c ON p.product_category = c.id;";
            $result2 = mysqli_query($conn, $sql2);
            while ($row2 = mysqli_fetch_assoc($result2)) {
                if ($row2['category_name'] == $category) {
                    ?>
                    <div class="product">
                        <div class="product-img">
                            <img src="../img/product/<?php echo $row2['product_img'] ?>" width="200px" height="190px"
                                alt="product image">
                        </div>
                        <h2><?php echo $row2['product_id']; ?></h2>
                        <p class="info"><?php echo $row2['product_description']; ?></p>
                        <p class="price"><?php echo $row2['product_price']; ?></p>
                        <br>
                        <a href='cart.php?action=add&product_id=<?php echo $row2['product_id']; ?>' class="btn-add-to-cart">Add to
                            Cart</a>
                    </div>
                    <?php
                }
            }
            ?>
        </div>
        <?php
    }
    ?>
    </div>
    <br>

    <?php include("parties/footer.php"); ?>
</body>

</html>