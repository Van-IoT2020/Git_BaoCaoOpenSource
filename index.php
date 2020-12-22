<?php
ob_start();
if (!session_id()) {
  session_start();
}
include 'library/config.php';
include 'library/connect.php';
include 'modules/detail/content/convertHTMLtoDOC.php';
// check email tồn tại
function countAccountExistEmailCountOne($conn,$email) {
  $sm_check = $conn->prepare("SELECT * FROM account WHERE email = :email");
  $sm_check->bindParam(":email", $email, PDO::PARAM_STR);
  $sm_check->execute();
  $count = $sm_check->rowCount();
  if($count != 0) {
      return true;
}
  return false;
}

function getDataAccountSessionId($conn, $email) {
  $sm = $conn->prepare("SELECT * FROM account WHERE email = :email");
  $sm->bindParam(":email", $email, PDO::PARAM_STR);
  $sm->execute();
  $data = $sm->fetch(PDO::FETCH_ASSOC);
  return $data;
}

if(!empty($_SESSION['loginclient']['email']) && empty($_SESSION['loginclient']['id'])) {
  $emailtmp = $_SESSION['loginclient']['email'];
  $checkemailtmp = countAccountExistEmailCountOne($conn,$emailtmp);
  if ($checkemailtmp) {
    // email da ton tai
    $dataSession = getDataAccountSessionId($conn, $emailtmp);
    $_SESSION['loginclient']['id'] = $dataSession['id'];
    unset($_SESSION['loginclient']['email']);
    unset($_SESSION['loginclient']['fullname']);
  }
}


if(isset($_GET['idsp'])) {
  $idsp=$_GET['idsp'];
  $stmt=$conn->prepare("SELECT * FROM product where id=:id");
  $stmt->bindParam(":id",$idsp,PDO::PARAM_INT);
  $stmt->execute();
  $data=$stmt->fetch(PDO::FETCH_ASSOC);
  if(!isset($_SESSION['cart'][$idsp]['quantity'])){
      $_SESSION['cart'][$idsp]['id']=$idsp;
      $_SESSION['cart'][$idsp]['quantity']=1;
      $_SESSION['cart'][$idsp]['price']=$data['price'];
      $_SESSION['cart'][$idsp]['name']=$data['name'];
      $_SESSION['cart'][$idsp]['avatar']=$data['avatar'];
  }
  else{
      $_SESSION['cart'][$idsp]['quantity']+=1;
  }
  // echo "<pre>";
  // print_r($_SESSION['cart']);
  // echo "</pre>";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <?php include 'block/home/head.php' ?>

</head>

<body>
    <!-- wpf loader Two -->
    <?php include 'block/home/load.php' ?>
    <!-- / wpf loader Two -->
    <!-- SCROLL TOP BUTTON -->
    <?php include 'block/home/scroll.php' ?>
    <!-- END SCROLL TOP BUTTON -->


    <!-- Start header section -->
    <?php include 'block/home/header.php' ?>
    <!-- / header section -->


    <!-- menu -->
    <section id="menu">
        <?php include 'block/home/menu.php' ?>
    </section>
    <!-- / menu -->


    <section id="main">
        <?php
    if (isset($_GET['p'])) {
      $p = $_GET['p'];
      switch ($p) {
        case "home":
          include 'modules/home/main.php';
          break;
        case "cart":
          include 'modules/cart/main.php';
          break;
        case "detail":
          include 'modules/detail/main.php';
          break;
        case "taikhoan":
          include 'modules/account/main.php';
          break;
        case "product":
          include 'modules/product/main.php';
          break;
        case "wishlist":
          include 'modules/wishlist/main.php';
          break;
        case 'deleteCart':
          include 'modules/cart/content/deleteToCart.php';
          break;
        case 'pay':
          include 'modules/pay/main.php';
          break;
        case 'myaccount':
          include 'modules/account/myaccount.php';
          break;
        case 'buynow':
          include 'modules/cart/buynow.php';
          break;
        case 'contact':
          include 'modules/contact/main.php';
          break;
        case 'checkorders':
          include 'modules/checkorders/main.php';
          break;
        case "ListPriceProduct":
          include 'modules/detail/content/ListPriceProduct.php';
          break;
        case "gioi_thieu":
          include 'block/home/gioithieu.php';
          break;
        default:
          include 'modules/home/main.php';
      }
    } else
      include 'modules/home/main.php';
    ?>
    </section>



    <!-- / popular section -->
    <!-- Support section -->
    <?php include 'block/home/chinh_sach_ho_tro.php' ?>
    <!-- / Support section -->
    <!-- Testimonial -->

    <!-- / Testimonial -->

    <!-- Latest Blog -->
    <!-- / Latest Blog -->
    <!-- Load Facebook SDK for JavaScript -->

    <!-- Subscribe section -->

    <!-- / Subscribe section -->

    <!-- footer -->
    <footer id="aa-footer">
        <?php include 'block/home/bottom.php' ?>
    </footer>
    <!-- Login Modal -->
    <?php include 'block/home/login.php' ?>
    <!-- jQuery public -->
    <?php include 'block/home/script.php' ?>
    <!-- Load Facebook SDK for JavaScript -->
    <!-- Load Facebook SDK for JavaScript -->
    <!-- Load Facebook SDK for JavaScript -->
    <div id="fb-root" style="bottom:50%;"></div>
    <script>
    window.fbAsyncInit = function() {
        FB.init({
            xfbml: true,
            version: 'v7.0'
        });
    };

    (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s);
        js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));
    </script>

    <!-- Your Chat Plugin code -->
    <div class="fb-customerchat" attribution=setup_tool page_id="121719292958766">
    </div>
</body>

</html>