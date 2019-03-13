<?php
    require_once("../../models/user_model.php");
    $id = $_GET['id'];
    $u= new User ();
    $user= $u->selectUser($id);
    include ("../../views/helperViews/editUser.php")

?>