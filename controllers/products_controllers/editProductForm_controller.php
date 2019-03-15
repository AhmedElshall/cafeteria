<?php
    require_once("../../models/products_model.php");
    require_once("../../models/category_model.php");
    $category= new Category ();
    $allCategories= $category->selectAll();
    
    $id = $_GET['id'];
    $p= new Product ();
    $product= $p->selectProduct($id);
    include ('../../tempViews/10_edit-product.php');

?>