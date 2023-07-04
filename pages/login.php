<?php
if (isset($_COOKIE["user_token"])) {
  header('location:http://ghs.rf.gd/Relax-Tea');
} else {
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
<script src="../assets/js/cookie.js"></script>
<link rel="stylesheet" href="../assets/css/login_sign_up.css" />
<link rel="stylesheet" href="../assets/css/Responsive.css" />

<title>Login To Your Account | Sign IN Now</title>
</head>
<body>
<div id="root">
<div class="login_area">
<h2>Please Login</h2>
<center>
<strong id="message" class=""> </strong>
<form id="login_form" action="" method="POST">
<input
type="text"
name="user_name"
id="user_name"
placeholder="Enter User Name"
/>
<input
type="password"
name="user_password"
id="user_password"
placeholder="Enter Password"
/>
<button type="submit" id="_login_btn">Login Now</button>
<br />
<span>Don't Have An Account ? <a href="signup">SignUp</a></span>
</form>
</center>
<script type="text/javascript">
function __ghs(tag) {
return document.querySelector(tag);
}
__ghs("#_login_btn").onclick = (e) => {
e.preventDefault();
var form_data = new FormData(__ghs("#login_form"));
var u_name = __ghs("#user_name").value;
var u_pass = __ghs("#user_password").value;
__ghs("#_login_btn").textContent = "Proccessing...";
//console.log(u_name + "    " + u_pass);

setTimeout(() => {
if (!u_name && !u_pass) {
__ghs("#message ").classList.add("error");
__ghs("#message").textContent = "Please Enter Login Info";
/*
__ghs("#message ").classList.add("success");
__ghs("#message").textContent = u_name + "  " + u_pass;
*/
} else {
fetch("http://ghs.rf.gd/API/server/login/index.php", {
method: "POST",
body: new FormData(__ghs("#login_form")),
})
.then((res) => {
return res.json();
})
.then((data) => {
console.log(data);
if (data.status) {
setCookie("user_token", data.token, 365);
__ghs("#message ").classList.add("success");
__ghs("#message").textContent = data.message;
if (data.user_role === "Admin_ghs") {
window.location.href = "http://"+location.host+"/Relax-Tea/admin/index.php";
} else {
window.location.href = "http://"+location.host+"/Relax-Tea";
}
} else {
__ghs("#message ").classList.add("error");
__ghs("#message").textContent = data.message;
}
});
}
__ghs("#_login_btn").textContent = "Login Now";
}, 3000);
};
/*     localStorage.setItem("lastname", "Smith");
          localStorage.getItem("lastname");*/
/*      sessionStorage.setItem("name", ["data", "something"]);
   var ss = sessionStorage.getItem("name");
 */

</script>
</div>
</div>
</body>
</html>
<?php
}
?>