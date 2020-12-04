<?php 

    require("../functions.php");


    $user=new User_Actions();



$register=$user->register($_POST['name'],$_POST['last_name'],$_POST['username'],$_POST['email'],$_POST['pass']);

    if($register){
        echo "true";
    }else{
        echo "false";
    }





?>