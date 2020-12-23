<?php
    function create_slug($str) {
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);             
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);             
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);             
        $str = preg_replace("/(đ)/", 'd', $str);             
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);             
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);             
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);             
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);             
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);             
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);            
        $str = preg_replace("/(Đ)/", 'D', $str);             
        $str = str_replace(" ", " ",str_replace("&*#39;","",$str));            
        $str = strtolower($str);       
        return $str;
    }
?>

<ul class="aa-product-catg">
    <?php
    $name = create_slug($_GET['search']);

    function getDataProductListnotype($conn,$name,$start,$onePerPage) {
        $sm = $conn->prepare("SELECT * FROM product WHERE name like N'%$name%' ORDER BY id DESC LIMIT $start, $onePerPage");
        $sm->execute();
        $data = $sm->fetchAll(PDO::FETCH_ASSOC);
        return $data;
    }


    function rowTotal($conn,$name) {
        $sm = $conn->prepare("SELECT * FROM product WHERE name like N'%$name%'");
        $sm->execute();
        return $sm->rowCount();
    }
        
        $totalRow = rowTotal($conn,$name);
        $totalPage = ceil($totalRow/$onePerPage);

        if(isset($_GET['page'])) {
            $page = $_GET['page'];
            if($page > $totalPage || $page < 1) {
                $page = 1;
            }
        } else {
            $page = 1;
        }
        $start = ($page - 1) * $onePerPage;
        $data = getDataProductListnotype($conn,$name,$start,$onePerPage);
        

        foreach($data as $item) {
        ?>
    <!-- start single product item -->
    <li>
        <figure>
            <a class="aa-product-img" href="index.php?p=detail&id=<?php echo $item['id']; ?>"><img width="100%"
                    height="100%" src="public/image/product/<?php echo $item['avatar'];?>"
                    alt="Xem chi tiết sản phẩm"></a>
            <a class="aa-add-card-btn" href="index.php?p=buynow&idsp=<?php echo $item["id"] ?>">Mua ngay</a>
            <figcaption>
                <h4 class="aa-product-title"><a href="#"><?php echo $item['name']?></a></h4>
                <span class="aa-product-price"><?php echo number_format($item["price"]); ?>VNĐ</span><span
                    class="aa-product-price"><del
                        style="font-size:13px;"><?php echo number_format($item["price"]*1.5); ?>VNĐ</del></span>
            </figcaption>
        </figure>

        <div class="aa-product-hvr-content">
        <!-- BUG KHONG THEM DUOC VAO GIO HANG-->
        <!-- <a href="index.php?p=product&idsp=<//?php echo $item//['id']; ?>" data-toggle="tooltip" data-placement="top"
                title="Thêm vào giỏ hàng"><span class="fa fa-shopping-cart fa-3x"></span></a> -->
            <a href="index.php?p=product&idsp" data-toggle="tooltip" data-placement="top"
                title="Thêm vào giỏ hàng"><span class="fa fa-shopping-cart fa-3x"></span></a>
        </div>
        <!-- product badge -->
        <span class="aa-badge aa-sale" href="#">SALE!</span>
    </li>
    <?php
        }
?>
</ul>