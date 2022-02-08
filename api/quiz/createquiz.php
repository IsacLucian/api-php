<?php

    require_once '../vendor/httpPost';
    session_start();

    if(isset($_POST['button']))
    {
        $category_name = $_POST['category'];
        $title =$_POST['title'];
        $category_id = (json_decode(file_get_contents('http://api.music-quiz.com/categories/name/'.$category_name),true))[0]['id'];

        if($category_id == null)
        {
            echo 'prost';
            die;
        }

        $quiz = [
            'category_id' => $category_id,
            'title' => $title,
            'url' => ''
        ];

        $_SESSION['quiz'] = $quiz;

        $songs = (json_decode(file_get_contents('http://api.music-quiz.com/songs/category_id/'.$category_id),true));

        $_GET = array();
        echo "<form method='get'>";
        foreach ($songs as $song) {
            $var = $song['title'];
            echo "<input type='checkbox' name='$var'>$var<br>";
        }

        echo "<button type='submit' name='submit'>Create</button>";
        echo "</form>";


    }
?>

<?php

    if(isset($_GET['submit']) && sizeof($_GET)>1)
    {
        httpPost('http://api.music-quiz.com/quizes/store',$_SESSION['quiz']);
        $quiz_id = (json_decode(file_get_contents('http://api.music-quiz.com/quizes/title/'.$_SESSION['quiz']['title']),true))[0]['id'];

        foreach ($_GET as $var => $key)
            if($var !== 'submit')
            {
                $var[strrpos($var, '_')] = '.';

                $question_id = (json_decode(file_get_contents('http://api.music-quiz.com/questions/content/'.$var),true))[0]['id'];
                $arr = [
                    'quiz_id' => $quiz_id,
                    'question_id' => $question_id
                ];

                httpPost('http://api.music-quiz.com/quiz_questions/store',$arr);
            }

        echo "<script>window.history.go(-2)</script>";
    }
?>