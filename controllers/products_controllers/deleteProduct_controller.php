<?php 
    require_once("../../models/products_model.php");
    $product= new Product ();

    $id=$_POST['id'];
    $product->delete($id);
    header("Location: listProduct_controller.php")
?>