<?php 

require("../functions.php");
$obj=new Admin_Actions();
$nameimg=uniqid();
//OBTENER ID DEL ADMIN ACTIVO
$profile=$obj->getprofile($_SESSION["admin"]);
$savepost=$obj->savepost($_POST["txtNamePost"],$_POST["txtCategoryPost"],$_POST["description"],$nameimg,$profile[0]["admin_id"]);

if($savepost>0){
    move_uploaded_file($_FILES["img_file"]["tmp_name"], "../../img/imgpost/".$nameimg.".jpeg");
    echo "true";
}else{
    echo "false";
}
?>
