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
<title>Order List | View Your Order List</title>
</head>
<body>

<div id="root">
<?php
include_once 'header.php';
include_once 'menu.php';
?>
<div class="main">
<h1 class="home-logo">Order List</h1>
<p>
The Product Which You Have Ordered
</p>
</div>
<center>
<div id="suc-message"></div>
<div id="" class="order-list">
<!---->
</div>
</center>
<script>
function GetProduct(cookie) {
var formdata = new FormData();
formdata.append("u__cookie", cookie);
formdata.append("view_orderList",
"_ghs");
fetch("http://ghs.rf.gd/API/server/functions/index.php",
{
method: "POST",
body: formdata,
})
.then((res) => {
return res.json();
})
.then((data) => {
if (data.length > 1) {
for (let i = 0; i < data.length; i++) {
Product(data[i].product_id, cookie);
}
} else {
Product(data[0].product_id, cookie);
}
});
}
function Product(productID,
cookie) {
var order_list = __ghs(".order-list");
var formdata = new FormData();
formdata.append("get_product",
productID);
fetch("http://ghs.rf.gd/API/server/functions/index.php",
{
method: "POST",
body: formdata,
})
.then((res) => {
return res.json();
})
.then((data) => {
//alert(data);

var html = `<div class="order--list"><img src="http://${location.host}/Relax-Tea/API/server/products/${data[0].product_image}" /><h4 id="productName">${data[0].product_name}</h4><a id="view"
href="http://${location.host}/Relax-Tea/pages/view?productID=${data[0].product_id}"><i class="bi bi-eye"></i>View Details</a><a id="order" onclick="CancleOrder(${data[0].product_id},'${cookie}')" href="#"><i class="bi
bi-trash"></i>Cancel Order</a></div>`;
order_list.innerHTML += html;
});
}
function CancleOrder(productID,
token) {
var formdata = new FormData();
formdata.append("cancel_order",
"REMOVE_CART");
formdata.append("remove_id",
productID);
formdata.append("userCookie",
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


GetProduct('<?php echo$token; ?>');
</script>
<script src="../assets/js/script.js"></script>
<?php
include_once 'footer.php';
} else {
header('location:http://localhost:8000/Relax-Tea/pages/login');
}
?>