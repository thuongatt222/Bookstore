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
        include_once 'model/nv-model.php';
        include_once 'view/nv/nv-show.php';
        break;
    case 'add':
        //Hiển thị danh sách các
        include_once 'view/nv/nv-add.php';
        break;
    case 'edit':
        include_once 'model/nv-model.php';
        include_once 'view/nv/nv-edit.php';
        break;
    case 'update':
        include_once 'model/nv-model.php';
        if($check == 0){
            echo '<script>   
                    location.href = "index.php?controller=nv";
                </script>';
        }elseif($check == 1){
            echo '<script>
                    location.href = "index.php?controller=nv";
                </script>';
        }
        break;
    case 'create':
        include_once 'model/nv-model.php';
        break;
    case 'destroy':
        include_once 'model/nv-model.php';
        echo '<script>  
                    location.href = "index.php?controller=nv";
                </script>';
        break;
    case 'store':
        include_once 'model/nv-model.php';
        if($check == 0){
            echo '<script>   
                    location.href = "index.php?controller=nv";
                </script>';
        }elseif($check == 1){
            echo '<script>
                    location.href = "index.php?controller=nv&action=add";
                </script>';
        }
        break;
}