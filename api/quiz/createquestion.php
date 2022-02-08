<?php

    if(isset($_POST['button'])) {

        require_once '../vendor/httpPost';
        require_once '../database/Database.php';

        $conn = Database::connection();

        // create the question

        $category = $_POST['category'];

        if (!(isset($_FILES['fileToUpload']['name']) && $_FILES['fileToUpload']['name'] !== '')) {
            echo 'Alege un song';
            die;
        }

        $name = $_FILES['fileToUpload']['name'];
        $tmp_name = $_FILES['fileToUpload']['tmp_name'];

        $create_quiz = [
            'content' => $name,
            'points' => 1
        ];

        httpPost('http://api.music-quiz.com/questions/store', $create_quiz);

        $location = 'C:/xampp/htdocs/music-quiz-website/songs/';
        move_uploaded_file($tmp_name, $location.$name);

        $category_id = (json_decode(file_get_contents('http://api.music-quiz.com/categories/name/'.$category),true))[0]['id'];

        $create_song = [
            'category_id' => $category_id,
            'title' => $name,
            'url' => $location.$name
        ];

        httpPost('http://api.music-quiz.com/songs/store', $create_song);

        $question_id = (json_decode(file_get_contents('http://api.music-quiz.com/questions/content/'.$name),true))[0]['id'];
        $answer_id = (json_decode(file_get_contents('http://api.music-quiz.com/songs/title/'.$name),true))[0]['id'];

        $ans1 = [
            'question_id' => $question_id,
            'answer_id' => $answer_id,
            'content' => $_POST['ans1'],
            'is_valid' => isset($_POST['valid1']) ? 1:0
        ];

        $ans2 = [
            'question_id' => $question_id,
            'answer_id' => $answer_id,
            'content' => $_POST['ans2'],
            'is_valid' => isset($_POST['valid2']) ? 1:0
        ];

        $ans3 = [
            'question_id' => $question_id,
            'answer_id' => $answer_id,
            'content' => $_POST['ans3'],
            'is_valid' => isset($_POST['valid3']) ? 1:0
        ];

        $ans4 = [
            'question_id' => $question_id,
            'answer_id' => $answer_id,
            'content' => $_POST['ans4'],
            'is_valid' => isset($_POST['valid4']) ? 1:0
        ];

        httpPost('http://api.music-quiz.com/question_answers/store', $ans1);
        httpPost('http://api.music-quiz.com/question_answers/store', $ans2);
        httpPost('http://api.music-quiz.com/question_answers/store', $ans3);
        httpPost('http://api.music-quiz.com/question_answers/store', $ans4);

        echo "<script>window.history.go(-1)</script>";
    }