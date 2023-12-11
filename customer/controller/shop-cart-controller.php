<?php
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

//Kiểm tra hành động đang thực hiện
switch ($action) {
    case '':
        include_once 'model/shop-cart.php';
        include_once 'view/shopping_cart/shopping-cart.php';
        break;
    case 'add':
        include_once 'model/shop-cart.php';
        echo '<script>
        location.href = "index.php?controller=shop-cart&action=";
        </script>';
        break;
    case 'update':
        include_once 'model/shop-cart.php';
        if ($check == 1) {
            echo '<script>
            location.href = "index.php?controller=shop-cart&action=";
            </script>';
        } elseif ($check == 0) {
            echo '<script>
        location.href = "index.php?controller=shop-cart&action=";
        </script>';
        }
        break;
    case 'add-to-db':
        include_once 'model/shop-cart.php';
        echo '<script>
        location.href = "index.php?controller=shop-cart&action=";
        </script>';
        break;
    case 'delete-product-in-cart':
        include_once 'model/shop-cart.php';
        echo '<script>
        location.href = "index.php?controller=shop-cart&action=";
        </script>';
        break;
    case 'delete_cart':
        include_once 'model/productModel.php';
        header('Location:index.php?controller=product&action=view_cart');
        break;
}
