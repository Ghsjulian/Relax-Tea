<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
/*===================================*/
require_once '../database/__DB__.php';
$message = "";
$status = "";

$__DB__ = new __database__();
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

$requestMethod = $_SERVER["REQUEST_METHOD"];

if ($requestMethod === "POST") {
  $product_image = $_FILES['product_image']['name'];
  $random = substr(md5(mt_rand()), 0, 5);
  $product_image = "ghs__".$random.".jpg";
  $image_tmp = $_FILES['product_image']['tmp_name'];
  $dir = "../products/";
  move_uploaded_file($image_tmp, $dir.$product_image);
  $product_name = trim($_POST['product_name']);
  $product_price = trim($_POST['product_price']);
  $product_description = trim($_POST['product_description']);
  $product_color = trim($_POST['product_color']);
  $product_type = trim($_POST['product_type']);
  $payment_type = trim($_POST['payment_type']);
  $delivery_type = trim($_POST['delivery_type']);
  $sql = "INSERT INTO products(product_name, product_image, product_price,product_description,product_color,product_type,payment_type,delivery_type) VALUES ('$product_name','$product_image','$product_price','$product_description','$product_color','$product_type','$payment_type','$delivery_type')";
  //echo $sql; exit();
  $query = $__DB__->__INSERT__($sql);
  if ($query) {
    echo json_encode(array(
      "message" => "Product Added !",
      "status" => true,
    ));
  }
}
if ($requestMethod === "GET") {
  $sql = "SELECT * FROM products";
  $query = $__DB__->__SELECT__($sql);
  echo json_encode($query);
}
?>