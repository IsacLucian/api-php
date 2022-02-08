<?php
    
    require_once "static/Model.php";
    
    class Quiz_questions extends Model
    {
        public static $table = 'Quiz_questions';
        public static $fields;
    
        public function __construct ()
        {        
            parent::__construct();
        }
    }
    