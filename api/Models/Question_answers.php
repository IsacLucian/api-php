<?php
    
    require_once "static/Model.php";
    
    class Question_answers extends Model
    {
        public static $table = 'Question_answers';
        public static $fields;
    
        public function __construct ()
        {        
            parent::__construct();
        }
    }
    