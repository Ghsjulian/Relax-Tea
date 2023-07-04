<?php
function __HandleLogin__($name, $password, $_db_) {
  $user_name = trim($name);
  $user_pass = trim($password);
  $enc_password = sha1($user_pass);
  if ($name && $password) {
    $sql = "SELECT user_name,user_password FROM users WHERE user_name='$user_name' AND user_password='$enc_password'";
    $query = $_db_->__LOGIN__($sql);
    if ($query) {
      return true;
    } else {
      return 0;
    }
  }
}



function _setCookie($cookie) {
  //$enc_id = "__ghs__".$user_id;
  setcookie("user_role", $cookie, time()+30*24*60*60, "/");
  return true;
}


?>