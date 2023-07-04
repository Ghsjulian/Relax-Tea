"use strict";
function __ghs(tag) {
  return document.querySelector(tag);
}
//  notification();
function AdminNoti() {
  fetch(`http://ghs.rf.gd/Relax-Tea/API/server/functions/?admin_noti=__ghs_`)
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
setInterval(() => {
  AdminNoti();
}, 1000);
