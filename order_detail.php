<?php
ob_start();
require "frontend_header.php";

if (!isset($_SESSION['login_user'])){
    header("Location: login.php");
    exit();
}


$user_id = $_GET['uid'];
$order_id = $_GET['oid'];

$user_qry = "SELECT * FROM orders 
             INNER JOIN users ON orders.user_id = users.id
             WHERE orders.user_id = :uid";
$stmt = $conn->prepare($user_qry);
$stmt->bindParam(':uid',$user_id);
$stmt->execute();
$details = $stmt->fetchAll();

//under table
$qry = "SELECT * FROM item_order 
        INNER JOIN orders ON orders.id = item_order.order_id
        INNER JOIN items ON items.id = item_order.item_id
        WHERE item_order.order_id = :oid";
$stmt = $conn->prepare($qry);
$stmt->bindParam('oid',$order_id);
$stmt->execute();
$slips = $stmt->fetchAll();
?>
<div class="p-5">
    <div class="app-title">
        <div>
            <h1><i class="fa fa-file-text-o"></i> Invoice</h1>
            <p>A Printable Invoice Format</p>
        </div>
        <ul class="app-breadcrumb breadcrumb">
            <li class="breadcrumb-item"><a href="order_history.php">Order History</a></li>
            <li class="breadcrumb-item"><a href="#">Invoice</a></li>
        </ul>
    </div>
    <div class="row p-5">
        <div class="col-md-12">
            <div class="tile p-5">
                <section class="invoice">
                    <div class="row mb-4">
                        <div class="col-6">
                            <h2 class="page-header"><i class="fa fa-globe"></i> Vali Inc</h2>
                        </div>
                        <div class="col-6">
                            <h5 class="text-right">Date: <?= $details[0]['order_date']; ?></h5>
                        </div>
                    </div>
                    <div class="row invoice-info">
                        <div class="col-4">From
                            <address><strong>Vali Inc.</strong><br>518 Akshar Avenue<br>Gandhi Marg<br>New Delhi<br>Email: hello@vali.com</address>
                        </div>
                        <div class="col-4">To
                            <address><strong><?= $details[0]['name']; ?></strong><br><?= $details[0]['address']; ?><br>Phone: <?= $details[0]['phone']; ?><br>Email: <?= $details[0]['email']; ?></address>
                        </div>
                        <div class="col-4"><b>Invoice #<?= $details[0]['voucherno'] ?></b><br><br><b><b>Total :</b>
                                <?php
                                $total = 0;
                                foreach ($slips as $slip)
                                {
                                    if($slip['discount'] != 0 || $slip['discount'] != "")
                                    {
                                        $rPrice = $slip['discount'];
                                    }
                                    else
                                    {
                                        $rPrice = $slip['price'];
                                    }
                                    $result = $rPrice * $slip['qty'];
                                    $total+=$result;
                                }
                                echo $total." mmk";
                                ?>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 table-responsive">
                            <table class="table table-striped">
                                <thead>
                                <tr>
                                    <th>Qty</th>
                                    <th>Product</th>
                                    <th>Serial #</th>
                                    <th>Description</th>
                                    <th>Subtotal</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                //                                echo "<pre>".print_r($slips,true)."</pre>";
                                foreach ($slips as $slip)
                                {
                                    ?>
                                    <tr>
                                        <td><?= $slip['qty'] ?></td>
                                        <td><?= $slip['name'] ?></td>
                                        <td><?= $slip['codeno'] ?></td>
                                        <td><?= $slip['description'] ?></td>
                                        <td><?php
                                            if($slip['discount'] != 0 || $slip['discount'] != "")
                                            {
                                                $rPrice = $slip['discount'];
                                            }
                                            else
                                            {
                                                $rPrice = $slip['price'];
                                            }
                                            echo $result = $rPrice * $slip['qty'];
                                            ?> mmk</td>
                                    </tr>
                                <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row d-print-none mt-2">
                        <div class="col-12 text-right"><a class="btn btn-primary" href="javascript:window.print();" target="_blank"><i class="fa fa-print"></i> Print</a></div>
                    </div>
                </section>
            </div>
        </div>
    </div>

</div>
<?php
require 'frontend_footer.php';

?>
