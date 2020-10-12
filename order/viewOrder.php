<?php
session_start();
include_once "../classes/Cart.php";
$ct = new Cart();

if (!isset($_REQUEST['orId']) || $_REQUEST['orId'] == NULL){

header("location:404.php");

}
else{
$id = $_REQUEST['orId'];
}
?>
<?php
if (isset($_POST['submit'])){
    $orderStatus=$_POST['orderStatus'];
    $orderInsert = $ct->updateOrderProduct($id,$orderStatus);

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory | View Order</title>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <?php
    include_once "../inc/header.php";
    ?>
    <!-- /.navbar -->
    <?php
    include_once "../inc/sidebar.php";
    ?>
    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <?php
        $getPd = $ct->getViewOrderProduct($id);
        if ($getPd){
        while ($result = $getPd->fetch_assoc()){

        ?>
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1> Order Status : <b><?= $result['orderStatus'] ?> </b></h1>

                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">View Order</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> Inventory.
                                        <small class="float-right">Date: <?= date('d/m/Y') ?></small>
                                    </h4>
                                </div>
                            </div>
                            <div class="row invoice-info">
                                <div class="col-sm-4 invoice-col">
                                    From
                                    <address>
                                        <strong>MD. Mahtab Uddin.</strong><br>
                                        Asma Tower, <br>
                                        hathazari<br>
                                        Phone: 01838211715<br>
                                        Email: mahtab.u1484@gmail.com
                                    </address>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    To
                                    <address>
                                        <strong><?= $result['firstname'] ?> <?= $result['lastname'] ?></strong><br>
                                        <?= $result['address'] ?><br>
                                        <?= $result['city'] ?><br>
                                        Phone: <?= $result['phone'] ?><br>
                                        Email: <?= $result['email'] ?>
                                    </address>
                                </div>
                                <div class="col-sm-4 invoice-col">
                                    <b>Invoice #<?= $result['id'] ?></b><br>
                                    <br>
                                    <b>Order ID:</b> <?= $result['customer_Id'] ?><br>
                                    <b>Payment Due:</b> <?= date('d/m/Y') ?><br>
                                    <b>Account:</b> <?= $result['accountNumber'] ?>
                                </div>
                            </div>
                            <?php
                            }
                            }
                            ?>
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>Quantity</th>
                                            <th>Product</th>
                                            <th>Product Code</th>
                                            <th>Price</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $getPd = $ct->getViewOrderDetailsProduct($id);
                                        if ($getPd) {
                                        while ($result = $getPd->fetch_assoc()) {

                                        ?>
                                        <tr>
                                            <td><?= $result['quantity'] ?></td>
                                            <td><?= $result['productName'] ?></td>
                                            <td><?= $result['productCode'] ?></td>
                                            <td><?= $result['price'] ?></td>
                                        </tr>
                                            <?php
                                        }
                                        }
                                        ?>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <p class="lead">Payment Methods:</p>
                                    <img src="../dist/img/credit/visa.png" alt="Visa">
                                    <img src="../dist/img/credit/mastercard.png" alt="Mastercard">
                                    <img src="../dist/img/credit/american-express.png" alt="American Express">
                                    <img src="../dist/img/credit/paypal2.png" alt="Paypal">
                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly
                                        ning heekya handango imeem
                                        plugg
                                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                    </p>
                                </div>
                                <div class="col-6">
                                    <p class="lead">Amount Due <?= date('d/m/Y') ?></p>
                                    <div class="table-responsive">
                                        <?php
                                        $getPd = $ct->getViewOrderProduct($id);
                                        if ($getPd){
                                        while ($result = $getPd->fetch_assoc()) {

                                            ?>
                                            <table class="table">
                                                <tr>
                                                    <th style="width:50%">Subtotal:</th>
                                                    <td><?= $result['subTotal'] ?></td>
                                                </tr>
                                                <tr>
                                                    <th>Tax (10%)</th>
                                                    <td>
                                                        <?= $result['vat'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Shipping(5%):</th>
                                                    <td>
                                                        <?= $result['shipping'] ?>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <th>Total:</th>
                                                    <td> <?= $result['total'] ?></td>
                                                </tr>
                                            </table>
                                            <?php
                                        }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                            <form action="" method="post">
                                <div class="row no-print">
                                    <div class="col-12">
                                        <a href="#" rel="noopener" onclick="print();" target="_blank"
                                           class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                                        <button type="submit" name="submit" class="btn btn-success float-right">
                                            <i class="far fa-credit-card"></i> Approved
                                        </button>
                                        <input type="hidden" value="success" name="orderStatus">
                                        <button type="submit" class="btn btn-primary float-right"
                                                style="margin-right: 5px;">
                                            <i class="fas fa-download"></i> Generate PDF
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<?php
include_once "../inc/tostr.php";
?>
</body>
</html>
