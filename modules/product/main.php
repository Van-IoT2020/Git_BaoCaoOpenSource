<?php
    $totalRow;
    $onePerPage = 12;
?>
<!-- catg header banner section -->
<section id="aa-catg-head-banner">
    <?php include 'content/banner.php'?>
</section>
<!-- / catg header banner section -->
<!-- product category -->
<section id="aa-product-category">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 col-md-9 col-sm-8 col-md-push-3">
                <div class="aa-product-catg-content">
                    <?php include 'content/product_catg_head.php'?>
                    <div class="aa-product-catg-body">
                        <?php
                        if(empty($_GET['search'])){
                            include 'content/product_catg.php';
                        } else {
                            include 'content/product_name_search.php';
                        }
                         ?>
                        <!-- quick view modal -->                  
                        <?php include 'content/quick_view_modal.php'?>
                        <!-- / quick view modal -->   
                    </div>
                    <div class="aa-product-catg-pagination">
                        <?php include 'content/product_catg_pagination.php'?>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-4 col-md-pull-9">
                <?php include 'content/sidebar.php'?>
            </div>
        </div>
    </div>
</section>
<!-- / product category -->