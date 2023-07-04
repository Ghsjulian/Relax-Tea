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
<title>Order Now | Enter Your Contact Info To Order This Product</title>
</head>
<body>
<div id="root">
<?php
include_once 'header.php';
include_once 'menu.php';
?>
<div class="main">
<h1 class="home-logo">Order Now</h1>
<p>
Enter Your Correct Address And Location. So That We Can Contact With
You And Delivery Your Product Soon . Fill Out This Order Form
</p>
<div id="suc-message">
</div>
</div>
<center><h1 id="adrs">Enter Address</h1></center>
<div id="view_details" class="contact-div">
<center>
<div class="col">
<div id="order-form" class="contact-form">
<form id="order_form" name="order_form">
<span id="message"></span>
<input type="text" id="token" value="<?php echo $token ?>" hidden="true">
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
<button type="button" id="btn" name="contact-btn" onclick="Order()">
Place Order
</button>
</form>
</div>
</div>
</center>
</div>
<script>
function __ghs(tag) {
return document.querySelector(tag);
}
window.onload = ()=> {
var token = __ghs("#token").value;
FetchInfo(token);
}

function Order() {
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
__ghs("#message").textContent = "Enter Your District Name!";
} else if (phone == "") {
__ghs("#message").classList.add("error");
__ghs("#message").style.display = "block";
__ghs("#message").textContent = "Enter Your Phone Number!";
}

if (country && region && district && phone) {
var formdata = new FormData(__ghs("#order_form"));
formdata.append("order_product", "ORDER");
formdata.append("product_id", <?php echo $_GET['productID']; ?>);
fetch("http://ghs.rf.gd/API/server/functions/index.php", {
method: "POST",
body: formdata,
})
.then((res) => {
return res.json();
})
.then((data) => {
__ghs("#order_form").reset();
var html = `
<div class="suc-message">
<i class="bi bi-check-circle"></i>${data.message}
</div>
`;
__ghs("#suc-message").innerHTML = html;
setTimeout(() => {
__ghs(".suc-message").style.display = "none";
window.location.href = `http://${location.host}/Relax-Tea/pages/order-list`;
}, 3000);
});
}
}
function FetchInfo(cookie) {
var formdata = new FormData();
formdata.append("user_cookie", cookie);
fetch("http://ghs.rf.gd/API/server/functions/index.php", {
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

});
}

</script>
<script src="../assets/js/script.js"></script>

<?php
include_once 'footer.php';
} else {
header('location:http://ghs.rf.gd/Relax-Tea/pages/login');
}
?>