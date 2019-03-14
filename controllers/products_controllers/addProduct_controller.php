<?php
    require_once("../../models/products_model.php");
    require_once("../../models/category_model.php");

    $category= new Category ();
    $allCategories= $category->selectAll();

    class AddProduct{

        function add($postArray){

        

            $product= new Product ();
           

            
            $name='';
            $image='';
            $price='';
            $status='';
            $categoryID='';

            if ( isset($postArray['submit']) ) {
                
                $name = isset($postArray['name']) ?  $postArray['name'] :NULL;
                $image = isset($postArray['img']) ?  $postArray['img'] :NULL;
                $price = isset($postArray['price']) ?  $postArray['price'] :NULL;
                $status = isset($postArray['status']) ?  $postArray['status'] :NULL;
                $categoryID = isset($postArray['category']) ?  $postArray['category'] :NULL;
                
                $product->insert($name,$image,$price,$status,$categoryID); 
                
                

            }
        }
}

    $product = new AddProduct();
    $product->add($_POST);
    include ("../../views/08_add-product.php");


?>