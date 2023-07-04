<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require_once 'database/__DB__.php';
$message = "";
$status = "";
$__DB__ = new __database__();
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$requestMethod = $_SERVER["REQUEST_METHOD"];

$sql = "SELECT * FROM `users`";
$data = $__DB__->SelectSingle($sql);
print_r($data);
/*
if ($requestMethod === "POST") {

  $name = "ghsjulian";
  $pass = "ghs_&#80;";
  $db = "relaxtea";
  $host = "85.10.205.173:3306";
  $conn = mysqli_connect($host, $name, $pass, $db);
  if ($conn) {
    echo "Connected Successful";
  } else {
    echo mysqli_errno();
  }

*/

?>