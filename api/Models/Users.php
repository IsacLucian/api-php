<?php
    
    require_once "static/Model.php";
    
    class Users extends Model
    {
        public static $table = 'Users';
        public static $fields;
    
        public function __construct ()
        {        
            parent::__construct();
        }
    }
    