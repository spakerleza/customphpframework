<?php
class Model {
    protected $db;

    public function __construct() {
        $this->db = new dbQuery;
    }

    public function load($file) {
        
        $dir = "app/model/".$file.".php";
        
        if (file_exists($dir)) {
            require $dir;
            
            $classname = $file."Model";
            return new $classname;
        }
    }
}
?>