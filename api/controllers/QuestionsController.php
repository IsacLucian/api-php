<?php
    
    include_once 'static/Controller.php';
    include_once ROOT_DIR . '/models/Questions.php';
    
    $Questions = new Questions();
    
    class QuestionsController extends Controller {
    
        public static $model = 'Questions';
    
        public function __construct()
        {
            //
        }
    }
    