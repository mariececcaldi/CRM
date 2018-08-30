<?php
header('Cache-Control: no-cache');
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json; charset=utf-8');
 
$email=$_GET['email'];

// Vérifie si la chaine ressemble à un email
if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
  $correct = 1;
  $message = $_GET['email'] .' est un format d\'email correct.';
} else {
  $correct = 0;
  $message = $_GET['email'] .' est un format d\'email  incorrect.';
}

// FORMATAGE DU JSON RETOURNE
$data[] = array(
  'correct' => $correct,
  'message' => $message
) ;
echo json_encode($data) ;
exit() ;