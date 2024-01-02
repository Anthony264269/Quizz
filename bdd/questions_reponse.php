<?php
require_once('./connexion.php');

// var_dump($quest_id);
// die();

$result = $database->query("SELECT question,quest_id,reponse FROM `question` JOIN reponse ON question.quest_id = reponse.question_id WHERE quest_id = '$count'");

$result -> execute();
$reponses = $result->fetchAll();

  
   