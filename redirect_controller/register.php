<?php 
    include '../model/user.php';
    session_start();
    
    $first_name = $_POST["first_name"];
    $second_name = $_POST["second_name"];
    $login = $_POST["login"];
    $password = $_POST["password"];
    $repeat_password = $_POST["repeat_passwrod"];

    $result = mysqli_query($connection, $FIND_USER_BY_CREDENTIALS_QUERY);
        $productArray = array();

      if(mysqli_num_rows($result) > 0) {
        header("Location: ../pages/error/error_user_exist.html");
      }

    $CREATE_USER_QUERY = "INSERT INTO user SET 
    first_name = '$first_name', second_name = '$second_name',
    login = '$login', password = '$password',
    blocked = 0, role_id = 2;";

    $connection = mysqli_connect('127.0.0.1', 'dima_bekker', 'ADMINthebest321', 'dimabekker131');
    if($connection == false) {
      echo "error";
    }

    $result = mysqli_query($connection, $CREATE_USER_QUERY);

    $role_id = 2;
        
        $_SESSION["user_role"] = $role_id;
        header("Location: ../index.php");
        exit();
?>