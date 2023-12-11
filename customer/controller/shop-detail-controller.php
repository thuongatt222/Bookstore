<?php

//Lấy hành động đang thực hiện
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

//Kiểm tra hành động đang thực hiện
switch ($action) {
    case 'detail':
        //Hiển thị danh sách các
        include_once 'model/shop-details.php';
        include_once 'view/shop_details/shop-details.php';
        break;
}