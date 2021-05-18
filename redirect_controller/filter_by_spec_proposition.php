<?php 
    session_start();
    $spec_propos = $_GET["proposition"];
    $spec_propos = str_replace("_", " ", $spec_propos);
    
    if ($spec_propos == "") {
        $_SESSION["select_items"] = "SELECT * FROM product;";
    } else {
        $_SESSION["select_items"] = "SELECT * FROM product WHERE special_proposition = $spec_propos;";
    }
    
    header("Location: ../index.php");
    exit();
?>