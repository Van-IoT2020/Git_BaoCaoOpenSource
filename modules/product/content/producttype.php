<?php 
//Count Product Type exist
function countProductTypeExist($conn) {
    $sm_check = $conn->prepare("SELECT * FROM product_type");
    $sm_check->execute();
    $count = $sm_check->rowCount();
    return $count;
}

//Create ProductType
function createProductType($conn, $data) {
    $sm = $conn->prepare("INSERT INTO `product_type`(`name`, `process`, `packing`, `unit_of_measure`, `function`, `user_manual`) VALUES (:name, :process, :packing, :unit_of_measure, :function, :user_manual)");
    $sm->bindParam(":name", $data["name"], PDO::PARAM_STR);
    $sm->bindParam(":process", $data["process"], PDO::PARAM_INT);
    $sm->bindParam(":packing", $data["packing"], PDO::PARAM_STR);
    $sm->bindParam(":unit_of_measure", $data["unit_of_measure"], PDO::PARAM_STR);
    $sm->bindParam(":function", $data["function"], PDO::PARAM_STR);
    $sm->bindParam(":user_manual", $data["user_manual"], PDO::PARAM_STR);
    $sm->execute();
}

// ProductType list
function getDataProductTypeList($conn) {
    $sm = $conn->prepare("SELECT * from product_type");
    $sm->execute();
    $data = $sm->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

//Delete ProductType
function deleteProductType($conn, $id) {
    $sm = $conn->prepare("DELETE FROM product_type WHERE id = :id");
    $sm->bindParam(":id", $id, PDO::PARAM_INT);
    $sm->execute();
}

//Check ProductType exist .......
function checkProductTypeExist($conn, $data) {
    $sm_check = $conn->prepare("SELECT * FROM product_type WHERE name = :name");
    $sm_check->bindParam(":name", $data["name"], PDO::PARAM_STR);
    $sm_check->execute();
    $count = $sm_check->rowCount();
    if ($count != 0) return true;
    return false;
}

//Check ProductType exist edit
function checkProductTypeExistEdit($conn, $data,$id) {
    $sm_check = $conn->prepare("SELECT * FROM product_type WHERE name = :name and id != :id");
    $sm_check->bindParam(":name", $data["name"], PDO::PARAM_STR);
    $sm_check->bindParam(":id", $id, PDO::PARAM_INT);
    $sm_check->execute();
    $count = $sm_check->rowCount();
    if ($count != 0) return true;
    return false;
}

//Edit 
function getDataProductType($conn, $id) {
    $sm = $conn->prepare("SELECT * FROM product_type WHERE id = :id"); 
    $sm->bindParam(":id", $id, PDO::PARAM_INT);
    $sm->execute();
    $data = $sm->fetch(PDO::FETCH_ASSOC);
    return $data;
}

//update 
function updateProductType($conn,$data){

    if (empty($data["function"]) && empty($data["user_manual"])) {
        $sm = $conn->prepare("UPDATE `product_type` SET `name`= :name,`process` = :process, `packing` = :packing, `unit_of_measure` = :unit_of_measure  WHERE id=:id"); 
    }

    if (!empty($data["function"]) && empty($data["user_manual"])) {
        $sm = $conn->prepare("UPDATE `product_type` SET `name`= :name,`process` = :process, `packing` = :packing, `unit_of_measure` = :unit_of_measure, `function` = :function WHERE id=:id"); 
    }

    if (empty($data["function"]) && !empty($data["user_manual"])) {
        $sm = $conn->prepare("UPDATE `product_type` SET `name`= :name,`process` = :process, `packing` = :packing, `unit_of_measure` = :unit_of_measure, `user_manual` = :user_manual  WHERE id=:id"); 
    }

    if (!empty($data["function"]) && !empty($data["user_manual"])) {
        $sm = $conn->prepare("UPDATE `product_type` SET `name`= :name,`process` = :process, `packing` = :packing, `unit_of_measure` = :unit_of_measure, `function` = :function, `user_manual` = :user_manual  WHERE id=:id"); 
    }

    $sm->bindParam(":id", $data["id"], PDO::PARAM_INT);
    $sm->bindParam(":name", $data["name"], PDO::PARAM_STR);
    $sm->bindParam(":process", $data["process"], PDO::PARAM_INT);
    $sm->bindParam(":packing", $data["packing"], PDO::PARAM_STR);
    $sm->bindParam(":unit_of_measure", $data["unit_of_measure"], PDO::PARAM_STR);

    if (!empty($data["function"])) {
        $sm->bindParam(":function", $data["function"], PDO::PARAM_STR);
    }
    if (!empty($data["user_manual"])) {
        $sm->bindParam(":user_manual", $data["user_manual"], PDO::PARAM_STR);
    }
    $sm->execute();


}
