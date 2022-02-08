<?php
    
    require_once "static/Model.php";
    
    class User_quizes extends Model
    {
        public static $table = 'User_quizes';
        public static $fields;
    
        public function __construct ()
        {        
            parent::__construct();
        }
    }
    