<?php

    if(isset($_GET['category']))
    {

        $category_id = (json_decode(file_get_contents('http://api.music-quiz.com/categories/name/'.$_GET['category']),true))[0]['id'];

        $quizes = (json_decode(file_get_contents('http://api.music-quiz.com/quizes/category_id/'.$category_id),true));

        $rand_quiz = $quizes[array_rand($quizes)]; // am selectat quiz ul

        $quiz_questions = (json_decode(file_get_contents('http://api.music-quiz.com/quiz_questions/quiz_id/'.$rand_quiz['id']),true));

        $sol = [];

        foreach ($quiz_questions as $cnt)
        {
            $question_id = $cnt['question_id'];

            $question_answers = (json_decode(file_get_contents('http://api.music-quiz.com/question_answers/question_id/'.$question_id),true));

            $ans_id = $question_answers[0]['answer_id'];

            $song = (json_decode(file_get_contents('http://api.music-quiz.com/songs/id/'.$ans_id),true))[0];

            $sol[] = [
                'song_path' => '/songs/'.$song['title'],
                'answers' => $question_answers,
                'content' => 'Guess the song'
            ];
        }

        echo json_encode($sol);
    }
    // quiz_question si question sunt in pereche
/**
    $arr['songs'] = array();
    $arr['answers'] = array();

    while($row = mysqli_fetch_row($quiz_questions))
    {
        $query = 'SELECT id FROM questions WHERE id = $row["question_id"]';
        $question = $conn->query($query);

        $query = 'SELECT content, is_valid FROM question_answer WHERE question_id = $question["id"]';
        $question_answers = $conn->query($query);

        array_push($arr['answers'], $question_answers);

        $query = 'SELECT title, url FROM songs WHERE id = $question_answ["id"]';
        $question_answer = $conn->query($query);

    }
*/