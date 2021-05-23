<?php 
    include '../model/product.php';
    $connection = mysqli_connect('127.0.0.1', 'dima_bekker', 'ADMINthebest321', 'dimabekker131');
    if($connection == false) {
      echo "error";
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Found proudcts</title>
</head>
<body>
    <?php 
        $result = mysqli_query($connection, "SELECT * FROM product WHERE name = '$_GET[search_value]';");
        $productArray = array();

        if(mysqli_num_rows($result) > 0) {
            for($i = 0; $row = mysqli_fetch_assoc($result); $i++) {
                $productArray[] = new Product(
                    $row[id], $row[name], $row[price], 
                    $row[poster], $row[isAvailable], 
                    $row[special_proposition], $row[category_id]
                  );
              }
        }

        for ($i = 0; $i < count($productArray); $i++) {
            echo $productArray[$i]->toString();
        }
    ?>
</body>
</html>