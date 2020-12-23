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