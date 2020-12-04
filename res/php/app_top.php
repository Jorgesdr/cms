<?php 
require("functions.php");

$user=new User_Actions();


if(!isset($_GET["section"])){
    
    //obtenemos publicaciones recientes
    $posts=$user->getrecentpost();
    
    
}elseif(isset($_GET["section"])&& $_GET["section"]=="post"){
    //obtenemos informacion de la publi
    $posts=$user->getpostinfo($_GET["posts_id"]);
    //obtenemos perfil user
    $profile=$user->getprofile($_SESSION["user"]);
    //comprobamos que la publicacion visitada este en fav
    $check=$user->checkfavorite($profile[0]["users_id"],$_GET["posts_id"]);
    
    
}elseif(isset($_SESSION["user"])&&isset($_GET["section"])&& $_GET["section"]=="favorites"){
    //obtenemos el id user
    $profile=$user->getprofile($_SESSION['user']);
    
    //obtenemos publi fav
    $posts=$user->getfavorites($profile[0]["users_id"]);
}


?>