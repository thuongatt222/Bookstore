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
        include_once 'model/sp-model.php';
        include_once 'view/sp/sp-show.php';
        break;
    case 'add':
        //Hiển thị danh sách các
        include_once 'model/sp-model.php';
        include_once 'view/sp/sp-add.php';
        break;
    case 'edit':
        //Hiển thị danh sách các
        include_once 'model/sp-model.php';
        include_once 'view/sp/sp-edit.php';
        break;
    case 'update':
        include_once 'model/sp-model.php';
        if($check == 0){
            echo '<script>
                    location.href = "index.php?controller=sp";
                </script>';
        }elseif($check == 1){
            echo '<script>
                    location.href = "index.php?controller=sp&action=edit";
                </script>';
        }
        break;
    case 'create':
        include_once 'model/sp-model.php';
        break;
    case 'store':
        include_once 'model/sp-model.php';
        if($test == 0){
            echo '<script>
                    location.href = "index.php?controller=sp";
                </script>';
        }elseif($test == 1){
            echo '<script>
                    location.href = "index.php?controller=sp&action=add";
                </script>';
        }
        break;
    case 'destroy':
        include_once 'model/sp-model.php';
        echo '<script>
        location.href = "index.php?controller=sp";
            </script>';
        break;
    case 'detail':
        include_once 'model/sp-model.php';
        include_once 'view/sp/sp-detail.php';
        break;
        
}