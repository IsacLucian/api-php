<?php
    
    require_once "static/Model.php";
    
    class User_settings extends Model
    {
        public static $table = 'User_settings';
        public static $fields;
    
        public function __construct ()
        {        
            parent::__construct();
        }
    }
    