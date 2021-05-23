<?php 
    include '../model/user.php';
    session_start();
    
    $login = $_POST["login"];
    $password = $_POST["password"];

    $FIND_USER_BY_CREDENTIALS_QUERY = "SELECT * FROM user WHERE login = '$login' AND password = '$password' LIMIT 1;";

    $connection = mysqli_connect('127.0.0.1', 'dima_bekker', 'ADMINthebest321', 'dimabekker131');
    if($connection == false) {
      echo "error";
    }

    $result = mysqli_query($connection, $FIND_USER_BY_CREDENTIALS_QUERY);
        $productArray = array();

        if(mysqli_num_rows($result) > 0) {
            for($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
                $user = new User(
                    $row[id], $row[first_name], 
                    $row[second_name], $row[login],
                    $row[password], $row[blocked],
                    $row[role_id]
                );
              }
              if (isUserAdmin($user)) {
                $_SESSION["user"] = $user;
                $_SESSION["user_role"] = $user->role_id;
                header("Location: ../pages/admin/admin_page.php");
                exit();
              }
        }else {
            header("Location: ../index.php");
            exit();
        }

        
        $_SESSION["user"] = $user;
        $_SESSION["user_role"] = $user->role_id;
        header("Location: ../index.php");
        exit();


        function isUserAdmin($user) {
            if ($user->role_id == 1) {
                return true;
            }
            return false;
        }
?>