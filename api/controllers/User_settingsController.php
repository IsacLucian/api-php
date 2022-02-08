<?php
    
    include_once 'static/Controller.php';
    include_once ROOT_DIR . '/models/User_settings.php';
    
    $User_settings = new User_settings();
    
    class User_settingsController extends Controller {
    
        public static $model = 'User_settings';
    
        public function __construct()
        {
            //
        }
    }
    