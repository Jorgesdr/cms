<?php 

require("../functions.php");
$obj=new Admin_Actions();


$delete=$obj->deletecategory($_POST["category_id"]);
echo $delete;

?>
