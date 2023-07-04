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
<title>Update Product | Edit This Product</title>
</head>
<body>
<div id="root">
<?php
include_once '../pages/header.php';
include_once '../pages/menu.php';
?>
<div class="main">
<h1 class="home-logo">Edit Product</h1>
</div>
<div class="main">
<center>
<div class="col">
<div id="order-form" class="contact-form">
<form id="addProduct">
<img
id="preview"
style="display: none"
src="../assets/images/ghs.png"
/>
<div class="avtar">
<label for="product_image">
<i class="bi bi-camera"></i>
</label>
</div>
<input
style="display: none"
type="file"
name="product_image"
id="product_image"
accept="images/*"
onchange="loadFile(event)"
/>
<span class="message" style="display: none" id="message"></span>
<div id="suc-message">
</div>
<input
type="text"
placeholder="Enter Product Name"
id="product_name"
name="product_name"
/>
<input
type="text"
placeholder="Enter Product Price"
id="product_price"
name="product_price"
/>
<input
style="display: none"
type="text"
id="product_id"
name="product_id"
/>
<!--- NEW INPUT UPDATED ---->
<input
type="text"
placeholder="Enter Product Color"
id="product_color"
name="product_color"
/>
<input
type="text"
placeholder="Enter Product Type"
id="product_type"
name="product_type"
/>
<input
type="text"
placeholder="Enter Product Payment Type"
id="payment_type"
name="payment_type"
/>
<input
type="text"
placeholder="Enter Product Delivery Type"
id="delivery_type"
name="delivery_type"
/>
<!--- NEW INPUT UPDATED ---->
<textarea
type="text"
placeholder="Enter Product description"
id="product_description"
name="product_description"
></textarea>
<button
type="button"
id="update_btn"
name="contact-btn"
onclick="Updateproduct()"
>
Add Product
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
function Updateproduct() {
var product_name = __ghs("#product_name").value;
var product_price = __ghs("#product_price").value;
var product_description = __ghs("#product_description").value;
if (product_name == "") {
__ghs("#message").classList.add("error");
__ghs("#message").style.display = "block";
__ghs("#message").textContent = "Enter Product Name!";
} else if (product_price == "") {
__ghs("#message").classList.add("error");
__ghs("#message").style.display = "block";
__ghs("#message").textContent = "Enter Product Price!";
} else if (product_description == "") {
__ghs("#message").classList.add("error");
__ghs("#message").style.display = "block";
__ghs("#message").textContent = "Enter Product Description!";
} else {
var formdata = new FormData(__ghs("#addProduct"));
formdata.append("update_product", "UPDATE");
fetch("http://ghs.rf.gd/API/server/functions/updateProduct.php",
{
method: "POST",
body: formdata,
}
)
.then((res) => {
return res.json();
})
.then((data) => {
if (data) {
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
}
});
/*  __ghs("#message").classList.add("success");
          __ghs("#message").style.display = "block";
          __ghs("#message").textContent = "Everything Is Okay!";
          */
}
}
var loadFile = function (event) {
var output = document.getElementById("preview");
output.src = URL.createObjectURL(event.target.files[0]);
output.onload = function () {
URL.revokeObjectURL(output.src); // free memory
};
output.style.display = "block";
};
function Selectproducts() {
fetch("http://ghs.rf.gd/API/server/functions/?productID=<?php echo $_GET['productID']; ?>",
{
method: "GET",
})
.then((res) => {
return res.json();
})
.then((data) => {
__ghs("#product_id").value = data.product_id;
__ghs("#product_name").value = data.product_name;
__ghs("#product_image").src = data.product_image;
__ghs("#product_price").value = data.product_price;
__ghs("#product_description").value = data.product_description;
__ghs("#product_color").value = data.product_color;
__ghs("#product_type").value = data.product_type;
__ghs("#payment_type").value = data.payment_type;
__ghs("#delivery_type").value = data.delivery_type;
});
}
Selectproducts();


</script>
<script src="../assets/js/script.js"></script>

<script src="../assets/js/autoLoad.js"></script>

<?php
include_once '../pages/footer.php';
?>