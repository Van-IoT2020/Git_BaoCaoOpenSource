<?php 
if (isset($_GET["id"])){
    $id = $_GET["id"];
    $stmt = $conn->prepare("SELECT p.*, pt.name as name_product, pt.*
    FROM product p INNER JOIN product_type pt ON p.product_type_id = pt.id
    WHERE p.id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<div class="aa-product-details-bottom">
    <ul class="nav nav-tabs" id="myTab2">
    <li><a href="#description" data-toggle="tab">Chức năng</a></li>
    <li><a href="#review" data-toggle="tab">Hướng dẫn</a></li>                
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane fade in active" id="description">
            <h3>Chức năng</h3>
            <ul>
                <?php foreach($data as $item){?>
                <li><?php echo $item["function"]?></li>
                <?php }?>
            </ul>
        </div>
        <div class="tab-pane fade" id="review">
            <h3>Hướng dẫn người dùng</h3>
            <ul>
                <?php foreach($data as $item){?>
                <li><?php echo $item["user_manual"]?></li>
                <?php }?>
            </ul>
        </div>            
    </div>
</div>