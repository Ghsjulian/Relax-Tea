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
<title>View Product Details | Before Place An Order Read The Product Descriptions</title>
</head>
<body>
<div id="root">
<?php
include_once 'header.php';
include_once 'menu.php';
?>
<div class="main">
<h1 class="home-logo" id="productName">View Products</h1>
<p id="productDetails">
This Product is new in the market and very popular. To buy this
product order now.
</p>
</div>
<div id="suc-message">
</div>
<div id="view_details" class="contact-div">
<div class="col">
<img id="productImage" src="" />
</div>
<div class="col">
<li>
<i class="bi bi-card-text"></i>Product Name : <span id="product_name">  </span>
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
<i class="bi bi-telephone"></i>Contact : <span> </span>
</li>
<li>
<i class="bi bi-globe"></i>Website :<span
>ghsjulian.netlify.app
</span>
</li>

<li><i class="bi bi-geo"></i>Country : <span> </span></li>
<li><i class="bi bi-geo-alt"></i>City : <span> </span></li>
<li>
<i class="bi bi-pin-map"></i>District : <span><i></i> </span>
</li>
</div>
</div>
<div class="order-area">
<?php
if ($user_role) {
?>
<a id="order" href="http://ghs.rf.gd/Relax-Tea/admin/update-product?productID=<?php echo $_GET['productID']; ?>"><i class="bi bi-pencil"></i> Edit</a>
<a style="background: #ee6300" id="order" href="#"
onclick="deleteProduct(<?php echo $_GET['productID']; ?>)"><i class="bi bi-trash"></i>Remove</a
>
<?php
} else {
?>
<a id="order" href="http://ghs.rf.gd/Relax-Tea/pages/order?productID=<?php echo $_GET['productID']; ?>"><i class="bi bi-hand-index"></i> Order Now</a>
<a style="background: #ee6300" id="order"
onclick="AddCart(<?php echo $_GET['productID']; ?>,'<?php echo $token; ?>')"><i class="bi bi-cart-plus"></i>Add Cart</a>
<a id="view" href="http://ghs.rf.gd/Relax-Tea/pages/contact"><i class="bi bi-telephone"></i>Contact</a>
<?php
}
?>
</div>
<script>
function deleteProduct (productID) {
var formdata = new FormData();
formdata.append("deletID",
productID)
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
window.location.href = `http://${location.host}/Relax-Tea/admin/index.php`;
}, 3000);
})
}
function AddCart(productID, token) {
if (token) {
var formdata = new FormData();
formdata.append("cartID",
productID)
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
window.location.href = `http://${location.host}/Relax-Tea/pages/cart`;
}, 3000);
})
} else {
window.location.href = `http://${location.host}/Relax-Tea/pages/login`;
}
}
/*
*
*  FETCHING PRODUCTS INFO
*
*/
function ProductInfo(productID) {
var formdata = new FormData();
formdata.append("view_product", productID);
fetch("http://ghs.rf.gd/API/server/functions/index.php", {
method: "POST",
body: formdata,
})
.then((res) => {
return res.json();
})
.then((data) => {
__ghs("#productName").textContent = data.product_name;
__ghs("#product_name").textContent = data.product_name;
__ghs("#productImage").src = "http://"+location.host+"/Relax-Tea/API/server/products/"+data.product_image;
__ghs("#product_price").textContent = data.product_price;
__ghs("#productDetails").textContent = data.product_description;
__ghs("#product_color").textContent = data.product_color;
__ghs("#product_type").textContent = data.product_type;
__ghs("#payment_type").textContent = data.payment_type;
__ghs("#delivery_type").textContent = data.delivery_type;
});
}
ProductInfo(<?php echo $_GET['productID']; ?>);

</script>
<script src="../assets/js/script.js"></script>
<?php
include_once 'footer.php';
?>