<?php
if (isset($_COOKIE["user_role"])) {
  $user_role = $_COOKIE["user_role"];
  if ($user_role) {
    header('location:admin/index.php');
  }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <script src="assets/js/isCookie.js"></script>
  <meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="theme-color" content="#000000" />
<meta
name="description"
content="Web site created using create-react-app"
/>
<link rel="stylesheet" href="assets/css/App.css" />
<link rel="stylesheet" href="assets/css/Responsive.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
<title>Relax Tea
</title>
</head>
<body>
<noscript>You need href enable JavaScript href run this app.</noscript>
<div id="root">
<?php
include_once 'pages/header.php';
include_once 'pages/menu.php';
include_once 'pages/home.php';
?>
<script>
setInterval(() => {
__changeBG__();
}, 2000);
</script>
<?php
include_once 'pages/footer.php';
?>