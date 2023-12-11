<?php
function add_to_cart()
{
    //        Lấy được id của sản phẩm vừa được thêm vào
    $product_id = $_GET['id'];
    //        Lưu lên session id sản phầm và số lượng mặc định là 1
    //        Kiểm tra xem giỏ hàng đã tồn tại hay chưa
    if (isset($_SESSION['cart'])) {
        if (isset($_SESSION['cart'][$product_id])) {
            $_SESSION['cart'][$product_id]++;
        } else {
            $_SESSION['cart'][$product_id] = 1;
        }
    } else {
        $_SESSION['cart'] = array();
        $_SESSION['cart'][$product_id] = 1;
    }
}
function view_cart()
{
    include_once 'connect/openConnect.php';
    $cart = array();
    $infor = array();
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product_id => $amount) {
            //                Lấy tên sp và giá theo product_id
            $sql = "SELECT * FROM product WHERE id_product = '$product_id'";
            $products = mysqli_query($connect, $sql);
            foreach ($products as $product) {
                $cart[$product_id]['image'] = $product['image'];
                $cart[$product_id]['product_name'] = $product['product_name'];
                $cart[$product_id]['price'] = $product['price_product'];
                $cart[$product_id]['amount'] = $amount;
                $total += $product['price_product'] * $amount;
            }
        }
    }
    include_once 'connect/closeConnect.php';
    $infor['cart'] = $cart;
    $infor['total'] = $total;
    return $infor;
}
function update()
{
    //Lấy product_id và amount
    $infor = $_POST['amount'];
    foreach ($infor as $product_id => $value) {
        if ($value <= 0) {
            $message = "Số lượng không đúng!";
            echo "<script>alert('$message');</script>";
            return 1;
        } else {
            $_SESSION['cart'][$product_id] = $value;
            if (isset($value)) {
                foreach ($infor as $product_id => $value) {
                    $_SESSION['cart'][$product_id] = $value;
                }
            } else {
                return 0;
            }
        }
    }
}
function delete_product_in_order()
{
    $product_id = $_GET['id'];
    unset($_SESSION['cart'][$product_id]);
}
function delete_cart(){
    unset($_SESSION['cart']);
}
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
switch ($action) {
    case 'add':
        add_to_cart();
        break;
    case '':
        $infor = view_cart();
        break;
    case 'update':
        $check = update();
        break;
    case 'delete-product-in-cart':
        delete_product_in_order();
        break;
    case 'delete_cart':
        delete_cart();
        break;
}
