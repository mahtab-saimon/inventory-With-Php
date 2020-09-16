<?php
include_once "../classes/Cart.php";
$ct = new Cart();

if (isset($_POST['submit'])){
    $getInsertIntoCart = $ct->addTocart($_POST,$_FILES);
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pos</title>

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
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>General Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">General Form</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <div class="card card-dark">
                            <div class="card-header">
                                <h2 class=" text-center">Pending Orders</h2>
                                <h2 class="card-title text-center">
                                    <?php
                                    if (isset($updateCart)){
                                        echo $updateCart;
                                    }
                                    ?>
                                </h2>
                            </div>
                            <form method="post" enctype="multipart/form-data">
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Quantity</th>
                                            <th>Total Amount</th>
                                            <th>Payment</th>
                                            <th>Order Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $getPd = $ct->getOrderProduct();
                                        if ($getPd){
                                            $i=0;
                                            while ($result=$getPd->fetch_assoc()) {
                                                $i++

                                                ?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$result['firstname']?> <?=$result['lastname']?></td>
                                                    <td><?=$result['orderDate']?></td>
                                                    <td><?=$result['totalProducts']?></td>
                                                    <td><?=$result['total']?></td>
                                                    <td><?=$result['paymentStatus']?></td>
                                                    <td>
                                                        <span class="badge badge-danger"> <?=$result['orderStatus']?></span>
                                                    </td>
                                                    <td>
                                                        <a href="editCustomer.php?cmrId=<?= $result['id']; ?>"
                                                           class="btn btn-info btn-sm"> <i class="fa fa-edit"></i></a>
                                                        <a class="btn btn-info btn-sm" href="viewOrder.php?orId=<?= $result['o_Id']; ?>"><i class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Quantity</th>
                                            <th>Total Amount</th>
                                            <th>Payment</th>
                                            <th>Order Status</th>
                                            <th>Actions</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
    <?php
    include_once "../inc/footer.php";
    ?>
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
<!-- bs-custom-file-input -->
<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
</body>
</html>
