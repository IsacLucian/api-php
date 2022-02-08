<?php
    
    require_once "static/Model.php";
    
    class Songs extends Model
    {
        public static $table = 'Songs';
        public static $fields;
    
        public function __construct ()
        {        
            parent::__construct();
        }
    }
    