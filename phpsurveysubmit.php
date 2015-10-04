<?php session_start();

$_SESSION['voted'] = 'voted';

$answer = $_POST["brand"] . "\n " . $_POST["type"] . "\n " . $_POST["feat"] . "\n " . $_POST["spend"] . "\n ";

$file = 'phpsurvey.txt';
//open the file existing content
$current = file_get_contents($file);
//append new answer to file
$current .= $answer;
//write back to the file
file_put_contents($file, $current);

include 'phpsurveyresults.php';
?>
