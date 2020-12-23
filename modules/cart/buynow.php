<?php
    if(isset($_GET['idsp'])) {
        if(empty($_SESSION['cart'])) {
            $_SESSION['cart'] = array();
        }
        $idsp=$_GET['idsp'];
        $stmt=$conn->prepare("SELECT * FROM product where id=:id");
        $stmt->bindParam(":id",$idsp,PDO::PARAM_INT);
        $stmt->execute();
        $data=$stmt->fetch(PDO::FETCH_ASSOC);
        if(!isset($_SESSION['cart'][$idsp]['quantity'])){
            $_SESSION['cart'][$idsp]['id']=$idsp;
            $_SESSION['cart'][$idsp]['quantity']=1;
            $_SESSION['cart'][$idsp]['price']=$data['price'];
            $_SESSION['cart'][$idsp]['name']=$data['name'];
            $_SESSION['cart'][$idsp]['avatar']=$data['avatar'];
        }
        header("location:index.php?p=cart");
        exit();
    } else {
        header("location:index.php");
        exit();
    }
?>