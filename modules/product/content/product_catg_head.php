<?php 
    function getDataProducttypeidcatg($conn) {
        $sm = $conn->prepare("SELECT * FROM product_type");
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
?>
<div class="aa-product-catg-head">
    <div class="aa-product-catg-head-left">
        <?php
            if(isset($_GET['type'])) {
                $idtype = $_GET['type'];
                $datacatg = getDataProducttypeidcatg($conn);
                foreach($datacatg as $item) {
                    if($item['id'] == $idtype) {
                        echo "<h4>Các Loại ".$item['name']."</h4>";
                    }
                }
            } else {
                echo  "<h4>Tất cả sản phẩm</h4>";
            }
        ?>
    </div>
    <div class="aa-product-catg-head-right">
        <a id="grid-catg" href="#"><span class="fa fa-th"></span></a>
        <a id="list-catg" href="#"><span class="fa fa-list"></span></a>
    </div>
</div>