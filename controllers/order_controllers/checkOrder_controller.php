<?php
require_once("../../models/order_model.php");

   

class CheckController
{

function getUserTotal($datefrom,$dateto)
{
   $order=new Order();
   $data=$order->getUsersAndTotal($datefrom,$dateto);
  
   return $data;

}
function getUserOrder()
{
    $order=new Order();
   $userOrders=$order->getAllUserOrders();
   
   return $userOrders;
}

}





include('../../tempViews/checks.php');
?>