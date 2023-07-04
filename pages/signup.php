<?php
if (!isset($_COOKIE["user_token"])) {
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
<link rel="stylesheet" href="../assets/css/login_sign_up.css" />
<link rel="stylesheet" href="../assets/css/Responsive.css" />

<title>Signup | Create An Account</title>
</head>
<body>
<div id="root">
<div class="login_area">
<h2>Create An Account</h2>
<center>
<strong id="message" class=""></strong>
<form id="login_form" action="" method="POST">
<input
type="text"
name="username"
id="user_name"
placeholder="Enter User Name"
/>
<input
type="email"
name="useremail"
id="user_email"
placeholder="Enter User Email"
/>
<input
type="password"
name="userpassword"
id="user_password"
placeholder="Enter Password"
/>
<button type="submit" id="_signup_btn">Signup Now</button>
<br />
<span>Already Have An Account ? <a href="login">Login</a></span>
</form>
</center>
</div>
<script>
function __ghs(tag) {
return document.querySelector(tag);
}

function setCookie(cname, cvalue, exdays) {
var d = new Date();
d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
var expires = "expires=" + d.toUTCString();
document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

__ghs("#_signup_btn").addEventListener("click", (e)=> {
e.preventDefault();
var form_data = new FormData(__ghs("#login_form"));
form_data.append("action", "signup");
var u_name = __ghs("#user_name").value;
var u_email = __ghs("#user_email").value;
var u_pass = __ghs("#user_password").value;
__ghs("#_signup_btn").textContent = "Proccessing...";
setTimeout(() => {
if (!u_name && !u_pass && !u_email) {
__ghs("#message ").classList.add("error");
__ghs("#message").textContent = "Please Enter Fill Out This Form";
} else {
fetch("http://ghs.rf.gd/API/server/signup/index.php", {
method: "POST", body: new FormData(__ghs("#login_form")),
})
.then((res) => {
return res.json();
})
.then((data) => {
__ghs("#login_form").reset();
if (data.status) {
setCookie("user_token", data.token, 365);
__ghs("#message ").classList.add("success");
__ghs("#message").textContent = data.message;
window.location.href = "http://"+location.host+"/Relax-Tea/";
} else {
__ghs("#message ").classList.add("error");
__ghs("#message").textContent = data.message;
}
});
}
__ghs("#_signup_btn").textContent = "Signup Now";
},
2000);
});
</script>
</div>
</body>
</html>
<?php
} else {
header('location:http://localhost:8000/Relax-Tea');
}
?>