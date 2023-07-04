<?php
$token = "";
if (isset($_COOKIE["user_token"])) {
  $token = $_COOKIE["user_token"];
  $user_role = $_COOKIE["user_role"];
}
?>
<input type="text" id="token" value="<?php echo $token ?>" hidden="true">
<div class="nav-bar" id="nav">
  <h2 class="logo">Relax <span>Tea
  </span></h2>
  <a href="http://ghs.rf.gd/Relax-Tea/" class=""><i class="bi bi-house-door"></i></a>
  <?php
  if ($token || $user_role) {
    ?>
    <a href="http://ghs.rf.gd/Relax-Tea/pages/profile"><i class="bi bi-person-circle"></i></a>
    <?php
    if (! $user_role) {
      ?>
          <a href="http://ghs.rf.gd/Relax-Tea/pages/order-list"
      ><i class="bi bi-bag-check"></i></a>
      <a href="http://ghs.rf.gd/Relax-Tea/pages/cart" class="" title="Cart"
        ><i class="bi bi-cart"></i><small id="cart">0</small></a>
      <?php
    }
    ?>
    <?php
    if ($user_role) {
      ?>
      <a href="http://ghs.rf.gd/Relax-Tea/admin/add-product" class="" title="Cart"
        ><i class="bi bi-file-plus
          "></i></a>
      <a href="http://ghs.rf.gd/Relax-Tea/pages/notification"><i class="bi bi-bell"></i><small id="bell">0</small></a>
      <?php
    }
    ?>

    <a href="#" onclick="Logout()"> <i class="bi bi-box-arrow-right"></i></a>
    <?php
  } else {
    ?>
    <a href="http://ghs.rf.gd/Relax-Tea/pages/login"> <i class="bi bi-shield-lock"></i></a>
    <a href="http://ghs.rf.gd/Relax-Tea/pages/signup"> <i class="bi bi-person-plus"></i></a>
    <?php
  } ?>
  <a href="http://ghs.rf.gd/Relax-Tea/pages/about"><i class="bi bi-info-circle"></i></a>
  <a href="http://ghs.rf.gd/Relax-Tea/pages/contact"><i class="bi bi-telephone"></i></a>
  <a href="http://ghs.rf.gd/Relax-Tea/pages/project"><i class="bi bi-laptop"></i></a>
  <input type="search" placeholder="Search..." id="search" />
<button id="search-btn" type="search">
  <i class="bi bi-search"></i>
</button>

<span id="menu" onclick="__menu__()"> <i class="bi bi-list"></i></span>
</div>