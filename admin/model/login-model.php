<?php
    function loginAdmin(){
        $username = $_POST['username'];
        $password = $_POST['password'];
        include_once 'connect/openConnect.php';
        $sql = "SELECT * FROM employee";
        $users = mysqli_query($connect, $sql);
        include_once 'connect/closeConnect.php';
        foreach($users as $user){
            if($_POST['username'] == $user['username'] && $_POST['password'] == $user['password']){
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            return 1;
        }elseif($_POST['username'] == $user['email'] && $_POST['password'] == $user['password']){
            $_SESSION['username'] = $_POST['username'];
            $_SESSION['password'] = $_POST['password'];
            return 1;
        }
        else{
            return 0;
        }
    }
        
    }

    switch ($action){
        case 'loginAccess':
            $test = loginAdmin();
            break;
        case 'logout':
            session_destroy();
            break;
    }
?>