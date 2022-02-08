<?php


$query = 'SHOW TABLES FROM ' . DB_NAME;

$conn = Database::connection();

$result = $conn->query($query);

// pot adauga rute de tipul /tabel/coloana_din_tabel/%valoare_ce_trebuie_cautata%

$router->get('/users/email/%email%', 'UsersController@get');
$router->get('/categories/name/%name%', 'CategoriesController@get');
$router->get('/questions/content/%content%', 'QuestionsController@get');
$router->get('/songs/title/%title%', 'SongsController@get');
$router->get('/songs/category_id/%category_id%', 'SongsController@get');
$router->get('/quizes/title/%title%', 'QuizesController@get');
$router->get('/quizes/category_id/%category_id%', 'QuizesController@get');
$router->get('/quiz_questions/quiz_id/%quiz_id%', 'Quiz_questionsController@get');
$router->get('/question_answers/question_id/%question_id%', 'Question_answersController@get');

while ($row = mysqli_fetch_row($result)) {

    $table = $row[0];
    $_table = $row[0];
    $_table[0] = strtoupper($_table[0]);

    $router->get('/'.$table,			    $_table.'Controller@index'); // get all
	$router->get('/'.$table.'/id/%id%', 				$_table.'Controller@get'); // get by id
	$router->post('/'.$table.'/store', 		$_table.'Controller@create'); // create user
	$router->post('/'.$table.'/store/%id%', 		$_table.'Controller@update'); // update user by id
	$router->post('/'.$table.'/destroy/%id%',	$_table.'Controller@destroy'); // destroy user by id

}


/**

// users
$router->get('/users', 'UserController@index'); // get all
$router->get('/user', 'UserController@get'); // get by id
$router->post('/user/store', 'UserController@create'); // create user
$router->post('/user/store', 'UserController@update'); // update user by id 
$router->post('/user/destroy', 'UserController@destroy'); // destroy user by id

*/