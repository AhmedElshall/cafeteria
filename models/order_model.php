<?php

class Order{

function connectDb (){


    $servername = "localhost";
    $username = "root";
    $dbname = "cafeteria";
    try{

    
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, "root");
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $conn;
        }catch(PDOException $e)
        {
         echo "Error: " . $e->getMessage();
        }
}


function insert($name,$image,$price,$status,$categoryID){
       
    $conn= $this->connectDb();
   
    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO products ( product_name , product_image, product_price,
    product_status,category_id) 
    VALUES (:name, :image, :price, :status, :categoryID)");
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':image', $image);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':categoryID', $categoryID);

    $stmt->execute();

$conn = null;
}


function selectLatestOrder ($user_id){
    $conn=  $this->connectDb();
    
    $stmt= $conn->prepare("SELECT products.product_name,products.product_image from products,product_order WHERE product_order.product_id=products.product_id AND product_order.order_id=(SELECT orders.order_id FROM orders WHERE orders.user_id=14 order BY orders.order_date_from DESC LIMIT 1);");
    $stmt->execute();
    $product = $stmt->fetch();
    return $product;
   
    $conn = null;
}

function checkUserOrders(){
    $conn=$this->connectDb();
    $stmt=$conn->prepare("SELECT * from orders,products,users where orders.user_id=users.user_id and orders.product_id=products.product_id;");
    $stmt->execute();
    $userChecks=$stmt->fetch();
    return $userChecks;
    $conn=null;


}

function getUserNameAndTotal($datefrom,$dateto){
 
     $conn=$this->connectDb();
    $stmt=$conn->prepare("SELECT users.user_name, SUM(products.product_price) as total from orders,products,users where orders.user_id=users.user_id and orders.product_id=products.product_id and orders.order_date_from BETWEEN '".$datefrom."'AND '".$dateto."' GROUP by products.product_price ,users.user_name;");
    $stmt->execute();
    $userChecks=$stmt->fetch();
    return $userChecks;
    $conn=null;

}

function getUserOrders(){
 
     $conn=$this->connectDb();
    $stmt=$conn->prepare("SELECT users.user_name, products.product_price,products.product_name,orders.order_date_from from orders,products,users where orders.user_id=users.user_id and orders.product_id=products.product_id;");
    $stmt->execute();
    $userChecks=$stmt->fetch();
    return $userChecks;
    $conn=null;

}

}
?>

<!-- SELECT products.product_name,products.product_image from products,product_order WHERE product_order.product_id=products.product_id
AND product_order.order_id=(SELECT orders.order_id FROM orders WHERE orders.user_id=14 order BY orders.order_date_from DESC LIMIT 1); -->