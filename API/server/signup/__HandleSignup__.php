<?php
require_once 'auth.php';
function __HandleSignup__($data, $_db_) {
  $user_name = trim($data['user_name']);
  $user_email = trim($data['user_email']);
  $user_pass = trim($data['user_password']);
  $token = Token();
  $enc_password = sha1($user_pass);
  if ($user_name && $user_pass) {
    $sql = "INSERT INTO users (user_name,user_email,user_password,token) VALUES('$user_name','$user_email','$enc_password','$token')";
    $query = $_db_->__SIGNUP__($sql);
    if ($query) {
      return true;
    } else {
      return 0;
    }
  }



}





?>