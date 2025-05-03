<?php

function check_product_errors () {
    if (isset($_SESSION['delete_product_success'])) {
        echo $_SESSION['delete_product_success'];
        unset($_SESSION['delete_product_success']);
    }
    else if (isset($_SESSION['update_product'])) {
        echo $_SESSION['update_product'];
        unset($_SESSION['update_product']);
    }
        
}