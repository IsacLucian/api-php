<?php

    $text = $_POST['tableinfo'];


    if(is_uploaded_file($_FILES["UploadFileName"]["tmp_name"])) {
        $text = file_get_contents($_FILES["UploadFileName"]["tmp_name"]);
    }

    $tablename = (str_word_count($text,1,'_-'))[2];

    $path = '../../migrations/'.$tablename.'.sql';

    if(file_exists($path)){
        echo 'Exista tabel frt';
        die;
    }

    if(file_put_contents($path,$text)) {
        echo "Migration created<br>";
    }
    else {
        echo "Migration not created<br>";
    }

    $tablename[0] = strtoupper($tablename[0]);

    $path = '../../../models/'.$tablename.'.php';

    $text = '<?php
    
    require_once "static/Model.php";
    
    class '.$tablename.' extends Model
    {
        public static $table = '."'".$tablename."'".';
        public static $fields;
    
        public function __construct ()
        {        
            parent::__construct();
        }
    }
    ';

    if(file_put_contents($path,$text)) {
        echo "Model created<br>";
    }
    else {
        echo "Model not created<br>";
    }

    $path = '../../../controllers/'.$tablename.'Controller.php';

    $text = '<?php
    
    include_once \'static/Controller.php\';
    include_once ROOT_DIR . \'/models/'.$tablename.'.php\';
    
    $'.$tablename.' = new '.$tablename.'();
    
    class '.$tablename.'Controller extends Controller {
    
        public static $model = '."'".$tablename."'".';
    
        public function __construct()
        {
            //
        }
    }
    ';

    if(file_put_contents($path,$text)) {
        echo "Controller created<br>";
    }
    else {
        echo "Controller not created<br>";
    }