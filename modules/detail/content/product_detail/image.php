<?php
if (isset($_GET["id"])){
    $id = $_GET["id"];
    $sta = $conn->prepare("SELECT p.*, pm.image as image_product
    FROM product p INNER JOIN product_image pm ON p.id = pm.id_product
    WHERE pm.id_product = :id");
    $sta->bindParam(":id", $id, PDO::PARAM_INT);
    $sta->execute();

    $data_product_image = $sta->fetchAll(PDO::FETCH_ASSOC);
} 
?>
<div class="simpleLens-thumbnails-container">
    <?php foreach($data_product_image as $image){?>
        <a data-big-image="public/image/productimage/<?php echo $image["image_product"]?>" data-lens-image="public/image/productimage/<?php echo $image["image_product"]?>" class="simpleLens-thumbnail-wrapper" href="#">
        <img src="public/image/productimage/<?php echo $image["image_product"]?>" width="80px" height="80px">
        </a>          
    <?php }?>                        
</div>