<?php 
    $connection = mysqli_connect('127.0.0.1', 'dima_bekker', 'ADMINthebest321', 'dimabekker131');
    if($connection == false) {
      echo "error";
    }
?>

<?php 
    $result = "INSERT INTO category (name)
        VALUES (
        '$_POST[category_name]')";

    if(mysqli_query($connection, $result)){
        echo "Records added successfully.";
    } else{
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($connection);
    }
?>