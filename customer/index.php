<?php
session_start();
if(isset($_SESSION['username']) && isset($_SESSION['password'])){
    include_once "view/layout/header2.php";
}else{
    include_once "view/layout/header1.php";
}


//lấy controller đang làm việc
$controller = '';
if (isset($_GET['controller'])){
    $controller = $_GET['controller'];
}

//Kiểm tra đó là controller nào
switch ($controller){
    case '':
        include_once "controller/main-controller.php";
        break;
    case 'login':
        include_once 'controller/login-controller.php';
        break;
    case 'infor':
        include_once 'controller/infor-controller.php';
        break;
    case 'shop-grid':
        include_once "controller/shop-grid-controller.php";
        break;
    case 'check-out':
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            include_once "controller/check-out-controller.php";
        }else{
            echo '<script>   
            location.href = "index.php?controller=login&action=login";
            </script>';
        }
        break;
    case 'show-bill':
        break;
    case 'shop-cart':
        include_once "controller/shop-cart-controller.php";
        break;
    case 'shop-details':
        include_once "controller/shop-detail-controller.php";
        break;
    default:
        include_once "view/main.php";
        break;
}

include_once "view/layout/footer.php";

