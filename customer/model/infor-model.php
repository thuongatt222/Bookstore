<?php
function information()
{
    $id = $_SESSION['id_customer'];
    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM customer WHERE id_customer = '$id'";
    $users = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    return $users;
}
function update()
{   
    $id = $_SESSION['id_customer'];
    $password = $_POST['password'];
    $re_password = $_POST['re-password'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    include_once 'connect/openConnect.php';
    if ($password != $re_password) {
        $message = "Không đúng mật khẩu, Vui lòng sửa lại!";
        echo "<script>alert('$message');</script>";
        return 1;
    } else {
        $sql = "UPDATE `customer` SET `password`='$password',`phone_number`='$phone',`address`='$address' WHERE id_customer = $id";
        mysqli_query($connect, $sql);
        return 0;
    }
    include_once 'connect/closeConnect.php';
}
switch ($action) {
    case '':
        $KH = information();
        break;
    case 'set':
        $KH = information();
        break;
    case 'update':
        $test = update();
        break;
}
