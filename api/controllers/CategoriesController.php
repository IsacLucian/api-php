<?php
    
    include_once 'static/Controller.php';
    include_once ROOT_DIR . '/models/Categories.php';
    
    $Categories = new Categories();
    
    class CategoriesController extends Controller {
    
        public static $model = 'Categories';
    
        public function __construct()
        {
            //
        }
    }
    