<?php
if (!empty($_SESSION['loginclient'])) {
    // have an account
    if (!empty($_SESSION['loginclient']['id'])) {
?>
        <div class="container" style="min-height: 600px;">
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4" style="padding-top: 100px;">
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Address</label>
                            <input required type="text" name="address" class="form-control" placeholder="Please enter your home address">
                        </div>
                        <button type="submit" name="confirmloo" class="aa-browse-btn">Confirm</button>
                        <!-- <button type="submit" name="confirm" class="aa-browse-btn">Confirm</button> -->
                    </form>
                </div>
                <div class="col-md-4"></div>
            </div>
        </div>
<?php
        if (isset($_POST['confirm'])) {
            $customer_id = $_SESSION['loginclient']['id'];
            $address = $_POST['address'];
            $employee_id = 0;
            $created = time();
            $purchase_form = 'online';
            $status = 1;
            $sm = $conn->prepare("INSERT INTO `pay_invoice`(`customer_id`, `employee_id`, `address`, `created`, `purchase_form`, `status`) VALUES (:customer_id, :employee_id, :address, :created, :purchase_form, :status)");
            $sm->bindParam(":customer_id", $customer_id, PDO::PARAM_INT);
            $sm->bindParam(":employee_id", $employee_id, PDO::PARAM_INT);
            $sm->bindParam(":address", $address, PDO::PARAM_STR);
            $sm->bindParam(":created", $created, PDO::PARAM_INT);
            $sm->bindParam(":purchase_form", $purchase_form, PDO::PARAM_STR);
            $sm->bindParam(":status", $status, PDO::PARAM_INT);
            $sm->execute();

            $pay_invoice_id = $conn->lastInsertId();
            foreach ($_SESSION['cart'] as $item) {
                $sm_detail = $conn->prepare("INSERT INTO `invoice_detail`(`pay_invoice_id`, `product_id`, `amount`, `price`) VALUES (:pay_invoice_id, :product_id, :amount, :price)");
                $sm_detail->bindParam(":pay_invoice_id", $pay_invoice_id, PDO::PARAM_INT);
                $sm_detail->bindParam(":product_id", $item['id'], PDO::PARAM_INT);
                $sm_detail->bindParam(":amount", $item['quantity'], PDO::PARAM_INT);
                $sm_detail->bindParam(":price", $item['price'], PDO::PARAM_INT);
                $sm_detail->execute();
            }
            unset($_SESSION['cart']);
            header("location:index.php");
            exit();
        }
    } else {
    }
} else {
    // no account
}
?>