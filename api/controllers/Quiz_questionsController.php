<?php
    
    include_once 'static/Controller.php';
    include_once ROOT_DIR . '/models/Quiz_questions.php';
    
    $Quiz_questions = new Quiz_questions();
    
    class Quiz_questionsController extends Controller {
    
        public static $model = 'Quiz_questions';
    
        public function __construct()
        {
            //
        }
    }
    