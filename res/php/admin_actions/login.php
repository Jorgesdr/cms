<?php 
    require("../functions.php");

$admin=new Admin_Actions();

//login

$login=$admin->login($_POST['email'],$_POST['password']);

    if($login){
        //iniciar session
        $_SESSION["admin"]=$_POST['email'];
        
        return true;
        
    }else{
        return false;
    }

?>