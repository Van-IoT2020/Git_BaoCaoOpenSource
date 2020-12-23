<ul class="aa-product-catg">
<!-- start single product item -->
<li>
        <figure>
            <a class="aa-product-img" href="index.php?p=detail&id=<?php echo $item['id']; ?>"><img width="100%" height="100%" src="public/image/product/<?php echo $item['avatar'];?>" alt="Xem chi tiết sản phẩm"></a>
            <a class="aa-add-card-btn"href="index.php?p=buynow&idsp=<?php echo $item["id"] ?>">Mua ngay</a>
            <figcaption>
                <h4 class="aa-product-title"><a href="#"><?php echo $item['name']?></a></h4>
                <span class="aa-product-price"><?php echo number_format($item["price"]); ?>VNĐ</span><span class="aa-product-price"><del style="font-size:13px;"><?php echo number_format($item["price"]*1.5); ?>VNĐ</del></span>
                <p class="aa-product-descrip"> <?php  echo $datatype['user_manual']; ?> </p>
            </figcaption>
        </figure>

        <div class="aa-product-hvr-content">
            <a href="index.php?p=product&type=<?php echo $idtype;?>&idsp=<?php echo $item['id']; ?>" data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng"><span  class="fa fa-shopping-cart fa-3x" ></span></a>                         
        </div>
        <!-- product badge -->
        <span class="aa-badge aa-sale" href="#">SALE!</span>
    </li>
    <!-- start single product item -->
    <li>
        <figure>
            <a class="aa-product-img" href="index.php?p=detail&id=<?php echo $item['id']; ?>"><img width="100%" height="100%" src="public/image/product/<?php echo $item['avatar'];?>" alt="Xem chi tiết sản phẩm"></a>
            <a class="aa-add-card-btn"href="index.php?p=buynow&idsp=<?php echo $item["id"] ?>">Mua ngay</a>
            <figcaption>
                <h4 class="aa-product-title"><a href="#"><?php echo $item['name']?></a></h4>
                <span class="aa-product-price"><?php echo number_format($item["price"]); ?>VNĐ</span><span class="aa-product-price"><del style="font-size:13px;"><?php echo number_format($item["price"]*1.5); ?>VNĐ</del></span>
                <p class="aa-product-descrip"> <?php  echo $datatype['user_manual']; ?> </p>
            </figcaption>
        </figure>

        <div class="aa-product-hvr-content">
        <a href="index.php?p=product&idsp=<?php echo $item['id']; ?>" data-toggle="tooltip" data-placement="top" title="Thêm vào giỏ hàng"><span  class="fa fa-shopping-cart fa-3x" ></span></a> 
        </div>
        <!-- product badge -->
        <span class="aa-badge aa-sale" href="#">SALE!</span>
    </li>
    
</ul>