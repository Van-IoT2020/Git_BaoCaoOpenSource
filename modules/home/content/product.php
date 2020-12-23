<div class="container">
    <div class="row">
    <div class="col-md-12">
        <div class="row">
        <div class="aa-product-area">
            <div class="aa-product-inner">
            <!-- start prduct navigation -->
                <ul class="nav nav-tabs aa-products-tab">
                <li class="active"><a href="#men" data-toggle="tab">Lịch</a></li>
                <li><a href="#women" data-toggle="tab">Tạp chí</a></li>
                <li><a href="#sports" data-toggle="tab">Nhật ký</a></li>
                </ul>
                <!-- Tab panes -->
                <div class="tab-content">

                <?php include 'product/calendar.php' ?>
               
                <?php include 'product/journal.php' ?>
               
                <?php include 'product/diary.php' ?>
               
                <!-- start electronic product category -->
                
                <!-- / electronic product category -->
                </div>
                <!-- quick view modal -->                  
                <?php include 'function/quick_view.php'?>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>