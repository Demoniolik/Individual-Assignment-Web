<?php 
    $connection = mysqli_connect('127.0.0.1', 'root', '', 'pet_shop');
    if($connection == false) {
      echo "error";
    }
?>

<?php 
    $result = "INSERT INTO product (id, name, price, poster, isAvailable, special_proposition, category_id)
        VALUES (
        '$_POST[product_id]',
        '$_POST[name]', '$_POST[price]', 
        '$_POST[poster]', '$_POST[is_available]', 
        '$_POST[special_proposition]', '$_POST[category_id]'
        )";

    if(mysqli_query($connection, $result)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }
?>