<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../styles/login.css">
    <title>Login</title>
</head>
<body>
    <div class="container">
        <div class="left_side">
            <img src="../img/login/1.jpg" alt="">
        </div>
        <div class="right_side">
            <form action="../redirect_controller/authorization.php" method="post">
                <table>
                    <tr>
                        <td><label for="login">Login</label></td>
                        <td><input type="email" name="login" id="login"></td>
                    </tr>
                    <tr>
                        <td><label for="password">Password</label></td>
                        <td><input type="password" id="password" name="password"></td>
                    </tr>
                    <tr>
                       <td colspan=2>
                           <button type="submit">Sing in</button>
                       </td> 
                    </tr>
                </table>
            </form>
            <a href="registration.php">Sign up</a>
        </div>
    </div>
</body>
</html>