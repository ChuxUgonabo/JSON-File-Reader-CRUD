<?php
class FileAgent{

    static function readFile($fileName){
        $fh = fopen($fileName, 'r');

        $fileContents = fread($fh, filesize($fileName));
        if(empty($fileContents)){
            throw new Exception("this file is empty ");
        }else {
            fclose($fh);
        }
        return $fileContents;
    }

}

?>