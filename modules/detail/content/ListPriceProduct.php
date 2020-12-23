<?php

if(isset($_GET['p']) && isset($_GET['type'])&&isset($_GET['type_name']))
{
    $type_ID= $_GET['type'];
    $type_name=$_GET['type_name'];
    $sm=$conn->prepare("SELECT * FROM product WHERE product_type_id=:product_type_id");
    $sm->bindParam(":product_type_id",$type_ID,PDO::PARAM_INT);

    $sm->execute();
    $data = $sm->fetchAll(PDO::FETCH_ASSOC);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h3>Thể loại:<?php echo $type_name ?></h3>
    <?php
        $stt=0;
        foreach($data as $item)
    {
        $stt++;
    ?>
    <br/>
    <br/>
    <p>Product:<?php echo $stt; ?></p>
    <p>Name of product:<?php echo $item['name']; ?></p>
    <p>Price of product:<?php echo number_format($item["price"]); ?>VNĐ</p>
    <p>Type :<?php
    
    if($item['product_type_id']==1){
        echo "Calendar";
    }
    else if($item['product_type_id']==2){
        echo "Magazine";
    }
    else{
        echo "Diary";
    }
      
    ?></p>
    <p>Material:<?php echo $item['material']; ?></p>
    <p>Size:<?php echo $item['width']; ?> X <?php echo $item['height']; ?> cm</p>
    <p>Quantity:<?php echo $item['quantitative']; ?>g</p>

    <?php

    }

    $htd = new HTML_TO_DOC();
    $htd->createDoc("source.html", "my-document",1);
    ?>
</body>
</html>

