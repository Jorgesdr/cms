<?php 
    require("../functions.php");

$user=new User_Actions();

//login

$login=$user->login($_POST['email'],$_POST['pass']);

    if($login){
        //iniciar session
        
        $_SESSION["user"]=$_POST['email'];
        
        return(true);
        
            
    }else{
         return(false);
       
        
    }

?>