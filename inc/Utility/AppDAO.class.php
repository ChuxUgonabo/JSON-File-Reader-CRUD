<?php
// +------------+-------------+------+-----+---------+----------------+
// | Field      | Type        | Null | Key | Default | Extra          |
// +------------+-------------+------+-----+---------+----------------+
// | id         | int(11)     | NO   | PRI | NULL    | auto_increment |
// | appName    | varchar(50) | YES  |     | NULL    |                |
// | appVersion | varchar(50) | YES  |     | NULL    |                |
// | platform   | varchar(50) | YES  |     | NULL    |                |
// | author     | varchar(50) | YES  |     | NULL    |                |
// | email      | varchar(50) | YES  |     | NULL    |                |
// +------------+-------------+------+-----+---------+----------------+
class AppDAO {


    private static $db;

    static function initialize()    {
        self::$db = new PDOagent("App");
    }

    //Read
    static function readApps(): array   {
      $sqlAll = 'SELECT * FROM APP ORDER BY platform;';
      self::$db->query($sqlAll);
      self::$db->execute();
      return self::$db->resultSet();
    }
    static function insertApp($app){
        $sqlInsert = 'INSERT INTO APP(appName, appVersion, platform, author, email) VALUES(:appName, :appVersion, :platform, :author, :email);';
        self::$db->query($sqlInsert);
        self::$db->bind(':appName', $app->getAppName());
        self::$db->bind(':appVersion', $app->getAppVersion());
        self::$db->bind(':platform', $app->getPlatform());
        self::$db->bind(':author', $app->getAuthor());
        self::$db->bind(':email', $app->getEmail());

        self::$db->execute();
        return self::$db->lastInsertId();

    }
    

    static function deleteApp($id) {
        $sqlDel = 'DELETE FROM APP WHERE id = :id;';
        self::$db->query($sqlDel);
        self::$db->bind(':id', $id);
        self::$db->execute();

        return self::$db->rowCount();
    }



    static function getApp($id) {
        $sql = 'SELECT * FROM APP WHERE id = :id;';
        self::$db->query($sql);
        self::$db->bind(':id', $id);
        self::$db->execute();
        return self::$db->singleResult();
    }

    static function updateApp($app) {
        $sqlUpdate = 'UPDATE APP SET appName = :appName, appVersion = :appVersion, platform = :platform, author = :author, email = :email WHERE id = :id;';
        self::$db->query($sqlUpdate);
        self::$db->bind(':id', $app->getId());
        self::$db->bind(':appName', $app->getAppName());
        self::$db->bind(':appVersion', $app->getAppVersion());
        self::$db->bind(':platform', $app->getPlatform());
        self::$db->bind(':author', $app->getAuthor());
        self::$db->bind(':email', $app->getEmail());

        self::$db->execute();
        return self::$db->rowCount();

    }
}

?>