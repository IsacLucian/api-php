<?php
    
    include_once 'static/Controller.php';
    include_once ROOT_DIR . '/models/Quizes.php';
    
    $Quizes = new Quizes();
    
    class QuizesController extends Controller {
    
        public static $model = 'Quizes';
    
        public function __construct()
        {
            //
        }
    }
    