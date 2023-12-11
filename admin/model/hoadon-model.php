<?php
//function lấy dữ liệu từ db
function index()
{
    $check = 0;
    $search = '';
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
    }
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    include_once 'connect/openConnect.php';
    $sqlCount = "SELECT COUNT(*) AS count_record FROM bill WHERE status LIKE '%$search%'";
    //    $sql1 = "SELECT * FROM customer";
    //    $sqlCount = "SELECT count(name_customer) FROM customer WHERE name_customer = '$search'";

    $counts = mysqli_query($connect, $sqlCount);

    foreach ($counts as $each) {
        $countRecord = $each['count_record'];
    }
    $recordOnePage = 5;
    $countPage = ceil($countRecord / $recordOnePage);
    $start = ($page - 1) * $recordOnePage;
    $end = 5;
    $sql = "SELECT bill.*, employee.name_employee, customer.name_customer, customer.address, customer.phone_number, payment.name_payment, shipping.name_shipping FROM bill INNER JOIN employee ON bill.id_employee = employee.id_employee INNER JOIN customer ON bill.id_customer = customer.id_customer INNER JOIN payment ON bill.id_payment = payment.id_payment INNER JOIN shipping ON bill.id_shipping = shipping.id_shipping WHERE status LIKE '%$search%' LIMIT $start, $end";
    $bill = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    $array = array();
    $array['search'] = $search;
    $array['infor'] = $bill;
    $array['page'] = $countPage;
    $array['check'] = $check;
    return $array;
}

function details()
{
    $id_bill = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sqlproduct = "SELECT bill_detail.*, bill.*, product.*, author.* FROM bill_detail 
    INNER JOIN bill ON bill_detail.id_bill = bill.id_bill 
    INNER JOIN product ON bill_detail.id_product = product.id_product 
    INNER JOIN author ON product.id_author = author.id_author WHERE bill.id_bill = '$id_bill' LIMIT 0, 25";
    $products = mysqli_query($connect, $sqlproduct);
    $sqlcustomer = "SELECT bill.*, payment.*, shipping.*, customer.* FROM bill
    INNER JOIN payment ON bill.id_payment = payment.id_payment 
    INNER JOIN shipping ON bill.id_shipping = shipping.id_shipping 
    INNER JOIN customer ON bill.id_customer = customer.id_customer
    WHERE bill.id_bill = '$id_bill'";
    $customer = mysqli_query($connect, $sqlcustomer);
    $sqlemployee = "SELECT  bill.*, employee.* FROM bill
    INNER JOIN employee ON bill.id_employee = employee.id_employee
    WHERE bill.id_bill = '$id_bill'";
    $employee = mysqli_query($connect, $sqlemployee);
    include_once 'connect/closeConnect.php';
    $bill = array();
    $bill['product'] = $products;
    $bill['customer'] = $customer;
    $bill['employee'] = $employee;
    return $bill;
}

function update()
{
    $status = $_POST['status'];
    $id_bill = $_POST['id_bill'];
    include_once 'connect/openConnect.php';
    $sqls = "SELECT * FROM bill WHERE id_bill = '$id_bill'";
    $checks = mysqli_query($connect, $sqls);
    foreach ($checks as $check) {
        if ($check['status'] == 4) {
            $message = "Đơn hàng đã hủy!";
            echo "<script>alert('$message');</script>";
            return 1;
        } elseif ($check['status'] == 3) {
            $message = "Đơn hàng đã hoàn thành!";
            echo "<script>alert('$message');</script>";
            return 1;
        } elseif ($status < $check['status']) {
            $message = "Đơn hàng không thể chuyển hổi trạng thái này!";
            echo "<script>alert('$message');</script>";
            return 1;
        } elseif ($status > $check['status']) {
            $sql = "UPDATE `bill` SET `status`='$status' WHERE id_bill = '$id_bill'";
            mysqli_query($connect, $sql);
            $message = "Đơn hàng cập nhật thành công!";
            echo "<script>alert('$message');</script>";
            return 0;
        }
    }
    include_once 'connect/closeConnect.php';
}

function information()
{
    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM customer";
    $customer = mysqli_query($connect, $sql);
    $sqlship = "SELECT * FROM shipping";
    $shipping = mysqli_query($connect, $sqlship);
    $sqlpay = "SELECT * FROM payment";
    $payment = mysqli_query($connect, $sqlpay);
    $sqlemp = "SELECT * FROM employee";
    $employee = mysqli_query($connect, $sqlemp);

    $cart = array();
    $infor = array();
    $total = 0;
    if (isset($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $product_id => $amount) {
            //                Lấy tên sp và giá theo product_id
            $sql = "SELECT * FROM product WHERE id_product = '$product_id'";
            $products = mysqli_query($connect, $sql);
            foreach ($products as $product) {
                $cart[$product_id]['id_product'] = $product['id_product'];
                $cart[$product_id]['image'] = $product['image'];
                $cart[$product_id]['product_name'] = $product['product_name'];
                $cart[$product_id]['price'] = $product['price_product'];
                $cart[$product_id]['amount'] = $amount;
                $total += $product['price_product'] * $amount;
            }
        }
    }

    include_once 'connect/closeConnect.php';
    $infor = array();
    $infor['customer'] = $customer;
    $infor['shipping'] = $shipping;
    $infor['payment'] = $payment;
    $infor['employee'] = $employee;
    $infor['cart'] = $cart;
    $infor['total'] = $total;
    return $infor;
}

function showProduct()
{
    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM product";
    $product = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    return $product;
}

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

function delete_product_in_order()
{
    $product_id = $_GET['id'];
    unset($_SESSION['cart'][$product_id]);
}

function delete_cart()
{
    unset($_SESSION['cart']);
}

function update_cart()
{   //Lấy product_id và amount
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


function add_order_to_db()
{   if(isset($_SESSION['cart'])){
    $id_customer = $_POST['id_customer'];
    $date_buy = date('Y-m-d');
    $id_payment = $_POST['id_payment'];
    $id_shipping = $_POST['id_shipping'];
    $id_employee = $_POST['id_employee'];
    $total = $_POST['total'];
    $status = 0;

    include_once 'connect/openConnect.php';
    $sqlOrder = "INSERT INTO `bill`(`id_employee`, `id_customer`, `id_payment`, `id_shipping`, `purchase_date`, `status`, `total`) VALUES ('$id_employee','$id_customer','$id_payment','$id_shipping','$date_buy','$status','$total')";
    mysqli_query($connect, $sqlOrder);
    $orderID = mysqli_insert_id($connect); // Lấy id_bill vừa được thêm vào
    $sqlOrderID = "SELECT MAX(id_bill) as order_id FROM bill WHERE id_customer = '$id_customer'";
    $orderIDs = mysqli_query($connect, $sqlOrderID);
    foreach ($orderIDs as $value) {
        $orderID = $value['order_id'];
    }
    foreach ($_SESSION['cart'] as $id_product => $amount) {
        $sqlPriceProduct = "SELECT price_product FROM product WHERE id_product = '$id_product'";
        $priceProduct = mysqli_query($connect, $sqlPriceProduct);
        foreach ($priceProduct as $each) {
            $price = $each['price_product'];
        }
        $sql = "INSERT INTO `bill_detail`(`id_bill`, `id_product`, `amount`, `price`) VALUES ('$orderID','$id_product','$amount','$price')";
        mysqli_query($connect, $sql);
    }
    include_once 'connect/closeConnect.php';
    unset($_SESSION['cart']);
}elseif(!isset($_SESSION['cart'])){
    $message = "Chưa có sản phẩm!";
            echo "<script>alert('$message');</script>";
}
}


//Lấy hành động đang thực hiện
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

switch ($action) {
    case '':
        //lấy dữ liệu từ db
        $array = index();
        break;
    case 'edit':
        $bill = details();
        break;
    case 'update':
        $check = update();
        break;
    case 'details':
        $bill = details();
        break;
    case 'update-cart':
        $check = update_cart();
        break;
    case 'information':
        $infor = information();
        break;
    case 'hd-sp-ct':
        $product = showProduct();
        break;
    case 'change-amount':
        $infor = information();
        break;
    case 'add-to-cart':
        add_to_cart();
        break;
    case 'delete-product-in-cart':
        delete_product_in_order();
        break;
    case 'delete-cart':
        delete_cart();
        break;
    case 'add-order-db':
        add_order_to_db();
        break;
}
