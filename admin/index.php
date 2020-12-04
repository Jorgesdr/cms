<?php 
require("../res/php/app_top_admin.php");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>ADMINISTRADOR</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   <link rel="stylesheet" href="../res/framework/semantic.min.css"> 
    <link rel="stylesheet" href="../res/css/main.css">
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    
</head>

<body>
     
    <?php 
    if(isset($_SESSION["admin"])){
    require("../views/navegation/main_admin_nav.php");
    }
    ?>
    <?php
        if(!isset($_SESSION["admin"])){
            require("../views/admin/home.php");
        }elseif(isset($_SESSION["admin"])&& !isset($_GET["section"])){
            require("../views/admin/main.php");
        }elseif(isset($_SESSION["admin"])&& isset($_GET["section"])&& $_GET["section"]== "post"){
            require("../views/admin/post.php");
        }elseif(isset($_SESSION["admin"])&& isset($_GET["section"])&& $_GET["section"]== "categories")
        {
            require("../views/admin/categories.php");
        }
    ?>
    
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
 <script src="../res/framework/semantic.min.js"> </script>
    <script src="https://cdn.ckeditor.com/4.15.1/standard/ckeditor.js"></script>
    <script src="../res/javascript/admin.js"> </script>  
</body>
</html>