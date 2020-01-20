<?php
require('http-request.php');

// Backend endpoint to receive all data from the UI Form
define('API_URL', 'http://leapcredit.local/service/api_test.php');

// Read JSON Payload
$json = file_get_contents('php://input');
$raw = json_decode($json, true);

// Map used to read grom the request and convert into a new array with new variable names
// this mapping could be used to translate the frontend variables to the Backend API parameters
// Is it necessary??
$mapValidations = array(
  'moneyNeed'               => requiredVar('howMuchIsNeeded'),
  'stp1whatdoyouneeditfor'  => requiredVar('whatDoYouNeedFor'),
  'stp2email'               => requiredVar('userEmail')
  // TODO: Add here all other variables
);


try {
  $data = mapAndValidateData($raw, $mapValidations);
  $api_res = httpRequest(API_URL, $data, 'POST');

  // header('Access-Control-Allow-Origin: *'); // disable cors
  header('Content-Type: application/json; charset=utf-8');
  echo json_encode($api_res);
} catch(Exception $ex) {
  $msg = $ex->getMessage();
  if (strpos($msg, 'Required data') > 0) {
    header("HTTP/1.0 422 Unprocessable Entity");
    die($msg);
  }

  header("HTTP/1.0 500 Internal Server Error");
  die( $msg );
}

function requiredVar($name) {
  return array('name'=>$name, 'required'=>true);
}
function optionalVar($name) {
  return array('name'=>$name, 'required'=>false);
}

function mapAndValidateData($data=array(), $validations=array()) {
  $validated = array();
  foreach ($validations as $key => $rule) {
    if ( $rule['required'] && empty($data[$key]) ) {
      throw new Exception("Required data not found: " . $key);
    }

    $validated[$rule['name']] = filter_var($data[$key], FILTER_SANITIZE_STRING);
  }

  return $validated;
}

