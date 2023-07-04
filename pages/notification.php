<?php
if (isset($_COOKIE["user_token"])) {
  $token = $_COOKIE["user_token"];
  $admin = $_COOKIE["user_role"];
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
<title>
<?php
if ($admin) {
echo "Admin Notification | View Notification";
} else {
echo "Customers Notification | View Notification";
}
?>
</title>
</head>
<body>
<div id="root">
<?php
include_once '../pages/header.php';
include_once '../pages/menu.php';
?>
<div class="main">
<h1 class="home-logo">
<?php
if ($admin) {
echo "Admin Notification";
} else {
echo "Customers Notification";
}
?>
</h1>
</div>
<center>
<div id="" class="order-list">
<div id="suc-message">
</div>
</div>
</center>
<script>
function __ghs(tag) {
return document.querySelector(tag);
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
function GetProducts(ProductID, token) {
var order_list = __ghs(".order-list");
var formdata = new FormData();
formdata.append("GetProducts", "GET PRODUCT");
formdata.append("prdct_id", ProductID);
fetch("http://ghs.rf.gd/API/server/functions/index.php", {
method: "POST",
body: formdata,
})
.then((res) => {
return res.json();
})
.then((data) => {
var html = `
<div class="order--list">
<div class="f_lex">
<img src="http://${location.host}/Relax-Tea/API/server/products/${data.product_image}" />
<h4>${data.product_name}</h4>
</div>
<a id="view" href="http://${location.host}/Relax-Tea/admin/confirm-order?productID=${data.product_id}&userToken=${token}"><i class="bi bi-eye"></i>View Details</a>
<a id="order" href="#" onclick="RejectOrder(${data.product_id},'${token}')"><i class="bi bi-trash"></i>Reject Order</a>
</div>`;
order_list.innerHTML += html;
});
}
function ViewOrder() {
var formdata = new FormData();
formdata.append("view_order", "VIEW ORDER");
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
GetProducts(data[i].product_id, data[i].user_token);
}
} else {
GetProducts(data[0].product_id, data[0].user_token);
}
});
}
ViewOrder();
</script>
<script src="../assets/js/script.js"></script>
<?php
include_once '../pages/footer.php';
} else {
header('location:http://ghs.rf.gd/Relax-Tea/pages/login');
}
?>