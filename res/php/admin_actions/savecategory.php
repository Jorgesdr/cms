<?php 

require("../functions.php");
$obj=new Admin_Actions();


$save=$obj->savecategory($_POST["category"]);
echo $save;

?>
