<?php

class AppParser {

    //Array to store the apps
    public static $parsedApps = array();

static function parseApps($jsonString) {

        //Parse the json into objects
        $stdApps = json_decode($jsonString);
    // var_dump($stdApps);
        //Iterate through the json jsonData
  
        foreach($stdApps as $s) {
            $app = new App();
            // $app->setId($s->id);
            $app->setAppName($s->appName);
            $app->setAppVersion($s->appVersion);
            $app->setPlatform($s->platform);
            $app->setAuthor($s->author);
            $app->setEmail($s->email);

            self::$parsedApps[] = $app;
        }
    
    
    }

}

?>