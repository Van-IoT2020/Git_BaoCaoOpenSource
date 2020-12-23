<?php 
$stmt = $conn->prepare("SELECT * FROM product WHERE product_type_id = 1 AND status = 1 ORDER BY id DESC LIMIT 0,12");
$stmt->execute();

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!-- Start men product category -->
<div class="tab-pane fade in active" id="men">
    <ul class="aa-product-catg">
    <?php foreach($data as $item){?>
    <!-- start single product item -->
    <li>
        <figure>
            <a href="index.php?p=detail&id=<?php echo $item["id"]?>"><img src="public/image/product/<?php echo $item["avatar"]?>" width="100%" height="100%"></a>
            <a class="aa-add-card-btn"href="index.php?p=buynow&idsp=<?php echo $item["id"] ?>">Mua ngay</a>
            <figcaption>
                <h4 class="aa-product-title"><a href="#"><?php echo $item["name"]?></a></h4>
                <span class="aa-product-price"><?php echo number_format($item["price"]); ?>VNĐ</span>
                <span class="aa-product-price"><del style="font-size:13px;"><?php echo number_format($item["price"]*1.5); ?>VNĐ</del></span>
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
    <a class="aa-browse-btn" href="index.php?p=product&type=1">Xem tất cả sản phẩm<span class="fa fa-long-arrow-right"></span></a>
</div>
<!-- / men product category -->