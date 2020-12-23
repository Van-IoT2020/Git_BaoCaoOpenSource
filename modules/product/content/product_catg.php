<?php 
        //Product List id_type
        function getDataProductList($conn,$idtype,$start,$onePerPage) {
            $sm = $conn->prepare("SELECT * FROM product
                WHERE product_type_id = :idtype ORDER BY id DESC LIMIT $start, $onePerPage
            ");
            $sm->bindParam(":idtype", $idtype, PDO::PARAM_INT);
            $sm->execute();
            $data = $sm->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        //Product List no id_type
        function getDataProductListnotype($conn,$start,$onePerPage) {
            $sm = $conn->prepare("SELECT * FROM product ORDER BY id DESC LIMIT $start, $onePerPage");
            //$sm->bindParam(":idtype", $idtype, PDO::PARAM_INT);
            $sm->execute();
            $data = $sm->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }

        function rowTotalNoType($conn) {
            $sm = $conn->prepare("SELECT * FROM product ORDER BY id DESC ");
            //$sm->bindParam(":idtype", $idtype, PDO::PARAM_INT);
            $sm->execute();
            return $sm->rowCount();
        }

        function rowTotalType($conn,$idtype) {
            $sm = $conn->prepare("SELECT * FROM product WHERE product_type_id = :idtype");
            $sm->bindParam(":idtype", $idtype, PDO::PARAM_INT);
            $sm->execute();
            return $sm->rowCount();
        }

        function getDataProducttypeid($conn, $id) {
            $sm = $conn->prepare("SELECT * FROM product_type WHERE id = :id"); 
            $sm->bindParam(":id", $id, PDO::PARAM_INT);
            $sm->execute();
            $data = $sm->fetch(PDO::FETCH_ASSOC);
            return $data;
        }
?>