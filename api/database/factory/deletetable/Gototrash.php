<?php

    $tablename = $_POST['name'];

    $file = $_SERVER['DOCUMENT_ROOT'];

    $path = $file.'/database/migrations/'.$tablename.'.sql';

    if(!file_exists($path)) {
        echo "Nu e frt";
        die;
    }

    if(unlink($path)){
        echo "Migration deleted<br>";
    }
    else {
        echo "Migration not deleted<br>";
    }

    $path = $file.'/models/'.$tablename.'.php';

    if(unlink($path)){
        echo "Model deleted<br>";
    }
    else {
        echo "Model not deleted<br>";
    }

    $path = $file.'/controllers/'.$tablename.'Controller.php';

    if(unlink($path)){
        echo "Controller deleted<br>";
    }
    else {
        echo "Controller not deleted<br>";
    }