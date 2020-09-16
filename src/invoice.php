<?php
include_once "classes/Cart.php";
include_once "classes/Customer.php";
$cmr = new Customer();
$ct = new Cart();

if (isset($_POST['submit'])){
    $orderInsert = $ct->orderProduct($_POST);
    $delData = $ct->delCustomerCart();

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory | Invoice</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
    <!-- Navbar -->
    <?php
    include_once "inc/header.php";
    ?>
    <!-- /.navbar -->
    <?php
    include_once "inc/sidebar.php";
    ?>
    <!-- Main Sidebar Container -->


    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Invoice</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Invoice</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="content">
            <?php
            $getPd = $ct->getCartProduct();
            if ($getPd){
                $i = 0;
                $sum = 0;
                $quantity = 0;
                while ($result = $getPd->fetch_assoc()) {
                    $i++;
                    ?>
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="callout callout-info">
                            <h5><i class="fas fa-info"></i> Note:</h5>
                            This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
                        </div>
                        <!-- Main content -->
                        <div class="invoice p-3 mb-3">
                            <!-- title row -->
                            <div class="row">
                                <div class="col-12">
                                    <h4>
                                        <i class="fas fa-globe"></i> Inventory.
                                        <small class="float-right">Date: <?=date('d/m/Y')?></small>
                                    </h4>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- info row -->
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
                                <!-- /.col -->
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
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <div class="col-12 table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Qty</th>
                                            <th>Product</th>
                                            <th>Product Code</th>
                                            <th>Price</th>
                                            <th>Subtotal</th>
                                        </tr>
                                        </thead>
                                        <tbody>

                                        <tr>
                                            <td><?= $i?></td>
                                            <td><?= $result['quantity'] ?></td>
                                            <td><?= $result['productName'] ?></td>
                                            <td><?= $result['productCode'] ?></td>
                                            <td><?= $result['price'] ?></td>
                                            <td>
                                                <?php
                                                $subTotal = $result['price'] * $result['quantity'];
                                                echo $subTotal;
                                                ?>
                                            </td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.col -->
                            </div>
                            <!-- /.row -->
                            <div class="row">
                                <!-- accepted payments column -->
                                <div class="col-6">
                                    <p class="lead">Payment Methods:</p>
                                    <img src="dist/img/credit/visa.png" alt="Visa">
                                    <img src="dist/img/credit/mastercard.png" alt="Mastercard">
                                    <img src="dist/img/credit/american-express.png" alt="American Express">
                                    <img src="dist/img/credit/paypal2.png" alt="Paypal">

                                    <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
                                        Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                                        plugg
                                        dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
                                    </p>
                                </div>
                                <!-- /.col -->
                                <div class="col-6">
                                    <p class="lead">Amount Due  <?= date('d/m/Y') ?></p>
                                    <div class="table-responsive">
                                        <table class="table">
                                            <tr>
                                                <th style="width:50%">Subtotal:</th>
                                                <td><?= $subTotal ?></td>
                                            </tr>
                                            <tr>
                                                <th>Tax (10%)</th>
                                                <td>
                                                    <?php
                                                    $vat = $subTotal * 0.10;
                                                    echo $vat;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Shipping(5%):</th>
                                                <td>
                                                    <?php
                                                    $Shipping = $subTotal * 0.05;
                                                    echo $Shipping;
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Total:</th>
                                                <td>
                                                    <?php
                                                    $total=($Shipping + $subTotal + $vat);
                                                    ?>
                                                    <?= ($total); ?>
                                                </td>
                                            </tr>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="row no-print">
                                <div class="col-12">
                                    <a href="#" onclick="print();" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>

                                    <button type="button" data-toggle="modal" data-target="#payment" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Submit
                                        Payment
                                    </button>

                                    <button type="button" class="btn btn-primary float-right" style="margin-right: 5px;">
                                        <i class="fas fa-download"></i> Generate PDF
                                    </button>
                                </div>
                            </div>
                        </div>
                        <!-- /.invoice -->
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->

            <!-- Modal -->
            <form action="" method="post" enctype="multipart/form-data" >
                <div class="modal fade" id="payment">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="form-group">
                                    <label  for="typeahead">Payment </label>
                                    <div class="">
                                        <select name="paymentStatus" class="form-control" id="">
                                            <option value="HandCash">HandCash</option>
                                            <option value="Check">Check</option>
                                            <option value="Due">Due</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="typeahead">Pay </label>
                                    <input type="text" name="pay" class="form-control"
                                </div>
                                <div class="form-group">
                                    <label for="due">Due </label>
                                    <input type="text" id="due" name="due" class="form-control"
                                </div>
                                <input type="hidden" name="customer_Id" value="<?=$result['customer_Id']?>">
                                <input type="hidden" name="orderDate" value="<?=date('d/m/y')?>">
                                <input type="hidden" name="orderStatus" value="panding">
                                <input type="hidden" name="totalProducts" value="<?=$result['quantity']?>">
                                <input type="hidden" name="subTotal" value="<?= $subTotal ?>">
                                <input type="hidden" name="vat" value="<?= $vat ?>">
                                <input type="hidden" name="shipping" value="<?= $Shipping ?>">
                                <input type="hidden" name="total" value="<?= $total ?>">
                                <input type="hidden" name="product_Id" value="<?=$result['product_Id']?>">
                            </div>
                            <div class="modal-footer justify-content-between">
                                <button type="button" class="btn btn-outline-dark" data-dismiss="modal">Close</button>
                                <button type="submit" name="submit" class="btn btn-outline-dark">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>

            <?php
            }
            }
            ?>
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <?php
    include_once "inc/footer.php";
    ?>


    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
</body>
</html>
