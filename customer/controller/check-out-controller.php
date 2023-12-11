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
        include_once 'model/check-out-model.php';
        include_once 'view/check_out/checkout.php';
        break;
    case 'add-to-db':
        include_once 'model/check-out-model.php';
        echo '<script>   
                    location.href = "index.php?controller=check-out&action=history";
                </script>';
        break;
    case 'history':
        include_once 'model/check-out-model.php';
        include_once 'view/layout/history.php';
        break;
    case 'history-details':
        include_once 'model/check-out-model.php';
        include_once 'view/layout/history-details.php';
        break;
    case 'delete-bill':
        include_once 'model/check-out-model.php';echo $check;
        if ($check == 1) {
            echo '<script>   
                                location.href = "index.php?controller=check-out&action=history";
                            </script>';
        } elseif ($check == 0) {
            echo '<script>   
                    location.href = "index.php?controller=check-out&action=history";
                </script>';
        }
        break;
}
