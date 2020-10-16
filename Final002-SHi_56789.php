<?php

//Require Files
require_once("inc/Entity/App.class.php");
require_once("inc/Utility/Page.class.php");
require_once("inc/Utility/FileAgent.class.php");
require_once("inc/Utility/AppParser.class.php");
require_once("inc/Utility/PDOAgent.class.php");
require_once("inc/Utility/AppDAO.class.php");
require_once("inc/Utility/RestClient.class.php");
require_once("inc/config.inc.php");

//Intitialize the AppDAO
AppDAO::initialize();
//Initialize stats DAO

//Initialize the messages array
$messages = array();

//Was there jsonUpload data?
if(isset($_POST["submitF"])) {
    //Read in the file
    $jsonFile = FileAgent::readFile($_FILES["appFile"]["tmp_name"]);
    //Parse the Apps
    AppParser::parseApps($jsonFile);
    //Insert them into the database
    $count = 0;
    foreach (AppParser::$parsedApps as $dbApp)   {
        AppDAO::insertApp($dbApp);
        $count++;
    }

    $messages[] = "Imported $count apps to the database.";
}

// Process Post data
if (isset($_POST["submit"]))  {

   $id = RestClient::call("POST", $_POST);


    $messages[] = "App with ID: $id was added database.";

}



// //Process any GET requests
if(!empty($_GET)){
    if ($_GET["action"] == "delete") {
        //Do something
        $countt = AppDAO::deleteApp($_GET['id']);
        //Get get Parameters for an action, if it was equal to edit then grap the $appToEdit
        $messages[] = "Deleted $countt apps from the database.";

        //Get parameter for delete
            //Delete the appropriate app
            //Update the messages array
    }
}

$apps = AppDAO::readApps();

Page::header();
Page::showUpload();
Page::addForm();
Page::appsList($apps);
Page::showMessages($messages);

//Check if there is an $appToEdit, ifn ot then show  a blank edit form
    
        // Page::editForm($appToEdit);
    
        // Page::editForm();
    
    //List the apps
    //Show the statistics
    //Show the upload
    //Show the XML Export
//Show the footer
?>