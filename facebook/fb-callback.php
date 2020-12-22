<?php
if (!session_id()) {
  session_start();
}
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once 'src/Facebook/autoload.php';
$fb = new Facebook\Facebook([
  'app_id' => '762485030958079',
  'app_secret' => '7a556c1b53f3b5574529fd2bcdf9d29f',
  'default_graph_version' => 'v2.10',
]);

$helper = $fb->getRedirectLoginHelper();

try {
  // Returns a `Facebook\FacebookResponse` object
  $accessToken = $helper->getAccessToken();
  $response = $fb->get('/me?fields=id,first_name,middle_name,last_name,email', $accessToken);
} catch (Facebook\Exceptions\FacebookResponseException $e) {
  echo 'Graph returned an error: ' . $e->getMessage();
  exit;
} catch (Facebook\Exceptions\FacebookSDKException $e) {
  echo 'Facebook SDK returned an error: ' . $e->getMessage();
  exit;
}
$user = $response->getGraphUser();

// $user['id' => "value",'name' => 'value','email' => "value" ];
//echo 'id: ' . $user['id'];
if (!empty($user)) {
  $_SESSION['loginclient']['email'] = $user['email'];
  $_SESSION['loginclient']['fullname'] = $user['last_name'] . " " . $user['middle_name'] . " " . $user['first_name'];
  header('location:../index.php');
}

// OR
// echo 'Name: ' . $user->getName();
