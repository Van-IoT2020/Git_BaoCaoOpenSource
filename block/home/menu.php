<?php
  function getDataProducttypeListMenu($conn) {
    $sm = $conn->prepare("SELECT * from product_type");
    $sm->execute();
    $data = $sm->fetchAll(PDO::FETCH_ASSOC);
    return $data;
  }
?>

<div class="container">
      <div class="menu-area">
        <!-- Navbar -->
        <div class="navbar navbar-default" role="navigation">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>          
          </div>
          <div class="navbar-collapse collapse">
            <!-- Left nav -->
            <ul class="nav navbar-nav">
              <li><a href="index.php?p=home">Trang chủ</a></li>
              <li><a href="index.php?p=gioi_thieu">Giới thiệu</a></li>
              <li><a href="#">Loại sản phẩm <span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <?php
                    $datamenu = getDataProducttypeListMenu($conn);
                    foreach($datamenu as $item) {
                  ?>
                      <li><a href="index.php?p=product&type=<?php echo $item['id']?>"><?php echo $item['name']?></a></li>
                  <?php
                    }
                  ?>
                </ul>
              </li>
              <li><a href="index.php?p=contact">Liên hệ </span></a>
                
              </li>
                  
              </li>
             <li><a href="index.php?p=checkorders">Kiểm tra đơn hàng </span></a>
                
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>       
    </div>