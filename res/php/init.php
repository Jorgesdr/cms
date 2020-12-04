<?php 
session_start();
require "medoo.php";

use Medoo\Medoo;

try{
    $database = new Medoo([
	// required
	'database_type' => 'mysql',
	'database_name' => 'cms',
	'server' => 'localhost',
	'username' => 'root',
	'password' => '',

        
	
]);
}catch(exception $e){
    echo("no se pudo conectar a base datos");
}



 




?>