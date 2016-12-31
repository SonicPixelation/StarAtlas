<?php
  $auth_code = null;
  $state = null;
  $token = null;
  $char_id = null;

  $client_id      = "YOUR CLIENT ID HERE";     //insert your client id here
  $client_secret  = "YOUR CLIENT SECRET HERE"; //insert your client secret here
  //
  $token_url = "https://login.eveonline.com/oauth/token";
  $characte_url = "https://login.eveonline.com/oauth/verify";

function getToken(){
  global $client_id;
  global $client_secret;
  global $token_url;
  global $token;

  if(isset($_GET["code"])){
    $auth_code = $_GET["code"];
  }

  $data = $client_id . ":" . $client_secret;
  $encoded_data = base64_encode($data);

  $data = array('grant_type'=>'authorization_code', 'code'=>$auth_code);
  $options = array(
    'http'=> array(
      'header' =>'Authorization: Basic ' . $encoded_data,
      'method' => 'POST',
      'content'=> http_build_query($data)
    )
  );
  $context = stream_context_create($options);
  $result  = file_get_contents($token_url, false, $context);
  $temp = json_decode($result);
  $token = $temp->access_token;
  return $token;
}

function getCharId(){
  global $characte_url;
  global $token;
  global $char_id;

  $options = array(
    'http'=> array(
      'header' => 'Accept: application/json',
      'header' => 'Authorization: Bearer ' . $token,
      'method' => 'GET'

    ));
    $context = stream_context_create($options);
    $result = file_get_contents($characte_url, false, $context);
    $temp = json_decode($result);
    $char_id = $temp->CharacterID;
    console_log($char_id);
}

function getLocation(){
  global $char_id;
  global $token;

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $datasource = "?datasource=tranquility";
  $location_url = "https://esi.tech.ccp.is/latest/characters/".$char_id."/location/".$datasource;

  $options = array(
    'http' => array(
      'header'=>'Authorization: Bearer '. $token,
      'method'=>'GET'
    ));
    $context = stream_context_create($options);
    $result = file_get_contents($location_url, false, $context);
    console_log($result);

}

  function console_log($data){
    echo '<script>';
    echo 'console.log('. json_encode($data) .')';
    echo '</script>';
  }
?>
