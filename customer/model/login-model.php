<?php
function loginAdmin()
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    include_once 'connect/openConnect.php';
    $sql = "SELECT * FROM customer WHERE username = '$username' AND password = '$password'";
    $users = mysqli_query($connect, $sql);
    include_once 'connect/closeConnect.php';
    foreach ($users as $user) {
        if ($_POST['username'] == $user['username'] && $_POST['password'] == $user['password']) {
            $_SESSION['id_customer'] = $user['id_customer'];
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            return 1;
        }elseif($_POST['username'] == $user['email'] && $_POST['password'] == $user['password']){
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            return 1;
        } else {
            return 0;
        }
    }
}
function register()
{
    $username = $_POST['username'];
    $password = $_POST['password'];
    $re_password = $_POST['re-password'];
    $email = $_POST['email'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    include_once 'connect/openConnect.php';
    $sqlcus = "SELECT * FROM customer";
    $users = mysqli_query($connect, $sqlcus);
    foreach ($users as $user) {
        if ($username == $user['username']) {
            $message = "username đã tồn tại, vui lòng sửa lại!";
            echo "<script>alert('$message');</script>";
            return 1;
        } elseif ($email == $user['email']) {
            $message = "Email đã tồn tại, Vui lòng sửa lại!";
            echo "<script>alert('$message');</script>";
            return 2;
        } elseif ($password != $re_password) {
            $message = "Không đúng mật khẩu, Vui lòng sửa lại!";
            echo "<script>alert('$message');</script>";
            return 3;
        } else {
            $sql = "INSERT INTO customer (name_customer,username,password,email,phone_number,address) VALUES ('$name','$username','$password','$email','$phone','$address')";
            mysqli_query($connect, $sql);
            $message = "Tạo tài khoản thành công!";
            echo "<script>alert('$message');</script>";
            return 0;
        }
    }
    include_once 'connect/closeConnect.php';
}
switch ($action) {
    case 'registerAccess':
        $check = register();
        break;
    case 'loginAccess':
        $test = loginAdmin();
        break;
    case 'logout':
        session_unset();
        break;
}
