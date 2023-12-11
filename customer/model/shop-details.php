<?php
function index(){
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM product WHERE id_product = '$id'";
    $product = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    return $product;
}
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
switch ($action) {
    case 'detail':
        //lấy dữ liệu từ db
        $product =index();
        break;
    }