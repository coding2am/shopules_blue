<?php  
    require 'header.php';
    require 'db_connect.php';


$qry = "SELECT * FROM orders";
$stmt = $conn->prepare($qry);
$stmt->execute();
$orders = $stmt->fetchAll();



?>
<div class="app-title">
    <div>
        <h1> <i class="icofont-list"></i> Order </h1>
    </div>
    <ul class="app-breadcrumb breadcrumb side">
        <a href="category_new.php" class="btn btn-outline-primary">
            <i class="icofont-plus"></i>
        </a>
    </ul>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="tile">
            <div class="tile-body">
                <div class="table-responsive">
                    <table class="table table-hover table-bordered" id="sampleTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th>Voucher Number</th>
                                <th>Total</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                        $num = 1;
                        foreach ($orders as $order)
                        { ?>

                            <tr>
                                <td><?= $num++; ?></td>
                                <td><?= $order['order_date'] ?></td>
                                <td><?= $order['voucherno'] ?></td>
                                <td><?= $order['total']." mmk" ?></td>
                                <td><?= $order['status'] ?></td>
                                <td>
                                    <a href="page_invoice.php?oid=<?= $order['id'] ?>&uid=<?= $order['user_id'] ?>" class="btn btn-outline-info">
                                        <i class="icofont-exclamation"></i>
                                    </a>
                                    <a onclick="return confirm('Are you sure')" href="order_confirm.php?oid=<?= $order['id'] ?>" class="btn btn-outline-success">
                                        <i class="icofont-check"></i>
                                    </a>
                                    <a onclick="return confirm('Are you sure')" href="order_cancel.php?oid=<?= $order['id'] ?>" class="btn btn-outline-danger">
                                        <i class="icofont-close"></i>
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php  
    require 'footer.php'
?>