<?php
    if(isset($_GET['idsp']))
    {
        $idsp=$_GET['idsp'];
        unset($_SESSION['cart'][$idsp]);
    }
    header("location:index.php?p=cart");
    exit();
?> 