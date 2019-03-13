<?php
require_once("../../models/order_model.php");
require_once("../../models/products_model.php");
   

class OrderController
{

function getLatestOrder()
{
   $order=new Order();
   $latest=$order->selectLatestOrder(22);
   var_dump($latest[0]);
   return $latest;
//    var_dump("dkfjdkf");
}
function getAllProducts()
{
   $product= new Product ();
   $allProducts= $product->selectAll();
   var_dump($allProducts);
   return $allProducts;
}

}

$ordeee=new OrderController();
$latestOrders=$ordeee->getLatestOrder();
$allProd=$ordeee->getAllProducts();






















include('../../tempViews/order.php');
?>