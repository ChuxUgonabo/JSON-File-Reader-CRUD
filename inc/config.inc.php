<?php

$urlpeices = explode("/",$_SERVER['REQUEST_URI']);
$api_url = "http://localhost/";

for ($i = 0; $i < count($urlpeices) -1; $i++)   {
    $api_url .= "/".$urlpeices[$i];
}
$api_url .= "/RestAPI.php";

define('API_URL', $api_url);

//DO NOT MODIFY ANY CODE ABOVE THIS LINE, YOU WILL BE SORRY IF YOU DO.


//Config for the database

define("DB_HOST","localhost");
define("DB_USER","root");
define("DB_PASS","");
define("DB_NAME","CSIS3280002Final");



?>