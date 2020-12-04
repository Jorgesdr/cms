

<?php 
require("functions.php");


$admin=new Admin_Actions();

if(isset($_SESSION["admin"])&&isset($_GET["section"])&& $_GET["section"]=="post"){
    //obtenemos categorias de bd
    $categories=$admin->getcategory();
}
if(isset($_SESSION["admin"])&&isset($_GET["section"])&& $_GET["section"]=="categories"){
    //obtenemos categorias de bd
    $categories=$admin->getcategory();
}


?>