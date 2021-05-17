<?php 
    include '../model/user.php';

    $login = $_POST["login"];
    $password = $_POST["password"];

    $FIND_USER_BY_CREDENTIALS_QUERY = "SELECT * FROM user WHERE login = '$login' AND password = '$password' LIMIT 1;";

    $connection = mysqli_connect('127.0.0.1', 'root', '', 'pet_shop');
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
                header("Location: ../pages/admin/admin_page.php");
                exit();
              }
        }else {
            header("Location: ../pages/login.php");
        exit();
        }

        $_SESSION["user"] = $user;
        header("Location: ../index.php");
        exit();


        function isUserAdmin($user) {
            if ($user->role_id == 1) {
                return true;
            }
            return false;
        }
?>