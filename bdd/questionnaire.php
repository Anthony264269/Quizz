<?php
require_once('./connexion.php');
$count = 3;
$result = $database->query("SELECT question,quest_id,right_answer,reponse FROM `question` JOIN reponse ON question.quest_id = reponse.question_id WHERE quest_id = '$count' ");

$result -> execute();
$questions = $result->fetch();
$quest_id = $questions['quest_id']; 
// var_dump($questions[0]);
// die();













