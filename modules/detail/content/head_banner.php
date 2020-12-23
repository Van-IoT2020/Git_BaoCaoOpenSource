<?php 
if (isset($_GET["id"])){
    $id = $_GET["id"];
    $stmt = $conn->prepare("SELECT p.*, pt.name as name_product 
    FROM product p INNER JOIN product_type pt ON p.product_type_id = pt.id 
    WHERE p.id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();

    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<section id="aa-catg-head-banner">
<img src="public/img/calendar-2020-banner.jpg" width="1920px" height="270px">
<div class="aa-catg-head-banner-area">
    <div class="container">
    <div class="aa-catg-head-banner-content">
    <?php foreach($data as $item){?>
    <h2><?php echo $item["name_product"]?></h2>
    <ol class="breadcrumb">
        <li><a href="index.php?p=home">Home</a></li>         
        <li><a href="#">Product</a></li>
        <li class="active"><?php echo $item["name_product"]?></li>
    </ol>
    <?php }?>
    </div>
    </div>
</div>
</section>