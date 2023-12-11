<?php
$action = '';
if (isset($_GET['action'])) {
    $action = $_GET['action'];
}
switch ($action) {
    case '':
        echo '<script>   
                    location.href = "view/login.php";
                </script>';
    case 'login':
        if (isset($_SESSION['username'])&& isset($_SESSION['password'])) {
            echo '<script>   
                    location.href = "index.php?controller=hoadon";
                </script>';
        } else {
            //            Hiển thị form đăng nhập
            echo '<script>   
                    location.href = "view/login.php";
                </script>';
        }
        break;
    case 'loginAccess':
        //            Lấy dữ liệu login trên db
        include_once 'model/login-model.php';
        if ($test == 0) {
            //                Login sai
            echo '<script>   
                location.href = "index.php?controller=login&action=login";
                </script>';
        } elseif ($test == 1) {
            echo '<script>   
                    location.href = "index.php?controller=hoadon";
                </script>';
        }
        break;
    case 'logout':
        //            Xóa bỏ session
        include_once 'model/login-model.php';
        //            quay về form đăng nhập
        echo '<script>   
                location.href = "index.php?controller=login&action=login";
                </script>';
        break;
}
