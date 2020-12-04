<?php 
require("res/php/app_top.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>CMS</title>
   <link rel="stylesheet" href="http://localhost/PHP/CMS/res/framework/semantic.min.css"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    
    <link rel="stylesheet" href="http://localhost/PHP/CMS/res/css/main.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> 
 <script src="http://localhost/PHP/CMS/res/framework/semantic.min.js"> </script>  
    <script src="http://localhost/PHP/CMS/res/javascript/user.js"> </script>  
</head>

<body>
     
    <?php require("views/navegation/main_nav.php")?>
    <?php
        if(!isset($_GET["section"])){
            require("views/home.php");
        }elseif(isset($_GET["section"])&& $_GET["section"]=="post"){
            require("views/post.php");
        }elseif(isset($_GET["section"])&& $_GET["section"]=="register"){
            require("views/register.php");
        }elseif(isset($_GET["section"])&& $_GET["section"]=="login"){
            require("views/login.php");
        }elseif(isset($_SESSION["user"])&& isset($_GET["section"])&& $_GET["section"]=="favorites"){
            require("views/favorites.php");
        }
    ?>
  
</body>
</html>