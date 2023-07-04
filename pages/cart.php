<?php
if (isset($_COOKIE["user_token"])) {
  $token = $_COOKIE["user_token"];
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
<title>Product Cart Page | The Product Which You Have Ordered</title>
</head>
<body>
<div id="root">
<?php
include_once 'header.php';
include_once 'menu.php';
?>

<div class="main">
<h1 class="home-logo">Cart List</h1>
<div id="suc-message">
</div>
<p id="err">
The Product Which You Have Ordered
</p>
</div>
<center>
<div id="" class="order-list">
<!---->
</div>
</center>
</div>
<script>
function __ghs(tag) {
return document.querySelector(tag);
}
function ViewProduct(cookie) {
var formdata = new FormData();
formdata.append("view_cart", cookie);
fetch("http://ghs.rf.gd/API/server/functions/index.php", {
method: "POST",
body: formdata,
})
.then((res) => {
return res.json();
})
.then((data) => {
if (data.length > 1) {
for (let i = 0; i < data.length; i++) {
GetProduct(data[i].product_id, cookie);
}
} else {
GetProduct(data[0].product_id, cookie);
}
})
.catch ((error)=> {
__ghs("#err").textContent = "Your Cart List Is Empty Now . Please Add A Product In Your Cart List ."
__ghs(".order-list").innerHTML = `
<div class="order--list">
<h4>You Don't Have Any Product Yet .</h4>
</div>
`;
})
}
function GetProduct(productID,
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
var html = `<div class="order--list"><img src="http://${location.host}/Relax-Tea/API/server/products/${data[0].product_image}" /><h4 id="productName">${data[0].product_name}</h4><a id="view"
href="http://${location.host}/Relax-Tea/pages/view?productID=${data[0].product_id}"><i class="bi bi-eye"></i>View Details</a><a id="order" onclick="RemoveCart(${data[0].product_id},'${cookie}')" href="#"><i
class="bi
bi-trash"></i>Remove Cart</a></div>`;
order_list.innerHTML += html;
});
}

function RemoveCart(productID,
token) {
var formdata = new FormData();
formdata.append("remove_cart",
"REMOVE_CART");
formdata.append("remove_id",
productID);
formdata.append("userCookie",
token);
fetch("http://ghs.rf.gd/Relax-Tea/API/server/functions/index.php",
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

ViewProduct('<?php echo $token; ?>');
</script>
<script src="../assets/js/script.js"></script>
<?php
include_once 'footer.php';
} else {
header('location:http://ghs.rf.gd/Relax-Tea/pages/login');
}
?>