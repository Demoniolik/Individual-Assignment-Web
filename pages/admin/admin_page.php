<!-- 
    Before accessing thie page user should be authorized and have role of admin type
    In other cases this page will be forbbiten for others
 -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin page</title>
</head>
<body>
    <div class="container">
        
        <form action="../../dao/admin_dao.php" method="post">

        <h2>Adding products form: </h2>
        <table>

            <tr>
                <td><label for="product_id">Product id</label></td>
                <td><input type="text" name="name" id="product_id"></td>
            </tr>

            <tr>
                <td><label for="name">Product name</label></td>
                <td><input type="text" name="name" id="name"></td>
            </tr>

            <tr>
                <td><label for="price">Price</label></td>
                <td><input type="text" name="price" id="price"></td>
            </tr>

            <tr>
                <td><label for="poster">Poster</label></td>
                <td><input type="text" name="poster" id="poster"></td>
            </tr>

            <tr>
                <td><label for="is_available">Is available</label></td>
                <td><input type="text" name="is_available" id="is_available"></td>
            </tr>

            <tr>
                <td><label for="special_proposition">Special proposition</label></td>
                <td><input type="text" name="special_proposition" id="special_proposition"></td>
            </tr>

            <tr>
                <td><label for="category_id">Category id</label></td>
                <td><input type="text" name="category_id" id="category_id"></td>
            </tr>

            <tr>
                <td colspan="2"><button type="submit">Submit</button></td>
            </tr>

        </table>
    
    </form>

    <form action="../../dao/admin_category_dao.php" method="post">
    
        <h2>Adding category form: </h2>

        <table>
            <tr>
                <td><label for="">Category name</label></td>
                <td><input type="text" name="category_name" id="category_id"></td>
            </tr>
            <tr>
                <td><button type="submit">Add new category</button></td>
            </tr>
        </table>
    </form>

    </div>
</body>
</html>