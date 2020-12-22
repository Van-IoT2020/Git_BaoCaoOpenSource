<?php
if(!session_id()) {
  session_start();
}
?>

<header id="aa-header">
    <!-- start header top  -->
    <div class="aa-header-top">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-top-area">
              <!-- start header top left -->
              <div class="aa-header-top-left">
                <!-- start language -->
                <div class="aa-language">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      <img src="public/img/1200px-Flag_of_Vietnam.svg.png" alt="vietnamese flag">Việt Nam
                    </a>
                  </div>
                </div>
                <!-- / language -->

                <!-- start currency -->
                <div class="aa-currency">
                  <div class="dropdown">
                    <a class="btn dropdown-toggle" href="#" type="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                      VNĐ
                    </a>
                  </div>
                </div>
                <!-- / currency -->
                <!-- start cellphone -->
                <div class="cellphone hidden-xs">
                  <p><span class="fa fa-phone"></span>0329111928</p>
                </div>
                <!-- / cellphone -->
              </div>
              <!-- / header top left -->
              <div class="aa-header-top-right">
                <ul class="aa-head-top-nav-right">
                  <li>
                    <?php
                      if(!empty($_SESSION['loginclient']['email']) || !empty($_SESSION['loginclient']['id'])){
                    ?>
                    <a href="index.php?p=myaccount">Tài khoản của tôi</a>
                    <?php
                      } else {
                    ?>
                    <a href="index.php?p=taikhoan">Tài khoản của tôi</a>
                    <?php
                      }
                    ?>
                    
                  </li>
                  <li class="hidden-xs"><a href="index.php?p=cart">Giỏ hàng của tôi</a></li>
                  <li>
                    <?php 
                    if(!empty($_SESSION['loginclient'])) {
                    ?>
                      <a href="facebook/logout.php">Đăng xuất</a>
                    <?php
                    } else {
                    ?>
                      <a href="" data-toggle="modal" data-target="#login-modal">Đăng nhập</a>
                    <?php
                    }
                    ?>
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header top  -->

    <!-- start header bottom  -->
    <div class="aa-header-bottom">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <div class="aa-header-bottom-area">
              <!-- logo  -->
              <div class="aa-logo">
                <!-- Text based logo -->
                <a href="index.php">
                  <span class="fa fa-shopping-cart"></span>
                  <p>Ryana<strong>Shop</strong> <span>Văn phòng phẩm</span></p>
                </a>
                <!-- img based logo -->
                <!-- <a href="index.html"><img src="library/img/logo.jpg" alt="logo img"></a> -->
              </div>
              <!-- / logo  -->
               <!-- cart box -->
              <div class="aa-cartbox">
                <a class="aa-cart-link" href="index.php?p=cart">
                  <span class="fa fa-shopping-basket"></span>
                  <span class="aa-cart-title">Giỏ hàng</span>
                  <span class="aa-cart-notify"><?php
                    if(empty($_SESSION['cart'])) {
                      echo 0;
                    } else {
                      echo count($_SESSION['cart']);
                    }
                  ?></span>
                </a>
              </div>
              <!-- / cart box -->
              <!-- search box -->
              <div class="aa-search-box">
                <?php
                  if(isset($_POST['onsearch'])) {
                    header("location:index.php?p=product&search=".$_POST['search']);
                  }
                ?>
                <form action="" method="post">
                  <input
                    value="<?php 
                      if(!empty($_GET['search'])) {
                        echo $_GET['search'];
                      }
                    ?>"
                    required type="text" name="search" id="" placeholder="Nhập tên sản phẩm cần tìm kiếm">
                  <button type="submit" name="onsearch"><span class="fa fa-search"></span></button>
                </form>
              </div>
              <!-- / search box -->             
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- / header bottom  -->
  </header>