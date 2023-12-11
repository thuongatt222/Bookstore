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
        include_once 'model/tg-model.php';
        include_once 'view/tacgia/tg-show.php';
        break;
    case 'add':
        //Hiển thị danh sách các
        include_once 'view/tacgia/tg-add.php';
        break;
    case 'edit':
        include_once 'model/tg-model.php';
        include_once 'view/tacgia/tg-edit.php';
        break;
    case 'update':
        include_once 'model/tg-model.php';
        if($check == 0){
            echo '<script>   
                    location.href = "index.php?controller=tacgia";
                </script>';
        }elseif($check == 1){
            echo '<script>
                    location.href = "index.php?controller=tacgia";
                </script>';
        }
        break;
    case 'create':
        include_once 'model/tg-model.php';
        break;
    case 'destroy':
        include_once 'model/tg-model.php';
        echo '<script>  
                    location.href = "index.php?controller=tacgia";
                </script>';
        break;
    case 'store':
        include_once 'model/tg-model.php';
        if($check == 0){
            echo '<script>   
                    location.href = "index.php?controller=tacgia";
                </script>';
        }elseif($check == 1){
            echo '<script>
                    location.href = "index.php?controller=tacgia&action=add";
                </script>';
        }
        break;
}