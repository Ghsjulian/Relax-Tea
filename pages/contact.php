<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1" />
<meta name="theme-color" content="#000000" />
<meta
name="description"
content="Web site created using create-react-app"
/>
<link rel="stylesheet" href="../assets/css/App.css" />
<link rel="stylesheet" href="../assets/css/Responsive.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css"/>
<title>Contact With Us | You Can Contact With Us Anytime</title>
</head>
<body>
<div id="root">
<?php
include_once 'header.php';
include_once 'menu.php';
?>
<div class="main">
<p>
You can always and anytime contact with us . Here we've dropped our
contact details so that you can able contact with us . You can also
find us on social medias . After contacting with us you'll know more
about myself . Thank You !
</p>
</div>
<center><h1 class="contact-h1">Contact Address</h1></center>
<div class="contact-div">
<div class="col">
<li>
<i class="bi bi-person-circle"></i>Name : <span>Ghs Julian </span>
</li>
<li>
<i class="bi bi-envelope"></i>Email :
<span>ghsjulian@gmail.com </span>
</li>
<li>
<i class="bi bi-telephone"></i>Phone : <span>+88013*******7 </span>
</li>
<li>
<i class="bi bi-globe"></i>Website :<span
>ghsjulian.netlify.app
</span>
</li>
<li>
<i class="bi bi-facebook"></i> Facebook :
<span>fb/ghs.julian.80/ </span>
</li>
<li><i class="bi bi-geo"></i>Country : <span>Bangladesh </span></li>
<li><i class="bi bi-geo-alt"></i>City : <span>Sylhet </span></li>
<li>
<i class="bi bi-pin-map"></i>District : <span><i>NULL</i> </span>
</li>
</div>
<div class="col">
<div class="contact-form">
<input type="text" placeholder="Enter Name" id="name" name="name" />
<input
type="email"
placeholder="Enter Email"
id="email"
name="email"
/>
<textarea
type="text"
placeholder="Write Message"
id="message"
name="message"
></textarea>
<button type="button" id="btn" name="contact-btn">Contact</button>
</div>
</div>
</div>
</div>
<script src="../assets/js/script.js"></script>
<?php
include_once 'footer.php';
?>