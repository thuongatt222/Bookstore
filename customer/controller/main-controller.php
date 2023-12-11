<?php


//Lấy hành động đang thực hiện
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}

//Kiểm tra hành động đang thực hiện
switch ($action) {
    case '':
        //Hiển thị danh sách các
        include_once 'model/main-model.php';
        include_once 'view/main.php';
        break;
    case 'findtl':
        include_once 'model/main-model.php';
        include_once 'view/main.php';
        break;
    default:
        include_once 'view/main.php';
        break;
}