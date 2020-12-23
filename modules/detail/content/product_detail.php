<?php 
if (isset($_GET["id"])){
    $id = $_GET["id"];   
    $stmt = $conn->prepare('SELECT p.*, pt.name as name_product, pt.unit_of_measure
    FROM product_type pt INNER JOIN product p ON pt.id = p.product_type_id
    WHERE p.id = :id');
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}
?>
<!-- Modal view slider -->
<?php foreach($data as $detail){?>
    <div class="col-md-5 col-sm-5 col-xs-12">                              
        <div class="aa-product-view-slider">                                
            <div id="demo-1" class="simpleLens-gallery-container">
                <div class="simpleLens-container">
                    <div class="simpleLens-big-image-container"><a data-lens-image="public/image/product/<?php echo $detail["avatar"]?>" class="simpleLens-lens-image"><img src="public/image/product/<?php echo $detail["avatar"]?>" class="simpleLens-big-image"></a>
                    </div>
                </div>
                <?php include 'product_detail/image.php'?>
            </div>
        </div>
    </div>
<!-- Modal view content -->
    <div class="col-md-7 col-sm-7 col-xs-12">
        <div class="aa-product-view-content">
        <h3 style="color:red;"><?php echo $detail["name"]?></h3>
        <div class="aa-price-block">
            <span class="aa-product-view-price" style="font-size:25px;"><?php echo number_format($detail["price"])?>VNĐ</span><span class="aa-product-price"><del style="font-size:13px;"><?php echo number_format($detail["price"]*1.5); ?>VNĐ</del></span>
            <p class="aa-prod-category">
                Thể loại: <a href="index.php?p=product&type=<?php echo $detail['product_type_id']?>" style="color:red;"><?php echo $detail["name_product"]?></a>
            </p>
            <p>Chất liệu: <span><?php echo $detail["material"] ?></span></p>
        </div>
        <p>Kích cỡ</p>
        <div class="aa-prod-view-size">
            <a href="#"><?php echo $detail["width"]."x".$detail["height"]."cm"?></a>
        </div>
        <p>Đơn vị đo: <span><?php echo $detail["quantitative"]."".$detail["unit_of_measure"]?></span></p>
        <p>Bảng giá những sản phẩm cùng loại: <a href="index.php?p=ListPriceProduct&type=<?php echo $detail['product_type_id']?>&type_name=<?php echo $detail["name_product"]?>"><span class="fa fa-download"></span></a> </p> 
        <div class="aa-prod-view-bottom">
            <a class="aa-add-to-cart-btn" href="index.php?p=product&idsp=<?php echo $detail['id']; ?>">Thêm vào giỏ hàng</a>
            <a class="aa-add-to-cart-btn" href="index.php?p=buynow&idsp=<?php echo $detail["id"] ?>">Mua ngay</a>
        </div>
        </div>
    </div>
<?php }?> 


