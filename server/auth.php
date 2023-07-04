<?php
session_start();
require_once '__DB__.php';
$db = new __database__();


function __Cookie__($user_id) {
  $enc_id = "__ghs__".$user_id;
  setcookie("user_id", $enc_id, time()+30*24*60*60, "/");
}

function ifAdmin($cookie) {
  $sql = "SELECT * FROM users WHERE token='$cookie'";
  //$res = mysqli_query($db->conn, $sql);
  return $db->__cheak__();
}

function __CheakLogin__($cookie) {
  return $sql = "SELECT * FROM users WHERE user_id='$cookie'";
  exit ();
  $query = $db->__SELECT__($sql);
  if ($query) {
    __Cookie__($query[0]['user_id']);
    $_SESSION['user_info'] = $query;
    return true;
  }
}


?>