<?php
    
    include_once 'static/Controller.php';
    include_once ROOT_DIR . '/models/Songs.php';
    
    $Songs = new Songs();
    
    class SongsController extends Controller {
    
        public static $model = 'Songs';
    
        public function __construct()
        {
            //
        }
    }
    