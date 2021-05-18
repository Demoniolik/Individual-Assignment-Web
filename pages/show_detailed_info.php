<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detailed info</title>
</head>
<body>
    <!-- Here we will have a simple structure like photo and info about product -->
    <?php 
        include '../model/product.php';
        $product_id = $_GET["product_id"];

        $connection = mysqli_connect('127.0.0.1', 'root', '', 'pet_shop');
        if($connection == false) {
            echo "error";
        }

        $QUERY = "SELECT * FROM product WHERE id = '$product_id';";

        $result = mysqli_query($connection, $QUERY);
            echo mysqli_error($connection);

            if(mysqli_num_rows($result) > 0) {
                for($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
                    $product = Product::buildProduct(
                        $row[id], $row[name], $row[price], $row[description],
                        $row[poster], $row[isAvailable], 
                        $row[special_proposition], $row[category_id]
                      );
                      $product->desctiption = $row[description];
                      echo $row[description];
                  }
            }
            echo $product->toString();
    ?>
</body>
</html>