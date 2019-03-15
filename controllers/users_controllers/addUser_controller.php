<?php
session_start();
ob_start();
    include("../../models/user_model.php");
    
class AddUser{
    

     function index($postArray,$FILES1){

        $user= new User ();


        $name='';
        $email='';
        $password='';
        $room='';
        $ext='';
        $image='';
        $check='';
        
        if ( isset($postArray['submit']) ) {
           
            if (isset($FILES1)) {
                
                    $file =$FILES1['img1'];
                    $allowedExts = array('jpg', 'png');
                    $uploadsDirecotry = "../../resources/uploads/";
                    $maxSize = 4000000;
                    var_dump($_FILES);
                 
                
            }
            $name = isset($postArray['name']) ?  $postArray['name'] :NULL;
            $email = isset($postArray['email']) ?  $postArray['email'] :NULL;
            $password = isset($postArray['password']) ?  $postArray['password'] :NULL;
            $room = isset($postArray['room']) ?  $postArray['room'] :NULL;
            $ext = isset($postArray['ext']) ?  $postArray['ext'] :NULL;
            $image = isset($postArray['img']) ?  $postArray['img'] :NULL;
           
            $check = NULL;
            var_dump($name);
            //$this->userService->
            $user->insert($name,$email,$password,$image,$room,$ext,$check,$file, $allowedExts, $uploadsDirecotry, $maxSize); 
           # $_SESSION['form_message'] = "Data Updated Successfully";
        }  

        
    }

    }
    $users= new AddUser();
   // var_dump($_FILES);
    $users->index($_POST,$_FILES);
    include ("../../views/07_add-user.php");

   
?>
