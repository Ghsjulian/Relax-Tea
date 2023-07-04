<div id="mobile_menu" style="display: none" class="menu" check="0">
  <h3>Relax Tea</h3>
  <input type="search" placeholder="Search..." id="m_search" />
<button id="search_btn" type="search">
  <i class="bi bi-search"></i>
</button>
<li>
  <a href="http://ghs.rf.gd/Relax-Tea/"><i class="bi bi-house-door"></i>Home</a>
</li>
<?php
if ($token || $user_role) {
  ?>
  <li>
    <a href="http://ghs.rf.gd/Relax-Tea/pages/profile"><i class="bi bi-person-circle"></i>Profile</a>
  </li>
  <?php
  if (! $user_role) {
    ?>
      <li>
    <a href="http://ghs.rf.gd/Relax-Tea/pages/order-list"
      ><i class="bi bi-bag-check"></i>Order List</a>
  </li>
    <li>
      <a href="http://ghs.rf.gd/Relax-Tea/pages/cart"
        ><i class="bi bi-cart"></i>Cart<small id="cart">0</small></a>
    </li>
    <?php
  }
  ?>
  <?php
  if ($user_role) {
    ?>
    <li>
      <a href="http://ghs.rf.gd/Relax-Tea/admin/add-product" class="" title="Cart"
        ><i class="bi bi-file-plus
          "></i>Add Product</a>
    </li>
    <li>
      <a href="http://ghs.rf.gd/Relax-Tea/pages/notification"
        ><i class="bi bi-bell"></i>Notification<small id="bell">0</small></a>
    </li>
    <?php
  }
  ?>
  <li>
    <a href="#" onclick="Logout()"><i class="bi bi-box-arrow-right"></i>Logout</a>
  </li>
  <?php
} else {
  ?>
  <li>
    <a href="http://ghs.rf.gd/Relax-Tea/pages/login"><i class="bi bi-shield-lock"></i>Login</a>
  </li>
  <li>
    <a href="http://ghs.rf.gd/Relax-Tea/pages/signup"><i class="bi bi-person-plus"></i>Signup</a>
  </li>
  <?php
}
?>
<li>
  <a href="http://ghs.rf.gd/Relax-Tea/pages/about"><i class="bi bi-info-circle"></i>About</a>
</li>
<li>
  <a href="http://ghs.rf.gd/Relax-Tea/pages/contact"><i class="bi bi-telephone"></i>Contact</a>
</li>
<li>
  <a href="http://ghs.rf.gd/Relax-Tea/pages/project"><i class="bi bi-laptop"></i>Project</a>
</li>

</div>