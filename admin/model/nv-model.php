<?php
//function lấy dữ liệu từ db
function index(){
    $search = '';
    if (isset($_POST['search'])) {
        $search = $_POST['search'];
    }
    $page = 1;
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    }
    include_once 'connect/openConnect.php';
    $sqlCount = "SELECT COUNT(*) AS count_record FROM employee WHERE name_employee LIKE '%$search%'";
    $counts = mysqli_query($connect, $sqlCount);
    foreach ($counts as $each) {
        $countRecord = $each['count_record'];
    }
    $recordOnePage = 5;
    $countPage = ceil($countRecord / $recordOnePage);
    $start = ($page - 1) * $recordOnePage;
    $end = 5;
    $sql = "SELECT * FROM employee WHERE name_employee LIKE '%$search%' LIMIT $start, $end";
    $employee = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    $array = array();
    $array['search'] = $search;
    $array['infor'] = $employee;
    $array['page'] = $countPage;
    return $array;
}
function edit(){
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM employee WHERE id_employee = '$id'";
    $NV = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    return $NV;
}
function update(){
    $id = $_POST['id'];
    $name = $_POST['name_nv'];
    $username = $_POST['user_nv'];
    $password = $_POST['pass_nv'];
    $email = $_POST['email_nv'];
    $phone = $_POST['phone_nv'];
    include_once 'connect/openConnect.php';
    $sql_check = "SELECT id_employee FROM employee WHERE email = '$email'";
    $query_check = mysqli_query($connect, $sql_check);
    if (mysqli_num_rows($query_check) >= 1) {
        // Nhân viên đã tồn tại
        $message = "Tài khoản đã tồn tại, Vui lòng sửa lại!";
        echo "<script>alert('$message');</script>";
        return 1;
    } else {
        // thêm 1 nhân viên
        $sql = "UPDATE employee SET name_employee = '$name',username = '$username',password = '$password',email = '$email',phone_number = '$phone' WHERE id_employee = '$id'";
        mysqli_query($connect, $sql);
        $message = "Sửa tài khoản thành công";
        echo "<script>alert('$message');</script>";
        return 0;
    }
    include_once 'connect/closeConnect.php';
}

//function lưu dữ liệu lên db
function store(){
    $name = $_POST['name_nv'];
    $username = $_POST['user_nv'];
    $password = $_POST['pass_nv'];
    $email = $_POST['email_nv'];
    $phone = $_POST['phone_nv'];
    include_once 'connect/openConnect.php';
    $sql_check = "SELECT id_employee FROM employee WHERE email = '$email'";
    $query_check = mysqli_query($connect, $sql_check);
    if (mysqli_num_rows($query_check) > 0) {
        // Product already exists
        $message = "Tài khoản đã tồn tại, Vui lòng sửa lại!";
        echo "<script>alert('$message');</script>";
        return 1;
    } else {
        // thêm 1 nhân viên
        $sql = "INSERT INTO employee(name_employee,username,password,email,phone_number) VALUES ('$name','$username','$password','$email','$phone')";
        mysqli_query($connect, $sql);
        $message = "Thêm tài khoản thành công";
        echo "<script>alert('$message');</script>";
        return 0;
        echo "<script>alert('$message');</script>";
    }
    include_once 'connect/closeConnect.php';
}

function destroy(){
    $id = $_GET['id'];
    include_once 'connect/openConnect.php';
    $sql = "DELETE FROM employee WHERE id_employee = '$id'";
    mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    echo 'Xóa thành công phương thức';
}

//Lấy hành động đang thực hiện
$action = '';
if (isset($_GET['action'])){
    $action= $_GET['action'];
}

switch ($action){
    case '':
        //lấy dữ liệu từ db
        $array = index();
        break;
    case 'store':
        //lưu dữ liệu lên db
        $check = store();
        break;
    case 'edit':
        //Lấy dữ liệu từ DB về dựa trên id
        $NV = edit();
        break;
    case 'update':
        //chỉnh sửa dữ liệu lên db
        $check = update();
        break;
    case 'destroy':
        //xóa dữ liệu trên db
        destroy();
        break;
}