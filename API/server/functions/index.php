<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: OPTIONS,GET,POST,PUT,DELETE");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
/*===================================*/
require_once '../database/__DB__.php';
$message = "";
$status = "";
$token = "";
$user_role = "";
$u_Cookie = $_COOKIE["user_token"];
$user_cookie = null;
$__DB__ = new __database__();
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$requestMethod = $_SERVER["REQUEST_METHOD"];
if (isset($_COOKIE["user_token"])) {
  $user_token = $_COOKIE["user_token"];
  $user_cookie = $_COOKIE["user_token"];
}
/*
*
* ADMIN NOTIFICATION
*
*/
if (isset($_GET['admin_noti'])) {
  $user_role = $_COOKIE["user_role"];
  $u_token = $_COOKIE["user_token"];
  if ($user_role) {
    $sql = "SELECT * FROM notification";
    $query = $__DB__->__SELECT__($sql);
    if ($query) {
      echo count($query);
    } else {
      echo "0";
    }
  } else {
    $u_sql = "SELECT * FROM user_noti WHERE user_token='$u_token'";
    $u_query = $__DB__->__SELECT__($u_sql);
    if ($u_query) {
      echo count($u_query);
    } else {
      echo "0";
    }
  }
}




if (isset($_GET['productID'])) {
  $product_id = $_GET['productID'];
  $sql = "SELECT * FROM products WHERE product_id='$product_id'";
  $query = $__DB__->SelectSingle($sql);
  echo json_encode($query);
}


/*
*
* DELETING PRODUCT
*
*/
if (isset($_POST['deletID'])) {
  $product_id = $_POST['deletID'];
  $sql = "DELETE FROM products WHERE product_id='$product_id'";
  if ($__DB__->_Delete($sql)) {
    echo json_encode(array(
      "status" => true,
      "message" => "Product Deleted Successfully",
    ));
  }
}
/*
*
*  FETCH PRODUCT
*
*/

if (isset($_POST['fetch_product'])) {
  $product_id = $_POST['deletID'];
  $sql = "SELECT FROM products WHERE product_id='$product_id'";
  $query = $__DB__->SelectSingle($sql);
  echo json_encode($query);
}
/*
*
* ADD TO CART
*
*/
if (isset($_POST['cartID'])) {
  $product_id = $_POST['cartID'];
  $sql = "INSERT INTO cart (product_id,user_token)VALUES('$product_id','$user_token')";
  if ($__DB__->__INSERT__($sql)) {
    echo json_encode(array(
      "status" => true,
      "message" => "Product Added To The Cart Successfully",
    ));
  }

}

if (isset($_POST['order_product'])) {
  $product_id = $_POST['product_id'];
  $country = $_POST['country'];
  $region = trim($_POST['region']);
  $district = trim($_POST['district']);
  $phone = trim($_POST['phone']);
  $sql = "INSERT INTO `order`(`product_id`, `country`, `region`, `district`, `phone`, `user_token`) VALUES
  ('$product_id','$country','$region','$district','$phone','$user_token')";
  if ($__DB__->__INSERT__($sql)) {
    $update_info = "UPDATE users SET country='$country',region='$region',district='$district',phone='$phone'";
    if ($__DB__->__INSERT__($update_info)) {
      $noti = "INSERT INTO notification (notification,user_token,product_id)VALUES('New Order ','$user_token','$product_id')";
      if ($__DB__->__INSERT__($noti)) {
        echo json_encode(array(
          "status" => true,
          "message" => "Ordered Successfully",
        ));
      }
    }
  }
}

if (isset($_POST['user_cookie'])) {
  $cookie = $_POST['user_cookie'];
  $sql = "SELECT * FROM users WHERE token='$cookie'";
  $query = $__DB__->SelectInfo($sql);
  echo json_encode($query);
}

if (isset($_POST['view_product'])) {
  $product_id = $_POST['view_product'];
  $sql = "SELECT * FROM products WHERE product_id='$product_id'";
  $query = $__DB__->SelectSingle($sql);
  echo json_encode($query);
}
/*
*
*   SLECT CART PRODUCT
*
*/
function FetchProduct ($productID) {
  $sql = "SELECT * FROM products WHERE product_id='$product_id'";
  $query = $__DB__->__SELECT__($sql);
  return $query;
}

if (isset($_POST['view_cart'])) {
  $cookie = $_POST['view_cart'];
  $sql = "SELECT * FROM cart WHERE user_token='$cookie'";
  $query = $__DB__->__SELECT__($sql);
  echo json_encode($query);
}

if (isset($_POST['get_product'])) {
  $product_id = $_POST['get_product'];
  $sql = "SELECT * FROM products WHERE product_id='$product_id'";
  $query = $__DB__->__SELECT__($sql);
  echo json_encode($query);
}
/*
* REMOVE PRODUCTS FROM CART
*
**/
if (isset($_POST['remove_cart'])) {
  $product_id = $_POST['remove_id'];
  $user_cookie = $_POST['userCookie'];
  $sql = "DELETE FROM cart WHERE user_token='$user_cookie'";
  if ($__DB__->_Delete($sql)) {
    echo json_encode(array(
      "status" => true,
      "message" => "Product Removed Successfully",
    ));
  }
}

/*
*
* CONFIRM ORDER REQUEST
*
*/
if (isset($_POST['confirm_order'])) {
  $product_id = $_POST['request_id'];
  $sql = "SELECT * FROM products WHERE product_id='$product_id'";
  $query = $__DB__->__SELECT__($sql);
  echo json_encode($query);
}

/*
*
* VIEW ORDERS
*
*/
if (isset($_POST['view_order'])) {
  $sql = "SELECT `order_id`, `product_id`, `country`, `region`, `district`, `phone`, `user_token` FROM `order`";
  $query = $__DB__->__SELECT__($sql);
  echo json_encode($query);
}

if (isset($_POST['GetProducts'])) {
  $product_id = $_POST['prdct_id'];
  $sql = "SELECT * FROM products WHERE product_id='$product_id'";
  $query = $__DB__->SelectSingle($sql);
  echo json_encode($query);
}

if (isset($_POST['reject_order'])) {
  $product_id = $_POST['reject_id'];
  $token = $_POST['Customer_ID'];
  $sql = "DELETE FROM `order` WHERE `product_id`='$product_id' and `user_token`='$token'";
  //  echo $sql; exit();
  if ($__DB__->_Delete($sql)) {
    $delete_noti = "DELETE FROM `notification` WHERE `product_id`='$product_id' and `user_token`='$token'";
    if ($__DB__->_Delete($delete_noti)) {
      echo json_encode(array(
        "status" => true,
        "message" => "Oeder Rejected Successfully",
      ));
    }
  }
}
/*
*
*ACCEPT ORDER REQUEST
*
*/
if (isset($_POST['Accept_Order'])) {
  $product_id = $_POST['product__id'];
  $customer_id = $_POST['customer__id'];
  $noti = "The Product Which You Have Orderd Successfully Accepted To The Admin";
  $sql = "INSERT INTO accept_order(customer_token,product_id)VALUES('$product_id','$customer_id')";
  if ($__DB__->__INSERT__($sql)) {
    $insertNoti = "INSERT INTO `user_noti`(`user_token`,`product_id`,`message`)VALUES('$customer_id','$product_id','$noti')";
    if ($__DB__->__INSERT__($insertNoti)) {
      $deleteOrder = "DELETE FROM `order` WHERE `product_id`='$product_id' and `user_token`='$customer_id'";
      if ($__DB__->_Delete($sql)) {
        $delete_noti = "DELETE FROM `notification` WHERE `product_id`='$product_id' and `user_token`='$customer_id'";
        if ($__DB__->_Delete($delete_noti)) {
          echo json_encode(array(
            "status" => true,
            "message" => "Order Accepted"
          ));
        }
      }
      /*
      */
    }
  }
}
/*
*
*    UPDATE USER PROFILE INFO
*
*/
if (isset($_POST['profile_update'])) {
  $user_image = $_FILES['avtar']['name'];
  $random = substr(md5(mt_rand()), 0, 5);
  $user_image = "ghs__".$random.".jpg";
  $image_tmp = $_FILES['avtar']['tmp_name'];
  $dir = "../user_avtar/";
  move_uploaded_file($image_tmp, $dir.$user_image);
  $country = $_POST['country'];
  $region = trim($_POST['region']);
  $district = trim($_POST['district']);
  $phone = trim($_POST['phone']);
  $update_info = "UPDATE users SET avtar='$user_image',country='$country',region='$region',district='$district',phone='$phone'";
  if ($__DB__->__INSERT__($update_info)) {
    echo json_encode(array(
      "status" => true,
      "message" => "Profile Updated Successfully",
    ));
  }
}

if (isset($_POST['view_orderList'])) {
  $u_cookie = $_POST['u__cookie'];
  $sql = "SELECT * FROM `order` WHERE user_token='$u_cookie'";
  $query = $__DB__->__SELECT__($sql);
  echo json_encode($query);
}

if (isset($_POST['cancel_order'])) {
  $product_id = $_POST['remove_id'];
  $user_cookie = $_POST['userCookie'];
  $sql = "DELETE FROM `order` WHERE user_token='$user_cookie' AND product_id='$product_id'";
  if ($__DB__->_Delete($sql)) {
    echo json_encode(array(
      "status" => true,
      "message" => "Order Cancelled Successfully",
    ));
  }
}
/*
*
* CART NOTIFICATION
*
*/

if (isset($_GET['cart_notification'])) {
  $u_token = $_GET["cart_notification"];
  $sql = "SELECT * FROM cart WHERE user_token='$u_Cookie'";
  $query = $__DB__->__SELECT__($sql);
  if ($query) {
    echo count($query);
  } else {
    echo "0";
  }
}

?>