<?php 
if (isset($_GET["id"])){
    $id = $_GET["id"];
    $st = $conn->prepare("SELECT * FROM product WHERE id = :id");
    $st->bindParam(":id", $id, PDO::PARAM_INT);
    $st->execute();

    $dt = $st->fetch(PDO::FETCH_ASSOC);

    $stmt = $conn->prepare('SELECT p.*, pt.name as name_product
    FROM product p INNER JOIN product_type pt ON p.product_type_id = pt.id
    WHERE p.product_type_id = :product_type_id AND p.id != :id');
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->bindParam(":product_type_id", $dt["product_type_id"], PDO::PARAM_INT);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

?>
<!-- Related product -->
<div class="aa-product-related-item">
    <h3>Sản phẩm tương tự</h3>
    <ul class="aa-product-catg aa-related-item-slider">
    <!-- start single product item -->
        <?php foreach($data as $item){?>
            <li>
                <figure>
                <a href="index.php?p=detail&id=<?php echo $item["id"]?>"><img src="public/image/product/<?php echo $item["avatar"]?>" width="100%" height="100%"></a>
                <a class="aa-add-card-btn"href="#"><span class="fa fa-shopping-cart"></span>Mua ngay</a>
                    <figcaption>
                    <h4 class="aa-product-title"><a href="index.php?p=detail&id=<?php echo $item["id"]?>"><?php echo $item["name"]?></a></h4>
                    <span class="aa-product-price"><?php echo number_format($item["price"])?>VNĐ</span><span class="aa-product-price"><del style="font-size:13px;"><?php echo number_format($item["price"]*1.5); ?>VNĐ</del></span>
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
</div>  