<?php

// Send data to another endpoint using CURL
function httpRequest($url=false, $params=array(), $method='GET', $isJson=false) {
  if ($url) {

    //open connection
    $ch = curl_init();
    // $ip = $_SERVER['REMOTE_ADDR'];

    if($method==='GET' && !empty($params)) {
      $query_params = http_build_query($params);
      $url = sprintf("%s?%s", $url, $query_params);
    }

    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_FAILONERROR, false);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 10);
    curl_setopt($ch, CURLOPT_TIMEOUT, 15);
    curl_setopt($ch, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
    curl_setopt($ch, CURLOPT_HEADER, true); 
    
    $headers = array();
    if ($isJson) {
      $headers[] = 'Content-Type: application/json';
    } else {
      $headers[] = 'Content-Type: application/x-www-form-urlencoded';
    }
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

    
    if($method==='POST' && !empty($params)) {
      curl_setopt($ch, CURLOPT_POST, 1);
      if ($isJson) {
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($params));
      } else {
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
      }
    }

    //execute post
    $result = curl_exec($ch);
    $info = curl_getinfo($ch);

    $err = curl_error($ch);
    $contentType = curl_getinfo($ch, CURLINFO_CONTENT_TYPE);
    $statusCode = (int)curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);


    if ($result) {
      $actualResponseHeaders = (isset($info["header_size"]))?substr($result, 0, $info["header_size"]):"";
      $actualResponse = (isset($info["header_size"]))?substr($result,$info["header_size"]):"";

      if (strpos($contentType, "/json")>0) {
        return json_decode($actualResponse);
      } else {
        return $actualResponse;
      }
    } else {
      throw new Exception($err, $statusCode);
    }
  }
  return false;
}