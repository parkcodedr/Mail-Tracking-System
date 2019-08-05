<?php
define ("DB_HOST", "localhost"); //Databse Host.
	define ("DB_USER", "root"); //Databse User.
	define ("DB_PASS", ""); //database password.
	define ("DB_NAME", "project"); //database Name.

	
function startmysession($lifetime, $path, $domain, $secure, $httponly){
      session_set_cookie_params($lifetime, $path, $domain, $secure, $httponly);
        @session_regenerate_id(true);
    
     if(!isset($_SESSION)) {
       session_start();
   }
      
}

$domain = $_SERVER['SERVER_NAME'];
startmysession(0, '/', $domain, false, true);


date_default_timezone_set('Africa/Lagos');
$con = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
if($con->connect_errno > 0){
    die('Unable to connect to database ['.$con->connect_error.']');
}


?>