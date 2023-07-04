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
<title>Confirm Order | Confirm This Order </title>
</head>
<body>
<div id="root">
<?php
include_once '../pages/header.php';
include_once '../pages/menu.php';
?>
<div class="main">
<h1 class="home-logo" id="productName">Confirm Order</h1>
<p id="productDetails">
You can confirm the order . If You want to confirm the order click on
confirm button . After confirming the order request The customer will
notified .
</p>
<input id="userToken" type="text" value="<?php echo $_GET['userToken']; ?>" hidden="true">
<input id="prdctID" type="text" value="<?php echo $_GET['productID']; ?>" hidden="true">
</div>
<div id="suc-message"></div>
<div id="view_details" class="contact-div">
<div class="col">
<img id="UserImage" src="../assets/images/ghs.pmg" />
</div>
<div class="col">
<li>
<i class="bi bi-person-circle"></i>User Name :
<span id="user_name"> Ghs Julian </span>
</li>
<li>
<i class="bi bi-envelope"></i>User Email :
<span id="user_email"> Email </span>
</li>
<li>
<i class="bi bi-card-text"></i>Product Name :
<span id="product_name"> </span>
</li>
<li>
<i class="bi bi-coin"></i>Product Price :
<span id="product_price"> Price </span>
</li>

<li>
<i class="bi bi-circle"></i>Product Color :
<span id="product_color"> Color </span>
</li>
<li>
<i class="bi bi-type"></i>Product Type :
<span id="product_type"> Type </span>
</li>
<li>
<i class="bi bi-bank"></i>Payment System :
<span id="payment_type"> Payment </span>
</li>
<li>
<i class="bi bi-house"></i>Delivery System :
<span id="delivery_type"> Delivery </span>
</li>

<li>
<i class="bi bi-telephone"></i>Contact : <span id="phone"> </span>
</li>
<li><i class="bi bi-geo"></i>Country : <span id="country"></span></li>
<li><i class="bi bi-geo-alt"></i>Region : <span id="region"> </span></li>
<li>
<i class="bi bi-pin-map"></i>District : <span id="district"><i>NULL</i> </span>
</li>
</div>
</div>
<div class="order-area">
<a id="order" onclick="AcceptOrder(<?php echo $_GET['productID']; ?>,'<?php echo $_GET['userToken']; ?>')" href="#"><i class="bi bi-bag-check"></i> Confirm Order</a>
<a
style="background: #ee6300"
id="order"
href="#"
onclick="RejectOrder(<?php echo $_GET['productID']; ?>,'<?php echo $_GET['userToken']; ?>')"
><i class="bi bi-trash"></i>Reject Order</a
>
</div>
<script>
function __ghs(tag) {
return document.querySelector(tag);
}
function CustomerInfo(cookie) {
var formdata = new FormData();
formdata.append("user_cookie", cookie);
fetch("http://ghs.rf.gd/API/server/functions/", {
method: "POST",
body: formdata,
})
.then((res) => {
return res.json();
})
.then((data) => {
__ghs("#user_name").textContent = data.user_name;
__ghs("#user_email").textContent = data.user_email;
__ghs("#phone").textContent = data.phone;
__ghs("#country").textContent = data.country;
__ghs("#region").textContent = data.region;
__ghs("#district").textContent = data.district;
__ghs("#UserImage").src = `http://${location.host}/API/server/user_avtar/`+data.avtar;
});
}

function ViewProduct(productID) {
var formdata = new FormData();
formdata.append("get_product", productID);
fetch("http://ghs.rf.gd/API/server/functions/index.php", {
method: "POST",
body: formdata,
})
.then((res) => {
return res.json();
})
.then((data) => {
console.log(data[0]);
__ghs("#product_name").textContent = data[0].product_name;
__ghs("#product_price").textContent = data[0].product_price;
__ghs("#product_color").textContent = data[0].product_color;
__ghs("#product_type").textContent = data[0].product_type;
__ghs("#payment_type").textContent = data[0].payment_type;
//__ghs("#productImage").src = "http://localhost:8000/API/server/products/" + data.product_image;
});
}

function RejectOrder(productID, token) {
var formdata = new FormData();
formdata.append("reject_order",
"REJECT_ORDER");
formdata.append("reject_id",
productID);
formdata.append("Customer_ID",
token);
fetch("http://ghs.rf.gd/API/server/functions/index.php",
{
method: "POST",
body: formdata,
})
.then((res) => {
return res.json();
})
.then((data) => {
var html = `
<div class="suc-message">
<i class="bi bi-check-circle"></i>${data.message}
</div>
`;
__ghs("#suc-message").innerHTML = html;
setTimeout(() => {
__ghs(".suc-message").style.display = "none";
}, 3000);
});
}
function AcceptOrder(productID, token) {
var formdata = new FormData();
formdata.append("Accept_Order",
"ACCEPT_ORDER");
formdata.append("product__id",
productID);
formdata.append("customer__id",
token);
fetch("http://ghs.rf.gd/API/server/functions/index.php",
{
method: "POST",
body: formdata,
})
.then((res) => {
return res.json();
})
.then((data) => {
var html = `
<div class="suc-message">
<i class="bi bi-check-circle"></i>${data.message}
</div>
`;
__ghs("#suc-message").innerHTML = html;
setTimeout(() => {
__ghs(".suc-message").style.display = "none";
}, 3000);
});
}

ViewProduct(<?php echo $_GET['productID']; ?>);
CustomerInfo('<?php echo $_GET['userToken']; ?>');


</script>
<script src="../assets/js/script.js"></script>
<?php
include_once '../pages/footer.php';
?>