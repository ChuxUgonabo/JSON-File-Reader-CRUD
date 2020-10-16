<?php
// | Field      | Type        | Null | Key | Default | Extra          |
// +------------+-------------+------+-----+---------+----------------+
// | id         | int(11)     | NO   | PRI | NULL    | auto_increment |
// | appName    | varchar(50) | YES  |     | NULL    |                |
// | appVersion | varchar(50) | YES  |     | NULL    |                |
// | platform   | varchar(50) | YES  |     | NULL    |                |
// | author     | varchar(50) | YES  |     | NULL    |                |
// | email      | varchar(50) | YES  |     | NULL    |                |
// +------------+-------------+------+-----+---------+----------------+
Class App {
 
    //Attributes
    private  $id;
    private  $appName;
    private  $appVersion;
    private  $platform;
    private  $author;
    private  $email;

   
    //Getters
    public function getId(){
        return $this->id;
    }
    public function getAppName(){
        return $this->appName;
    } 
    public function getAppVersion(){
        return $this->appVersion;
    } 
    public function getPlatform(){
        return $this->platform;
    } 
    public function getAuthor(){
        return $this->author;
    } 
    public function getEmail(){
        return $this->email;
    }
   
    
    //Setters
    public function setId($newid){
        $this->id = $newid;
    }
    public function setAppName($newappName){
        $this->appName = $newappName;
    }
    public function setAppVersion($newappVersion){
        $this->appVersion = $newappVersion;
    }
    public function setPlatform($newplatform){
        $this->platform = $newplatform;
    }
    public function setAuthor($newauthor){
        $this->author = $newauthor;
    }
    public function setEmail($newemail){
        $this->email = $newemail;
    }

    public function serialize() {
        $obj = new stdClass();
        $obj->id = $this->id;
        $obj->appName = $this->appName;
        $obj->appVersion = $this->appVersion;
        $obj->platform = $this->platform;
        $obj->author = $this->author;
        $obj->email = $this->email;
        
        return $obj;
    }
  
}
?>