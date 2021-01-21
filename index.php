<?php
include_once "pos/connection.php";
include_once "classes/Employee.php";
$emp = new Employee();
?>

<?php
include_once "classes/Cart.php";
$ct = new Cart();
include_once "classes/Expence.php";
$expence = new Expence();
include_once "classes/Report.php";
$rep = new Report();
?>
<?php
$sql = "SELECT * FROM products WHERE status = 1";
$query = $conn->query($sql);
$countProduct = $query->num_rows;

$orderSql = "SELECT * FROM orders";
$orderQuery = $conn->query($orderSql);
$countOrder = $orderQuery->num_rows;
//
$totalRevenue = 0;
while ($orderResult = $orderQuery->fetch_assoc()) {
    $totalRevenue += $orderResult['total'];
}

$lowStockSql = "SELECT * FROM products WHERE stock_quantity <= 5 AND status = 1";
$lowStockQuery = $conn->query($lowStockSql);
$countLowStock = $lowStockQuery->num_rows;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory | Dashboard</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- SweetAlert2 -->
    <link rel="stylesheet" href="plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" href="plugins/toastr/toastr.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">
<div class="wrapper">

    <!-- Navbar -->
    <?php
    include_once "inc/header.php";
    ?>
    <!-- /.navbar -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="<?=Session::get('image')?>" class="img-circle elevation-3" alt="Admin Image">
                </div>
                <div class="info">
                    <a href="index.php" class="d-block"><h5><?=Session::get('name')?></h5></a>
                </div>
            </div>

            <!-- SidebarSearch Form -->
            <div class="form-inline">
                <div class="input-group" data-widget="sidebar-search">
                    <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                    <div class="input-group-append">
                        <button class="btn btn-sidebar">
                            <i class="fas fa-search fa-fw"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                         with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="pos/index.php" class="nav-link">
                            <i class="fa fa-shopping-cart nav-icon"></i>
                            <p>Pos</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="report.php" class="nav-link">
                            <i class="fa fa-shopping-cart nav-icon"></i>
                            <p>Report</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="invoice.php" class="nav-link">
                            <i class="fas fa-file-invoice-dollar nav-icon"></i>
                            <p>Invoice</p>
                        </a>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link  ">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Employee
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="employee/addEmployee.php" class="nav-link  ">
                                    <i class="far fa-user nav-icon"></i>
                                    <p>Add Employee</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="employee/allEmployee.php" class="nav-link">
                                    <i class="far fa-user nav-icon"></i>
                                    <p>All Employee</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Customer
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="customer/addCustomer.php" class="nav-link  ">
                                    <i class="far fa-user nav-icon"></i>
                                    <p>Add Customer</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="customer/allCustomer.php" class="nav-link">
                                    <i class="far fa-user nav-icon"></i>
                                    <p>All Customer</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link  ">
                            <i class="nav-icon fas fa-user"></i>
                            <p>
                                Suplier
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="supliers/addSuplier.php" class="nav-link  ">
                                    <i class="far fa-user nav-icon"></i>
                                    <p>Suplier add</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="supliers/allSuplier.php" class="nav-link">
                                    <i class="far fa-user nav-icon"></i>
                                    <p>Suplier all</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link  ">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Category
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="category/addCategory.php" class="nav-link  ">
                                    <i class="far fa-fa-list-alt nav-icon"></i>
                                    <p>Add Category</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="category/allCategory.php" class="nav-link">
                                    <i class="far fa-fa-list-alt nav-icon"></i>
                                    <p>All Category</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link  ">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Brand
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="brand/addBrand.php" class="nav-link  ">
                                    <i class="far fa-fa-list-alt nav-icon"></i>
                                    <p>Add Brand</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="brand/allBrand.php" class="nav-link">
                                    <i class="far fa-fa-list-alt nav-icon"></i>
                                    <p>All Brand</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link  ">
                            <i class="nav-icon fas fa-list-alt"></i>
                            <p>
                                Size
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="size/addSize.php" class="nav-link  ">
                                    <i class="far fa-fa-list-alt nav-icon"></i>
                                    <p>Add Size</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="size/allSize.php" class="nav-link">
                                    <i class="far fa-fa-list-alt nav-icon"></i>
                                    <p>All Size</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link  ">
                            <i class="nav-icon fas fa-brush"></i>
                            <p>
                                Color
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="color/addColor.php" class="nav-link  ">
                                    <i class="far fa-brush nav-icon"></i>
                                    <p>Add Color</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="color/allColor.php" class="nav-link">
                                    <i class="far fa-brush nav-icon"></i>
                                    <p>All Color</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link  ">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>
                                Product
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="product/addProduct.php" class="nav-link  ">
                                    <i class="fab fa-product-hunt nav-icon"></i>
                                    <p>Add Product</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="product/allProduct.php" class="nav-link">
                                    <i class="fab fa-product-hunt nav-icon"></i>
                                    <p>All Product</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link  ">
                            <i class="nav-icon fas fa-money-bill-alt"></i>
                            <p>
                                Advance Salary
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="advanceSalary/addAdvanceSalary.php" class="nav-link  ">
                                    <i class="far fa-money-bill-alt nav-icon"></i>
                                    <p>Add Advance Salary</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="advanceSalary/allAdvanceSalary.php" class="nav-link">
                                    <i class="far fa-money-bill-alt nav-icon"></i>
                                    <p>All Advance Salary</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="advanceSalary/paySalary.php" class="nav-link">
                                    <i class="far fa-money-bill-alt nav-icon"></i>
                                    <p>pay</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="advanceSalary/viewAdvanceSalary.php" class="nav-link">
                                    <i class="far fa-money-bill-alt nav-icon"></i>
                                    <p>view Advance Salary</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link  ">
                            <i class="nav-icon fas fa-money-bill-alt"></i>
                            <p>
                                Sales Report
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="sales_report/monthlyReport.php" class="nav-link">
                                    <i class="far fa-money-bill-alt nav-icon"></i>
                                    <p>monthly Sales Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="sales_report/report.php" class="nav-link">
                                    <i class="far fa-money-bill-alt nav-icon"></i>
                                    <p>Today Sales Report</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="sales_report/yearlyReport.php" class="nav-link">
                                    <i class="far fa-money-bill-alt nav-icon"></i>
                                    <p>yearly Sales Report</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link  ">
                            <i class="nav-icon fas fa-money-bill-alt"></i>
                            <p>
                                Expense
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="expense/addExpence.php" class="nav-link  ">
                                    <i class="far fa-money-bill-alt nav-icon"></i>
                                    <p>Add Expense</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="expense/monthlyExpence.php" class="nav-link">
                                    <i class="far fa-money-bill-alt nav-icon"></i>
                                    <p>monthly Expense</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="expense/TodayExpence.php" class="nav-link">
                                    <i class="far fa-money-bill-alt nav-icon"></i>
                                    <p>Today Expence</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="expense/yearlyExpence.php" class="nav-link">
                                    <i class="far fa-money-bill-alt nav-icon"></i>
                                    <p>yearly Expence</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-item ">
                        <a href="#" class="nav-link  ">
                            <i class="nav-icon fab fa-product-hunt"></i>
                            <p>
                                Order
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="order/pendingOrder.php" class="nav-link  ">
                                    <i class="fab fa-product-hunt nav-icon"></i>
                                    <p>All Pending Order</p>
                                </a>
                            <li class="nav-item">
                                <a href="order/viewOrder.php" class="nav-link">
                                    <i class="fab fa-product-hunt nav-icon"></i>
                                    <p>All Order</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>
    <!-- Main Sidebar Container -->

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0 text-dark">Dashboard</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>

        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3><?=$countOrder?></h3>
                                <p>New Orders</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="order/pendingOrder.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3><?=$countLowStock?></h3>
                                <p>Point Of Sale</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <a href="pos/index.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning">
                            <div class="inner">
                                <h3><?=$totalRevenue?>TK</h3>
                                <p>Revenue</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="order/pendingOrder.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3><?=$countProduct?></h3>
                                <p>Product in Stock</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <a href="product/allProduct.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                <!-- /.row -->
                <!-- Main row -->
                <div class="row">
                    <!-- Left col -->
                    <section class="col-lg-7 connectedSortable">
                        <!-- Custom tabs (Charts with tabs)-->
                        <div class="card">
                            <div class="card-header">
                                <h1 class="card-title">
                                    <i class="fas fa-chart-pie mr-1"></i>
                                    Pending Order

                                </h1>

                                <div class="card-tools">
                                    <ul class="nav nav-pills ml-auto">
                                        <li class="nav-item">
                                            <p class="lead">please confirm those product</p>
                                        </li>
                                    </ul>
                                </div>
                            </div><!-- /.card-header -->
                            <div class="card-body">
                                <div class="tab-content p-0">
                                    <!-- Morris chart - Sales -->

                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
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
                                            while ($result=$getPd->fetch_assoc()) {
                                                ?>
                                                <tr>
                                                    <td><?=$result['firstname']?></td>
                                                    <td><?=$result['orderDate']?></td>
                                                    <td><?=$result['totalProducts']?></td>
                                                    <td><?=$result['total']?></td>
                                                    <td><?=$result['paymentStatus']?></td>
                                                    <td>
                                                        <span class="badge badge-danger"> <?=$result['orderStatus']?></span>
                                                    </td>
                                                    <td>
                                                        <a class="btn btn-info" href="viewOrder.php?orderDetailsId=<?= $result['o_Id']; ?>"><i class="fa fa-eye"></i></a>
                                                    </td>
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
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
                            </div><!-- /.card-body -->
                        </div>
                        <!-- /.card -->

                        <!-- DIRECT CHAT -->
                        <div class="card direct-chat direct-chat-primary">
                            <div class="card-header">
                                <h3 class="card-title">Generate Report</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="col-lg-12 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger">
                                        <div class="inner">
                                            <p>Generate Report</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <a href="report.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <!-- /.card-footer-->
                        </div>
                        <!--/.direct-chat -->

                        <!-- TO DO List -->
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    <i class="ion ion-clipboard mr-1"></i>
                                    Our Employee
                                </h3>

                                <div class="card-tools">
                                    <ul class="pagination pagination-sm">
                                        <li class="page-item"><a href="#" class="page-link">&laquo;</a></li>
                                        <li class="page-item"><a href="#" class="page-link">1</a></li>
                                        <li class="page-item"><a href="#" class="page-link">2</a></li>
                                        <li class="page-item"><a href="#" class="page-link">3</a></li>
                                        <li class="page-item"><a href="#" class="page-link">&raquo;</a></li>
                                    </ul>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <ul class="todo-list" data-widget="todo-list">
                                    <table id="example1" class="table">
                                        <thead>
                                        <tr>
                                            <th>SL</th>
                                            <th>Name</th>
                                            <th>image</th>
                                        </tr>
                                        </thead>
                                        <?php
                                        $getEmployee = $emp->getAllEmployee();
                                        if ($getEmployee){
                                            $i=0;
                                            while ($result = $getEmployee->fetch_assoc()) {
                                                $i++;

                                                ?>
                                                <tr class="">
                                                    <td><?= $i?></td>
                                                    <td><?= $result['firstname']; ?> <?= $result['lastname'];?></td>
                                                    <td>
                                                        <img src="img/<?= $result['image']; ?>" height="60px" width="60px"alt="">
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
                                            <th>image</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </ul>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer clearfix">
                                <button type="button" class="btn btn-info float-right"><i class="fas fa-plus"></i> Add item</button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </section>
                    <!-- /.Left col -->
                    <!-- right col (We are only adding the ID to make the widgets sortable)-->
                    <section class="col-lg-5 connectedSortable">

                        <!-- Map card -->
                        <div class="card bg-gradient">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    Monthly Sales Report
                                </h3>
                                <!-- card tools -->
                                <div class="card-tools">
                                    <button type="button" class="btn btn-primary btn-sm daterange" title="Date range">
                                        <i class="far fa-calendar-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-primary btn-sm" data-card-widget="collapse" title="Collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                </div>
                                <!-- /.card-tools -->
                            </div>
                            <div class="card-body">
                                <table id="example1" class="table">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Order Date</th>
                                        <th>Client Name</th>
                                        <th>Contact</th>
                                        <th>Grand Total</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $getexpence = $rep->getMonthlyReport();
                                    if ($getexpence){
                                        $i=0;
                                        $totalAmount=0;
                                        while ($result = $getexpence->fetch_assoc()) {
                                            $i++;
                                            ?>
                                            <tr class="">
                                                <td><?= $i?></td>
                                                <td><?=$result['orderDate'];?></td>
                                                <td><?=$result['firstname'];?></td>
                                                <td><?=$result['phone'];?></td>
                                                <td><?=$result['total'];?></td>
                                            </tr>

                                            <?php
                                            $totalAmount += $result['total'];
                                        }
                                    }
                                    ?>
                                    <tr>
                                        <td colspan="5">
                                            <h1 class="text-center">Total Sales: <?=$totalAmount;?> </h1>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!-- /.card -->

                        <!-- solid sales graph -->
                        <div class="card">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-money-bill mr-1"></i>
                                    Expense
                                    <p class="lead text-right"> Monthly Expense</p>
                                </h3>

                                <div class="card-tools">
                                    <button type="button" class="btn  btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <!--                                <canvas class="chart" id="line-chart" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%;"></canvas>-->
                                <table id="example1" class="table">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Details</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $getexpence = $expence->getMonthlyExpence();
                                    if ($getexpence){
                                        $i=0;
                                        $totalAmount=0;
                                        while ($result = $getexpence->fetch_assoc()) {
                                            $i++;

                                            ?>
                                            <tr class="">
                                                <td><?= $i?></td>
                                                <td><?= $result['details']; ?></td>
                                                <td><?= $result['date']; ?></td>
                                                <td><?= $result['amount']; ?></td>
                                            </tr>

                                            <?php
                                            $totalAmount += $result['amount'];
                                        }
                                    }
                                    ?>
                                    </tbody>
                                </table>

                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <h1 class="text-center">Total Expanse: <?=$totalAmount?> </h1>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->

                        <!-- Calendar -->
                    </section>
                    <!-- right col -->
                </div>
                <!-- /.row (main row) -->
            </div><!-- /.container-fluid -->
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
<!-- jQuery UI 1.11.4 -->
<script src="plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="plugins/moment/moment.min.js"></script>
<script src="plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard.js"></script>
<script src="plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="plugins/toastr/toastr.min.js"></script>
<script>
    $(function() {
        var Toast = Swal.mixin({
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            timer: 3000
        });

        $('.swalDefaultSuccess').click(function() {
            Toast.fire({
                icon: 'success',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });

        $('.swalDefaultError').click(function() {
            Toast.fire({
                icon: 'error',
                title: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
            })
        });

        $('.toastrDefaultSuccess').click(function() {
            toastr.success('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
        $('.toastrDefaultError').click(function() {
            toastr.error('Lorem ipsum dolor sit amet, consetetur sadipscing elitr.')
        });
    });
</script>

</body>
</html>
