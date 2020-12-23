<?php 
$stmt = $conn->prepare("SELECT * FROM product ORDER BY id DESC");
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="aa-popular-category-area">
                    
                    <!-- start prduct navigation -->
                    <ul class="nav nav-tabs aa-products-tab">
                        <li class="active"><a href="#popular" data-toggle="tab">Phổ biến</a></li>
                        <li><a href="#featured" data-toggle="tab">Nổi bật</a></li>
                        <li><a href="#latest" data-toggle="tab">Mới nhất</a></li>
                    </ul>

                    <!-- Tab panes -->
                    <div class="tab-content">
                        <!-- Start men popular category -->
                        <div class="tab-pane fade in active" id="popular">
                            <ul class="aa-product-catg aa-popular-slider">
                              <?php foreach($data as $item){?>
                                <!-- start single product item -->
                                <li>
                                    <figure>
                                    <a href="index.php?p=detail&id=<?php echo $item["id"]?>"><img src="public/image/product/<?php echo $item["avatar"]?>" width="100%" height="100%"></a>
                                    <a class="aa-add-card-btn"href="index.php?p=buynow&idsp=<?php echo $item["id"] ?>">Mua ngay</a>
                                    <figcaption>
                                        <h4 class="aa-product-title"><a href="#"><?php echo $item["name"]?></a></h4>
                                        <span class="aa-product-price"><?php echo number_format($item["price"]); ?>VNĐ</span><span class="aa-product-price"><del style="font-size:13px;"><?php echo number_format($item["price"]*1.5); ?>VNĐ</del></span>
                                    </figcaption>
                                    </figure>                     
                                    <div class="aa-product-hvr-content">
                                        <a href="index.php?p=product&idsp=<?php echo $item['id']; ?>" data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng"><span  class="fa fa-shopping-cart fa-3x" ></span></a>                          
                                    </div>
                                    <!-- product badge -->
                                    <span class="aa-badge aa-sale" href="#">SALE!</span>
                                </li>
                              <?php }?>
                            </ul>
                            <a class="aa-browse-btn" href="index.php?p=product">Xem tất cả sản phẩm<span class="fa fa-long-arrow-right"></span></a>
                        </div>
                        <!-- / popular product category -->
                        <!-- start featured product category -->
                        <div class="tab-pane fade" id="featured">
                            <ul class="aa-product-catg aa-featured-slider">
                              <?php foreach($data as $item){?>
                                <!-- start single product item -->
                                <li>
                                    <figure>
                                    <a href="index.php?p=detail&id=<?php echo $item["id"]?>"><img src="public/image/product/<?php echo $item["avatar"]?>" width="100%" height="100%"></a>
                                    <a class="aa-add-card-btn"href="index.php?p=buynow&idsp=<?php echo $item["id"] ?>">Mua ngay</a>
                                    <figcaption>
                                        <h4 class="aa-product-title"><a href="#"><?php echo $item["name"]?></a></h4>
                                        <span class="aa-product-price"><?php echo number_format($item["price"]); ?>VNĐ</span><span class="aa-product-price"><del style="font-size:13px;"><?php echo number_format($item["price"]*1.5); ?>VNĐ</del></span>
                                    </figcaption>
                                    </figure>                     
                                    <div class="aa-product-hvr-content">
                                        <a href="index.php?p=product&idsp=<?php echo $item['id']; ?>" data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng"><span  class="fa fa-shopping-cart fa-3x" ></span></a>                         
                                    </div>
                                    <!-- product badge -->
                                    <span class="aa-badge aa-sale" href="#">SALE!</span>
                                </li>
                              <?php }?>
                            </ul>
                            <a class="aa-browse-btn" href="index.php?p=product">Xem tất cả sản phẩm<span class="fa fa-long-arrow-right"></span></a>
                        </div>
                        <!-- / featured product category -->
                        <!-- start latest product category -->
                        <div class="tab-pane fade" id="latest">
                            <ul class="aa-product-catg aa-latest-slider">
                              <?php foreach($data as $item){?>
                                <!-- start single product item -->
                                <li>
                                    <figure>
                                    <a href="index.php?p=detail&id=<?php echo $item["id"]?>"><img src="public/image/product/<?php echo $item["avatar"]?>" width="100%" height="100%"></a>
                                    <a class="aa-add-card-btn"href="index.php?p=buynow&idsp=<?php echo $item["id"] ?>">Mua ngay</a>
                                    <figcaption>
                                        <h4 class="aa-product-title"><a href="#"><?php echo $item["name"]?></a></h4>
                                        <span class="aa-product-price"><?php echo number_format($item["price"]); ?>VNĐ</span><span class="aa-product-price"><del style="font-size:13px;"><?php echo number_format($item["price"]*1.5); ?>VNĐ</del></span>
                                    </figcaption>
                                    </figure>                     
                                    <div class="aa-product-hvr-content">
                                        <a href="index.php?p=product&idsp=<?php echo $item['id']; ?>" data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng"><span  class="fa fa-shopping-cart fa-3x" ></span></a>                         
                                    </div>
                                    <!-- product badge -->
                                    <span class="aa-badge aa-sale" href="#">SALE!</span>
                                </li>
                              <?php }?>
                            </ul>
                            <a class="aa-browse-btn" href="index.php?p=product">Xem tất cả sản phẩm<span class="fa fa-long-arrow-right"></span></a>
                        </div>
                        <!-- / latest product category -->              
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>