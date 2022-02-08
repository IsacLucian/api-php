<?php
    
    include_once 'static/Controller.php';
    include_once ROOT_DIR . '/models/Users.php';
    
    $Users = new Users();
    
    class UsersController extends Controller {
    
        public static $model = 'Users';
    
        public function __construct()
        {
            //
        }
    }
    