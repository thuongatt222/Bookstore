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
        include_once 'model/hoadon-model.php';
            include_once 'view/hoadon/hoadon-show.php';
        break;
    case 'hdct':
        //Hiển thị danh sách các
        include_once 'view/hoadon/hoadonchitet-add.php';
        break;
    case 'update':
        include_once 'model/hoadon-model.php';
        if($check == 0){
            echo '<script>
                    location.href = "index.php?controller=hoadon";
                </script>';
        }elseif($check == 1){
            echo '<script>
                    location.href = "index.php?controller=hoadon";
                </script>';
        }
        break;
    case 'details':
        include_once 'model/hoadon-model.php';
        include_once 'view/hoadon/hoadonchitiet.php';
        break;
    case 'edit':
        //Hiển thị danh sách các
        include_once 'model/hoadon-model.php';
        include_once 'view/hoadon/hoadon-edit.php';
        break;

    case 'information':
        include_once 'model/hoadon-model.php';
        include_once 'view/hoadon/hoadon-add.php';
        break;

    case 'hd-sp-ct':
        include_once 'model/hoadon-model.php';
        include_once 'view/hoadon/hd-sp-add.php';
        break;
    case 'add-to-cart':
        include_once 'model/hoadon-model.php';
        echo '<script>
        location.href = "index.php?controller=hoadon&action=information";
        </script>';
        break;
    case 'delete-product-in-cart':
        include_once 'model/hoadon-model.php';
        echo '<script>
        location.href = "index.php?controller=hoadon&action=information";
        </script>';
        break;
    case 'delete-cart':
        include_once 'model/hoadon-model.php';
        echo '<script>
        location.href = "index.php?controller=hoadon";
        </script>';
        break;
    case 'change-amount':
        include_once 'model/hoadon-model.php';
        include_once 'view/hoadon/show-sp-add.php';
        break;
    case 'update-cart':
        include_once 'model/hoadon-model.php';
        if ($check == 1){
            echo '<script>
            location.href = "index.php?controller=hoadon&action=change-amount";
            </script>';
        }elseif($check == 0){
            echo '<script>
        location.href = "index.php?controller=hoadon&action=information";
        </script>';
        }
        break;
    case 'add-order-db':
        include_once 'model/hoadon-model.php';
        echo '<script>
        location.href = "index.php?controller=hoadon";
        </script>';
        break;

}