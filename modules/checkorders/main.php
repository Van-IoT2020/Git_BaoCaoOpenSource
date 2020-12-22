<?php

function payInvoiceClientList($conn,$idClient) {
    $sm = $conn->prepare("SELECT * FROM pay_invoice WHERE customer_id = :customer_id ORDER BY id DESC");
    $sm->bindParam(":customer_id", $idClient, PDO::PARAM_INT);
    $sm->execute();
    $data = $sm->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

function payInvoiceClientDetailList($conn,$idInvoice) {
    $sm = $conn->prepare("SELECT i.*, p.avatar, p.name, p.price as pricep FROM invoice_detail as i, product as p WHERE i.pay_invoice_id = $idInvoice and i.product_id = p.id ORDER BY i.id DESC");
    $sm->execute();
    $data = $sm->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

?>


<div class="container">
    <div class="row" style="min-height: 800px;">
        <div class="col-md-12">
            <h3 class="text-center">Information of orders</h3>
            <?php
            if (!empty($_SESSION['loginclient']['id'])) {
                // co tai khoan roi
                $idClient = $_SESSION['loginclient']['id'];
                $dataInvoice = payInvoiceClientList($conn,$idClient);
                foreach($dataInvoice as $itemInvoice){
                    $idInvoice = $itemInvoice['id'];
            ?>
                <div style="padding: 20px 10px;border:1px solid gray;margin:20px 0;">
                    <h4>Orders placed at <?php echo date('H:i:s - d/m/Y', $itemInvoice["created"]) ?> </h4>
                    <h5>
                        <?php 
                            if($itemInvoice['status'] == 1) {
                                echo "Chưa nhận hàng";
                            } else {
                                echo "Đã nhận hàng";
                            }
                        ?>
                    </h5>
                    <table class="table table-hover table-striped">
                        <thead>
                            <tr>
                                <th>SST</th>
                                <th>Image</th>
                                <th>Name Product</th>
                                <th>Amount</th>
                                <th>Price</th>
                                <th>Total money</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            $payInvoiceDetail = payInvoiceClientDetailList($conn,$idInvoice);
                            $stt = 0;
                            $payment = 0;
                            foreach($payInvoiceDetail as $item) {
                            $stt++;
                            $payment += $item['price']*$item['amount'];
                        ?>
                            <tr>
                                <td><?php echo $stt; ?></td>
                                <td>
                                    <img width="50px" height="70px" src="public/image/product/<?php echo $item['avatar']; ?>" alt="">
                                </td>
                                <td><?php echo $item['name']; ?></td>
                                <td><?php echo $item['amount']; ?></td>
                                <td><?php echo number_format($item['pricep']); ?>VNĐ</td>
                                <td><?php echo number_format($item['price']*$item['amount']); ?>VNĐ</td>
                            </tr>
                        <?php } ?>
                                <td colspan="6">Total payment amount: <?php echo number_format("$payment");?>VNĐ</td>
                        </tbody>
                    </table>
                </div>
            <?php
                }
            } else {
                if(!empty($_SESSION['loginclient']['email'])) {
            ?>
                <h4>Bạn vui lòng cập nhật tài khoản</h4>
            <?php
                } else {
            ?>
                <h4>Bạn vui lòng đăng nhập tài khoản</h4>
            <?php
                }
            }
            ?>
        </div>
    </div>
</div>