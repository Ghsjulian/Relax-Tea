"use strict";
function __ghs(tag) {
  return document.querySelector(tag);
}
function __menu__() {
  var check = document.getElementById("mobile_menu").getAttribute("check");
  if (check === "0") {
    document.getElementById("mobile_menu").style.display = "block";
    document.getElementById("mobile_menu").setAttribute("check", "1");
  } else {
    document.getElementById("mobile_menu").style.display = "none";
    document.getElementById("mobile_menu").setAttribute("check", "0");
  }
}

function __changeBG__() {
  var background = [
    "1687085990836",
    "1687086024939",
    "1687086119230",
    "1687086239160",
    "1687086354512",
    "1687086425663",
    "tea",
    "t5",
    "t7",
    "t8",
    "t11",
    "tea111",
    "tea2222",
    "tea444",
    "tea555",
  ];
  var bgElement = __ghs(".home-section");
  var randomIndex = Math.floor(Math.random() * background.length);

  bgElement.style.backgroundImage =
    "url('assets/images/" + background[randomIndex] + ".jpg')";
}

function getCookie(cname) {
  var name = cname + "=";
  var ca = document.cookie.split(";");
  for (var i = 0; i < ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == " ") {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}
function notification() {
  var product_div = __ghs("#product_div");
  var formdata = new FormData();
  formdata.append("user_noti", "ghs");
  fetch(
    `http://ghs.rf.gd/Relax-Tea/API/server/functions/?user_noti=${getCookie(
      "user_token"
    )}`,
    {
      method: "GET",
    }
  )
    .then((res) => {
      return res.text();
    })
    .then((data) => {
      console.log(data);
    });
}
//  notification();
function AdminNoti() {
  fetch(
    `http://ghs.rf.gd/Relax-Tea/API/server/functions/index.php?admin_noti=__ghs_`
  )
    .then((res) => {
      return res.text();
    })
    .then((data) => {
      var bell = document.querySelectorAll("#bell");
      for (let index = 0; index < bell.length; index++) {
        bell[index].textContent = data;
      }
    });
}

function CartNoti() {
  fetch(
    `http://ghs.rf.gd/Relax-Tea/API/server/functions/index.php?cart_notification=_ghs_`
  )
    .then((res) => {
      return res.text();
    })
    .then((data) => {
      console.log(data);
      var cart = document.querySelectorAll("#cart");
      for (let index = 0; index < cart.length; index++) {
        cart[index].textContent = data;
      }
    });
}
setInterval(() => {
  AdminNoti();
  CartNoti();
}, 1000);

function deletCookie(cname, cvalue, exdays) {
  var d = new Date();
  d.setTime(d.getTime() + exdays * 24 * 60 * 60 * 1000);
  var expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function Logout() {
  if (getCookie("user_role") === "Admin_ghs") {
    deletCookie("user_role", "", "");
    deletCookie("user_token", "", "");
    window.location.href = "http://" + location.host + "/Relax-Tea/pages/login";
  } else {
    deletCookie("user_token", "", "");
    window.location.href = "http://" + location.host + "/Relax-Tea/pages/login";
  }
}
