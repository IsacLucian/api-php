<?php
    
    include_once 'static/Controller.php';
    include_once ROOT_DIR . '/models/User_quizes.php';
    
    $User_quizes = new User_quizes();
    
    class User_quizesController extends Controller {
    
        public static $model = 'User_quizes';
    
        public function __construct()
        {
            //
        }
    }
    