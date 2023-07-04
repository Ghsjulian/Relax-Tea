<div class="home-section">
  <h2 class="home-logo">Relax Tea</h2>
  <p>
    We serve fresh tea all around Bangladesh . Our product is pretty good
    and we deliver soon our product . To buy anyone just order now .
  </p>
</div>
<div id="product_div" class="row">
</div>
<script>
  function __ghs(tag) {
    return document.querySelector(tag);
  }
  function Allproducts() {
    var product_div = __ghs("#product_div");
    fetch("http://ghs.rf.gd/Relax-Tea/API/server/functions/addProduct.php", {
      method: "GET",
    })
    .then((res) => {
      return res.text();
    })
    .then((data) => {
      if (data.length > 0) {
        for (let index = 0; index < data.length; index++) {
          var html = `
          <div class="column">
          <img src="http://${location.host}/Relax-Tea/API/server/products/${data[index].product_image}" />
          <h3>${data[index].product_name}</h3>
          <a id="view" href="http://${location.host}/Relax-Tea/pages/view?productID=${data[index].product_id}">View Product</a>
          <a id="order" href="http://${location.host}/Relax-Tea/pages/order?productID=${data[index].product_id}">Order Now</a>
          </div>
          `;
          product_div.innerHTML += html;
        }
      }
    });
  }
  Allproducts();
</script>