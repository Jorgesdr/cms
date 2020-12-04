<?php 
    require("../functions.php");

$user=new User_Actions();



//eliminar favorito

$deletefavorite=$user->deletefavorite($_POST['favorite_id']);

    if($deletefavorite){
        return(true);
           
    }else{
         return(false);
       
    }

?>