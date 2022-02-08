<?php

require_once ROOT_DIR . '/config/Config.php';
require_once ROOT_DIR . '/database/Database.php';

function Get_fields($table){
	

	$conn = Database::connection();

	$query = $conn->query("SHOW COLUMNS FROM " . $table);

	$fields = array();
	while($row = $query->fetch_assoc()){
    	if($row['Field'] !== 'id' && $row['Field'] !== 'created_at' && $row['Field'] !== 'updated_at' && $row['Field'] !== 'admin')
    		array_push($fields, $row['Field']);
	}

	return $fields;
}