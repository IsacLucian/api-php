<?php
    
    include_once 'static/Controller.php';
    include_once ROOT_DIR . '/models/Question_answers.php';
    
    $Question_answers = new Question_answers();
    
    class Question_answersController extends Controller {
    
        public static $model = 'Question_answers';
    
        public function __construct()
        {
            //
        }
    }
    