<?php 
if (isset($_POST["quick_view"])){
    $id = $_GET["id"];
    $stmt = $conn->prepare('SELECT p.*, pt.name as name_product, tm.name as trade_mark_name
    FROM producttype pt INNER JOIN product p ON pt.id = p.product_type_id
                        INNER JOIN trademark tm ON p.trade_mark_id = tm.id
    WHERE p.id = :id');
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $detail = $stmt->fetch(PDO::FETCH_ASSOC);
}

?>
<div class="modal fade" id="quick-view-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <div class="row">
                    <!-- Modal view slider -->
                    
                        <div class="col-md-5 col-sm-5 col-xs-12">                              
                            <div class="aa-product-view-slider">                                
                                <div id="demo-1" class="simpleLens-gallery-container">
                                    <div class="simpleLens-container">
                                        <div class="simpleLens-big-image-container"><a data-lens-image="public/image/product/<?php echo $detail["avatar"]?>" class="simpleLens-lens-image"><img src="public/image/product/<?php echo $detail["avatar"]?>" class="simpleLens-big-image"></a>
                                        </div>
                                    </div>
                                    <?php include 'modules/detail/content/product_detail/image.php'?>
                                </div>
                            </div>
                        </div>
                    <!-- Modal view content -->
                        <div class="col-md-7 col-sm-7 col-xs-12">
                            <div class="aa-product-view-content">
                            <h3 style ="color: red"><?php echo $detail["name"]?></h3>
                            <div class="aa-price-block">
                                <span class="aa-product-view-price"><?php echo number_format($detail["price"])." "?>VNĐ</span>
                                <p>Chất liệu: <span><?php echo $detail["material"] ?></span></p>
                                <p>Nhãn hiệu: <span><?php echo $detail["trade_mark_name"] ?></span></p>
                            </div>
                            <h4>Kích cỡ</h4>
                            <span class="aa-prod-view-size">
                                <a href="#"><?php echo $detail["size"]?></a>
                            </span>
                            <h4>Màu sắc</h4>
                            <?php include 'modules/detail/content/product_detail/color.php'?>
                            <div class="aa-prod-quantity">
                                <form action="">
                                <select id="" name="amount">
                                    <option selected="1" value="0">1</option>
                                    <option value="1">2</option>
                                    <option value="2">3</option>
                                    <option value="3">4</option>
                                    <option value="4">5</option>
                                    <option value="5">6</option>
                                </select>
                                </form>
                                <p class="aa-prod-category">
                                    Thể loại: <a href="#"><?php echo $detail["name_product"]?></a>
                                </p>
                            </div>
                            <div class="aa-prod-view-bottom">
                                <a class="aa-add-to-cart-btn" href="#">Thêm vào giỏ hàng</a>
                                <a class="aa-add-to-cart-btn" href="#">Yêu thích</a>
                            </div>
                            </div>
                        </div>
               
                </div>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- / quick view modal -->
