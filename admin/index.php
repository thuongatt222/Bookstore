<?php
session_start();
include_once "view/layout/header.php";
include_once "view/layout/navbar.php";
include_once "view/layout/search.php";

//lấy controller đang làm việc
$controller = '';
if (isset($_GET['controller'])){
    $controller = $_GET['controller'];
}

//Kiểm tra đó là controller nào
switch ($controller){
    case '':
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            include_once "view/index.php";
        }else{
            echo '<script>   
            location.href = "index.php?controller=login&action=login";
            </script>';
        }
        break;
    case 'login':
        include_once 'controller/login-controller.php';
        break;
    case 'tk':
        include_once "view/layout/acc-set.php";
        break;
    case 'tacgia':
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            include_once "controller/tg-control.php";
        }else{
            echo '<script>   
            location.href = "index.php?controller=login&action=login";
            </script>';
        }
        break;
    case 'theloai':
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            include_once "controller/tl-control.php";
        }else{
            echo '<script>   
            location.href = "index.php?controller=login&action=login";
            </script>';
        }
        break;
    case 'nv':
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            include_once "controller/nv-control.php";
        }else{
            echo '<script>   
            location.href = "index.php?controller=login&action=login";
            </script>';
        }
        break;
    case 'kh':
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            include_once "controller/kh-control.php";
        }else{
            echo '<script>   
            location.href = "index.php?controller=login&action=login";
            </script>';
        }
        break;
    case 'hoadon':
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            include_once "controller/hoadon-control.php";
        }else{
            echo '<script>   
            location.href = "index.php?controller=login&action=login";
            </script>';
        }
        break;
    case 'nxb':
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            include_once "controller/nxb-control.php";
        }else{
            echo '<script>   
            location.href = "index.php?controller=login&action=login";
            </script>';
        }
        break;
    case 'pttt':
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            include_once "controller/pttt-control.php";
        }else{
            echo '<script>   
            location.href = "index.php?controller=login&action=login";
            </script>';
        }
        break;
    case 'ptvc':
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            include_once "controller/ptvc-control.php";
        }else{
            echo '<script>   
            location.href = "index.php?controller=login&action=login";
            </script>';
        }
        break;
    case 'sp':
        if(isset($_SESSION['username']) && isset($_SESSION['password'])){
            include_once "controller/sp-control.php";
        }else{
            echo '<script>   
            location.href = "index.php?controller=login&action=login";
            </script>';
        }
        break;
    default:
        include_once "view/hoadon/hoadon-show.php";
        break;
}

include_once "view/layout/footer.php";