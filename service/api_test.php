<?php
// This endpoint exists only to simluate the final API who is receiving some data on POST request

header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  // Detect request content-type
  $isJson = isset($_SERVER['CONTENT_TYPE']) && $_SERVER['CONTENT_TYPE']==='application/json';

  if ($isJson) {
    $json = file_get_contents('php://input');
    // $raw = json_decode($json, true);
    echo $json;
  } else {
    // $_POST array only works if the request have a content-type: application/x-www-form-urlencoded
    echo json_encode($_POST);
  }
} else {
  header("HTTP/1.0 405 Method Not Allowed");
  die("HTTP/1.0 405 Method Not Allowed");
}