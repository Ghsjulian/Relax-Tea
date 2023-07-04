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
<title>Admin Dashboard Page | Manage Your Bussiness </title>
</head>
<body>
<div id="root">
<?php
include_once '../pages/header.php';
include_once '../pages/menu.php';
?>
<div class="main">
<h1 class="home-logo">Admin Dashboard</h1>
<p>
Manage your business and customers . You can manage your business from
here . You can add new product , edit product , confirm orders , contact
with your customers and many more .
</p>
</div>
<center>
<div id="view_details" class="contact-div">
<div class="col">
<img src="../assets/images/tea.jpg" />
</div>
<div class="col">
<li>
Total Customers :
<span>167 peoples </span>
</li>
<li>
New Orders :
<span>17 </span>
</li>
<li>Total Product : <span>27 </span></li>
<li>Product Delivery :<span>13 </span></li>
<li>confirm Report :<span>6 </span></li>
</div>
</div>
</center>
<div class="main">
<h1 class="home-logo">Latest Products</h1>
<center>
<div id="suc-message">
</div>
<div id="product_area" class="order-list">
<!-- <div class="order--list">
            <img src="../../assets/images/t8.jpg" />
            <h4>Fresh Green Tea In Sylhet , Colorful Tea</h4>
            <a id="view" href="http://localhost:8000/Relax-Tea/pages/view"
              ><i class="bi bi-pencil"></i>Edit</a
            >
            <a
              style="background-color: #ff5528"
              id="order"
              href="http://localhost:8000/Relax-Tea/pages/cancel-order"
              ><i class="bi bi-trash"></i>Remove</a
            >
          </div>
          <div class="order--list">
            <img src="../../assets/images/tea.jpg" />
            <h4>Items two</h4>
            <a id="view" href="http://localhost:8000/Relax-Tea/pages/view"
              ><i class="bi bi-pencil"></i>Edit</a
            >
            <a
              style="background-color: #ff5528"
              id="order"
              href="http://localhost:8000/Relax-Tea/pages/cancel-order"
              ><i class="bi bi-trash"></i>Remove</a
            >
          </div>-->
</div>
</center>
</div>

<script>
function __ghs(tag) {
return document.querySelector(tag);
}
function Allproducts() {
var product = __ghs("#product_area");
fetch("http://ghs.rf.gd/API/server/functions/addProduct.php", {
method: "GET",
})
.then((res) => {
return res.json();
})
.then((data) => {
if (data.length > 0) {
for (let index = 0; index < data.length; index++) {
//console.log(data[index]);
var html = `<div id="${data[index].product_id}" class="order--list"><img src="http://${location.host}/Relax-Tea/API/server/products/${data[index].product_image}" /><h4>${data[index].product_name}</h4><a id="view"
href="http://${location.host}/Relax-Tea/pages/view?productID=${data[index].product_id}"><i
class="bi bi-eye"></i>View</a>
<a style="background-color: #ff5528" id="order" href="#" onclick="deleteProduct(${data[index].product_id})"><i class="bi
bi-trash"></i>Remove</a></div>`;

product.innerHTML += html;
}
}

});
}

Allproducts();
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
__ghs(productID).style.display = "none";
}, 3000);
})
}



</script>
<script src="../assets/js/script.js"></script>
<?php
include_once '../pages/footer.php';
?>