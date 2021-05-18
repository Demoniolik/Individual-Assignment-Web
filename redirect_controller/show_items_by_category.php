<?php 
    session_start();
    $category_id = $_GET["category_id"];
    
    if ($category_id == "") {
        $_SESSION["select_items"] = "SELECT * FROM product;";
    } else {
        $_SESSION["select_items"] = "SELECT * FROM product WHERE category_id = $category_id;";
    }
    
    header("Location: ../index.php");
    exit();
?>