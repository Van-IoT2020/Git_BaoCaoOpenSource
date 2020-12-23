<?php
        function threeProduct($conn) {
            $sm = $conn->prepare("SELECT * FROM product ORDER BY id DESC LIMIT 0, 3");
            $sm->execute();
            $data = $sm->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

    if(isset($_GET['id'])) {
        $idproduct = $_GET['id'];
        // Check to see if there is a session
        if(empty($_SESSION['JustFinishedWatching'])){
            //No session yet
            $_SESSION['JustFinishedWatching'] = array();
            $datathreeproduct = threeProduct($conn);
            // Add these 4 products to the session
            foreach($datathreeproduct as $item) {
                $_SESSION['JustFinishedWatching'][] = $item['id'];
            }
            $_SESSION['JustFinishedWatching'][] = $idproduct;
        } else {
            // had session
            // Check if the product exists in the session
            $checkidproduct = false;
            foreach($_SESSION['JustFinishedWatching'] as $item){
                if($item == $idproduct) {
                    $checkidproduct = true;
                }
            }
            // If no product, add it to the session
            if(!$checkidproduct){
                // Delete 1 element at the beginning of the array
                array_shift($_SESSION['JustFinishedWatching']);
                // add an element at the end of the array
                $_SESSION['JustFinishedWatching'][] = $idproduct;
            }
            //print_r($_SESSION['JustFinishedWatching']);
        }
    } 

?>

<!-- Banner -->
<section>
    <?php include 'content/head_banner.php'?>
</section>
<!-- /Banner -->

<section id="aa-product-details">
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="aa-product-details-area">
                <div class="aa-product-details-content">
                    <div class="row">
                        <!-- Product -->
                        <?php include 'content/product_detail.php'?>
                        <!-- /Product -->
                        <!-- Descript-Review -->
                        <?php include 'content/description_review.php'?>
                        <!-- /Description-Review -->
                        <!-- Related-product -->
                        <?php include 'content/related_product.php'?>
                        <!-- /Related-product -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>
