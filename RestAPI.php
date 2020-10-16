<?php


//Require configuration
require_once('inc/config.inc.php');

//Require Entities
require_once('inc/Entity/App.class.php');

//Require Utillity Classes
require_once('inc/Utility/PDOAgent.class.php');
require_once('inc/Utility/AppDAO.class.php');

/*
Create  - INSERT - POST
Read    - SELECT - GET
Update  - UPDATE - PUT
DELETE  - DELETE - DELETE
*/

//Instantiate a new Customer Mapper
AppDAO::initialize();


//Pull the request data
parse_str(file_get_contents('php://input'), $requestData);

//Do something based on the request
switch ($_SERVER["REQUEST_METHOD"])   {
    case "POST":
        $newApp = new App();
        $newApp->setAppName($requestData['appName']);
        $newApp->setAppVersion($requestData['appVersion']);
        $newApp->setPlatform($requestData['platform']);
        $newApp->setAuthor($requestData['author']);
        $newApp->setEmail($requestData['email']);
        $newApp->setId($requestData['id']);

        $id =  AppDAO::insertApp($newApp);

        header('Content-Type: application/json');
        //return the confirmation of deletion
        echo json_encode($id);
    break;

    case "PUT":
        //Assemble the new object
        $appToUpdate = new App();
        $appToUpdate->setId($requestData["id"]);
        $appToUpdate->setAppName($requestData["name"]);
        $appToUpdate->setAppVersion($requestData["version"]);
        $appToUpdate->setPlatform($requestData["platform"]);
        $appToUpdate->setAuthor($requestData["author"]);
        $appToUpdate->setEmail($requestData["email"]);
        
        $result = AppDAO::updateApp($appToUpdate);

        //Set the header
        header('Content-Type: application/json');
        //return the confirmation of deletion
        echo json_encode($result);

    break; 

    default:
        echo json_encode(array("message"=> "Você fala HTTP?"));
    break;
}



?>