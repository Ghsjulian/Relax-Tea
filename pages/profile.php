<?php
if (isset($_COOKIE["user_token"])) {
  ?>
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
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css" />
<title>User Profile | Edit Your Profile</title>
</head>
<body>
<div id="root">
<?php
include_once 'header.php';
include_once 'menu.php';
?>
<center>
<div id="" class="order-list">
<div class="order--list">
<h1 class="home-logo">User Profile
</h1>
<img class="round" src="../assets/images/ghs.png" />
<h4 id="u_name">Smita Smith</h4><i id="pen-edit" class="bi bi-pencil"></i>
<div class="profile">
<h3>
<i class="bi bi-envelope"></i>Email :
<span id="userEmail">ghsjulian@gmail.com </span>
</h3>
<h3>
<i class="bi bi-telephone"></i>Phone :
<span id="userPhone">+88013*******7 </span>
</h3>
<h3><i class="bi bi-geo"></i>Country : <span id="userCountry"> </span></h3>
<h3><i class="bi bi-geo-alt"></i>City : <span id="userRegion"> </span></h3>
<h3>
<i class="bi bi-pin-map"></i>District :
<span id="userDistrict"> </span>
</h3>
</div>
</div>
</div>
</center>

<div class="main">
<div style="display: none" class="edit">
<i id="cross" class="bi bi-x"></i>
<center>
<div class="col">
<div id="order-form" class="contact-form">
<form id="UpdateInfo">
<div class="avtar">
<label for="avtar">
<i class="bi bi-camera"></i>
<!-- <img src="../assets/images/tea.jpg" />-->
</label>
</div>
<input
style="display: none"
type="file"
name="avtar"
id="avtar"
accept="images/*"
/>
<span class="message" style="display: none" id="message"></span>
<input
type="text"
placeholder="Enter Country"
id="country"
name="country"
value="Bangladesh"
/>
<input
type="text"
placeholder="Enter Region"
id="region"
name="region"
/>
<input
type="text"
placeholder="Enter District"
id="district"
name="district"
/>
<input
type="number"
placeholder="Enter Phone Number"
id="phone"
name="phone"
/>
<button
type="button"
id="update_btn"
name="contact-btn"
onclick="UpdateInfo()"
>
Update Info
</button>
</form>
</div>
</div>
</center>
</div>
</div>
<script>
function __ghs(tag) {
return document.querySelector(tag);
}
__ghs(".bi-pencil").onclick = (e) => {
e.preventDefault();
__ghs(".order-list").style.display = "none";
__ghs(".edit").style.display = "block";
};
__ghs(".bi-x").onclick = (e) => {
e.preventDefault();
__ghs(".order-list").style.display = "block";
__ghs(".edit").style.display = "none";
};
function UpdateInfo() {
var country = __ghs("#country").value;
var region = __ghs("#region").value;
var district = __ghs("#district").value;
var phone = __ghs("#phone").value;
if (country == "") {
__ghs("#message").classList.add("error");
__ghs("#message").style.display = "block";
__ghs("#message").textContent = "Enter Country Name!";
} else if (region == "") {
__ghs("#message").classList.add("error");
__ghs("#message").style.display = "block";
__ghs("#message").textContent = "Enter Your Region!";
} else if (district == "") {
__ghs("#message").classList.add("error");
__ghs("#message").style.display = "block";
__ghs("#message").textContent = "Enter Your District!";
} else if (phone == "") {
__ghs("#message").classList.add("error");
__ghs("#message").style.display = "block";
__ghs("#message").textContent = "Enter Your Phone!";
} else {
var formdata = new FormData(__ghs("#UpdateInfo"));
formdata.append("profile_update", "USER_PROFILE_UPDATE");
fetch("http://ghs.rf.gd/API/server/functions/index.php", {
method: "POST",
body: formdata,
})
.then((res) => {
return res.json();
})
.then((data) => {
if (data.status) {
window.location.href = `http://${location.host}/Relax-Tea/pages/profile`;
}
});
}
}
function FetchInfo(cookie) {
var formdata = new FormData();
formdata.append("user_cookie",
cookie);
fetch("http://ghs.rf.gd/API/server/functions/index.php",
{
method: "POST",
body: formdata,
})
.then((res) => {
return res.json();
})
.then((data) => {
__ghs("#country").value = data.country;
__ghs("#region").value = data.region;
__ghs("#district").value = data.district;
__ghs("#phone").value = data.phone;
/*
*
*/
__ghs(".round").src = `http://${location.host}/Relax-Tea/API/server/user_avtar/`+data.avtar;
__ghs("#u_name").textContent = data.user_name;
__ghs("#userEmail").textContent = data.user_email;
__ghs("#userCountry").textContent = data.country;
__ghs("#userRegion").textContent = data.region;
__ghs("#userDistrict").textContent = data.district;
__ghs("#userPhone").textContent = data.phone;
});
}
FetchInfo('<?php echo $_COOKIE["user_token"]; ?>');
</script>
<script src="../assets/js/script.js"></script>
<?php
include_once 'footer.php';
} else {
header('location:http://ghs.rf.gd/Relax-Tea/pages/login');
}
?>