<?php
    
    require_once "static/Model.php";
    
    class Questions extends Model
    {
        public static $table = 'Questions';
        public static $fields;
    
        public function __construct ()
        {        
            parent::__construct();
        }
    }
    