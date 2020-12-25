<?php
    if(!session_id()) {
        session_start();
    }
    // Function table 4 products.
    function fourProduct($conn) {
        $sm = $conn->prepare("SELECT * FROM product ORDER BY id DESC LIMIT 0, 4");
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }

    function showFourProduct($conn,$data) {
        $sm = $conn->prepare("SELECT * FROM product WHERE id = :one or id = :two or id = :three or id = :four");
        $sm->bindParam(":one", $data[0], PDO::PARAM_INT);
        $sm->bindParam(":two", $data[1], PDO::PARAM_INT);
        $sm->bindParam(":three", $data[2], PDO::PARAM_INT);
        $sm->bindParam(":four", $data[3], PDO::PARAM_INT);
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }
?>

<aside class="aa-sidebar">
    <!-- single sidebar -->
    <div class="aa-sidebar-widget">
        <h3>Loại sản phẩm</h3>
        <ul class="aa-catg-nav">
            <?php
            include "producttype.php";
            $data = getDataProducttypeList($conn);
            foreach ($data as $item) {
            ?>
                <li><a href="index.php?p=product&type=<?php echo $item['id'] ?>"><?php echo $item['name'] ?></a></li>
            <?php
            }
            ?>
        </ul>
    </div>

    <!-- single sidebar -->
    <div class="aa-sidebar-widget">
        <h3>Những sản phẩm xem gần đây</h3>
        <div class="aa-recently-views">
            <ul>
                <?php
                    

                    // Check to see if there is a session
                    if(empty($_SESSION['JustFinishedWatching'])){
                        //create $_SESSION['JustFinishedWatching']
                        $_SESSION['JustFinishedWatching'] = array();
                        //Get 4 products from the database
                        $datafourproduct = fourProduct($conn);
                        // Add these 4 products to the session
                        foreach($datafourproduct as $item) {
                            $_SESSION['JustFinishedWatching'][] = $item['id'];
                        }
                        if(!empty($_SESSION['JustFinishedWatching'])) {
                            $dataWatching = showFourProduct($conn,$_SESSION['JustFinishedWatching']);
                            foreach($dataWatching as $item) {
                        ?>
                        <li>
                            <a href="index.php?p=detail&id=<?php echo $item['id']; ?>" class="aa-cartbox-img"><img alt="img" src="public/image/product/<?php echo $item['avatar']; ?>"></a>
                            <div class="aa-cartbox-info">
                                <h4><a href="index.php?p=detail&id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></h4>
                                <p><?php echo number_format($item["price"]); ?>VNĐ</p>
                                <p><del style="font-size:13px;"><?php echo number_format($item["price"]*1.5); ?>VNĐ</del></p>
                            </div>
                        </li>
                        <?php
                            }
                        }


                    } else {
                        // had $_SESSION['JustFinishedWatching']
                        if(!empty($_SESSION['JustFinishedWatching'])) {
                            $dataWatching = showFourProduct($conn,$_SESSION['JustFinishedWatching']);
                            foreach($dataWatching as $item) {
                        ?>
                        <li>
                            <a href="index.php?p=detail&id=<?php echo $item['id']; ?>" class="aa-cartbox-img"><img alt="img" src="public/image/product/<?php echo $item['avatar']; ?>"></a>
                            <div class="aa-cartbox-info">
                                <h4><a href="index.php?p=detail&id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></h4>
                                <p><?php echo number_format($item["price"]); ?>VNĐ</p>
                                <p><del style="font-size:13px;"><?php echo number_format($item["price"]*1.5); ?>VNĐ</del></p>
                            </div>
                        </li>
                        <?php
                            }
                        }
                    }
                ?>

            </ul>
        </div>
    </div>
    <!-- single sidebar -->
    <div class="aa-sidebar-widget">
        <h3>Những sản phẩm mới nhất</h3>
        <div class="aa-recently-views">
            <ul>
                <?php 
                    $dataNew = fourProduct($conn);
                    foreach($dataNew as $item) {
                ?>
                <li>
                <!-- <a href="index.php?p=detail&id=<?php //echo $item['id']; ?>" class="aa-cartbox-img"><img alt="img" src="public/image/product/<?php //echo $item['avatar']; ?>"></a> -->
                <!-- BUG IS HERE - da fix -->
                <a href="index.php?p=detail&id=<?php echo $item['id']; ?>" class="aa-cartbox-img"><img alt="img" src="public/image/product/<?php echo $item['avatar']; ?>"></a>
                    <div class="aa-cartbox-info">
                        <h4><a href="index.php?p=detail&id=<?php echo $item['id']; ?>"><?php echo $item['name']; ?></a></h4>
                        <p><?php echo number_format($item["price"]); ?>VNĐ</p>
                        <p><del style="font-size:13px;"><?php echo number_format($item["price"]*1.5); ?>VNĐ</del></p>
                    </div>
                </li>
                <?php
                    } 
                ?>

            </ul>
        </div>
    </div>
</aside>