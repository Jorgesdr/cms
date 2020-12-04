<?php 
    require("../functions.php");

$user=new User_Actions();

//obtener perfil user
$profile=$user->getprofile($_SESSION['user']);


//marcar favorito

$favorite=$user->favorite($_POST['posts_id'],$profile[0]["users_id"]);

    if($favorite){
        return(true);
           
    }else{
         return(false);
       
    }

?>