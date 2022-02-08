<?php
    
    require_once "static/Model.php";
    
    class Categories extends Model
    {
        public static $table = 'Categories';
        public static $fields;
    
        public function __construct ()
        {        
            parent::__construct();
        }
    }
    