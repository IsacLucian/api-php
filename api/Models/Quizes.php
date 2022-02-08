<?php
    
    require_once "static/Model.php";
    
    class Quizes extends Model
    {
        public static $table = 'Quizes';
        public static $fields;
    
        public function __construct ()
        {        
            parent::__construct();
        }
    }
    