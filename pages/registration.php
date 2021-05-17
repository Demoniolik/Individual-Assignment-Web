<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resistration</title>
</head>
<body>
    <div class="container">
        <form action="../redirect_controller/register.php" method="post">
            <table>
                <tr>
                    <td><label for="first_name">First name</label></td>
                    <td><input type="text" id="first_name" name="first_name"></td>
                </tr>
                <tr>
                    <td><label for="second_name">Second name</label></td>
                    <td><input type="text" id="second_name" name="second_name"></td>
                </tr>
                <tr>
                    <td><label for="login">Login</label></td>
                    <td><input type="email" id="login" name="login"></td>
                </tr>
                <tr>
                    <td><label for="password">Password</label></td>
                    <td><input type="password" id="password" name="password"></td>
                </tr>
                <tr>
                    <td><label for="repeat_password">Repeat password</label></td>
                    <td><input type="password" id="repeat_password" name="repeat_password"></td>
                </tr>
               <tr>
                   <td>
                   <button type="submit">Sing up</button>
                   </td>
               </tr>
            </table>
        </form>
    </div>
</body>
</html>