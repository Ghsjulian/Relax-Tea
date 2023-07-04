<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
/*===================================*/
require_once '../database/__DB__.php';
require_once '__HandleSignup__.php';
$message = "";
$status = "";
$token = "";
$__DB__ = new __database__();
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER["REQUEST_METHOD"];
if ($requestMethod === "POST") {
  $name = $_POST['username'];
  $email = $_POST['useremail'];
  $password = $_POST['userpassword'];
  $data = array(
    "user_name" => $name,
    "user_email" => $email,
    "user_password" => $password
  );
  $checkLogin = __HandleSignup__($data, $__DB__);
  if ($checkLogin) {
    $sql = "SELECT * FROM users WHERE user_name='$name' AND user_email='$email'";
    $data = $__DB__->__SELECT__($sql);
    $token = $data[0]['token'];
    $message = "Registration Successfully";
    $status = true;
  } else {
    $message = "Registration Failed.";
    $status = false;
  }
  echo json_encode(array(
    "status" => $status,
    "token" => $token,
    "message" => $message
  ));
}

?>