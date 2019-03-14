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

// get All orders Admin//
function getAllUserOrders(){
    $conn=$this->connectDb();
    $stmt=$conn->prepare("select  * from users,products ,orders , product_order where users.user_id=orders.user_id and product_order.product_id=products.product_id and product_order.order_id=orders.order_id ;");
    $stmt->execute();
    $allUsers=$stmt->fetchAll();
    return $allUsers;
    $conn=null;


}

// get User And Total //

function getUsersAndTotal($startdate,$enddate){
 
     $conn=$this->connectDb();
    $stmt=$conn->prepare("select SUM(orders.amount) as total , users.user_name from users,products ,orders , product_order where users.user_id=orders.user_id and product_order.product_id=products.product_id and product_order.order_id=orders.order_id and '".$startdate."'<=orders.order_date_from<='".$enddate."' GROUP BY users.user_name , orders.amount ;");
    $stmt->execute();
    $allData=$stmt->fetchAll();
    return $allData;
    $conn=null;

}

// OrderPage USer //
function getUserOrder($id){

    $conn=$this->connectDb();
    $stmt=$conn->prepare("select  * from users,products ,orders , product_order where users.user_id=orders.user_id and product_order.product_id=products.product_id and product_order.order_id=orders.order_id and users.user_id='".$id."';");
    $stmt->execute();
    $userorders=$stmt->fetchAll();
    return $userorders;
    $conn=null;
}

}
?>