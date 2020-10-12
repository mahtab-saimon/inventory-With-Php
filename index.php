<?php
include_once "classes/Employee.php";
$emp = new Employee();
?>

<?php
include_once "classes/Cart.php";
$ct = new Cart();
include_once "classes/Expence.php";
$expence = new Expence();
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
                                <h3><sup style="font-size: 20px"></sup></h3>

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
                                <h3>

                                </h3>

                                <p>Cutomer</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <a href="customer/allCustomer.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>

                                </h3>

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
                                                    <td><?=$result['firstname']?> <?=$result['lastname']?></td>
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
                                <h3 class="card-title">Direct Chat</h3>

                                <div class="card-tools">
                                    <span title="3 New Messages" class="badge badge-primary">3</span>
                                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" title="Contacts" data-widget="chat-pane-toggle">
                                        <i class="fas fa-comments"></i>
                                    </button>
                                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <!-- Conversations are loaded here -->
                                <div class="direct-chat-messages">
                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 2:00 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            Is this template really for free? That's unbelievable!
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 2:05 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            You better believe it!
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                    <!-- Message. Default to the left -->
                                    <div class="direct-chat-msg">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-left">Alexander Pierce</span>
                                            <span class="direct-chat-timestamp float-right">23 Jan 5:37 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            Working with AdminLTE on a great new app! Wanna join?
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                    <!-- Message to the right -->
                                    <div class="direct-chat-msg right">
                                        <div class="direct-chat-infos clearfix">
                                            <span class="direct-chat-name float-right">Sarah Bullock</span>
                                            <span class="direct-chat-timestamp float-left">23 Jan 6:10 pm</span>
                                        </div>
                                        <!-- /.direct-chat-infos -->
                                        <img class="direct-chat-img" src="dist/img/user3-128x128.jpg" alt="message user image">
                                        <!-- /.direct-chat-img -->
                                        <div class="direct-chat-text">
                                            I would love to.
                                        </div>
                                        <!-- /.direct-chat-text -->
                                    </div>
                                    <!-- /.direct-chat-msg -->

                                </div>
                                <!--/.direct-chat-messages-->

                                <!-- Contacts are loaded here -->
                                <div class="direct-chat-contacts">
                                    <ul class="contacts-list">
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user1-128x128.jpg" alt="User Avatar">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Count Dracula
                            <small class="contacts-list-date float-right">2/28/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">How have you been? I was...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user7-128x128.jpg" alt="User Avatar">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Sarah Doe
                            <small class="contacts-list-date float-right">2/23/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">I will be waiting for...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user3-128x128.jpg" alt="User Avatar">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nadia Jolie
                            <small class="contacts-list-date float-right">2/20/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">I'll call you back at...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user5-128x128.jpg" alt="User Avatar">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Nora S. Vans
                            <small class="contacts-list-date float-right">2/10/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">Where is your new...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user6-128x128.jpg" alt="User Avatar">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            John K.
                            <small class="contacts-list-date float-right">1/27/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">Can I take a look at...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                        <li>
                                            <a href="#">
                                                <img class="contacts-list-img" src="dist/img/user8-128x128.jpg" alt="User Avatar">

                                                <div class="contacts-list-info">
                          <span class="contacts-list-name">
                            Kenneth M.
                            <small class="contacts-list-date float-right">1/4/2015</small>
                          </span>
                                                    <span class="contacts-list-msg">Never mind I found...</span>
                                                </div>
                                                <!-- /.contacts-list-info -->
                                            </a>
                                        </li>
                                        <!-- End Contact Item -->
                                    </ul>
                                    <!-- /.contacts-list -->
                                </div>
                                <!-- /.direct-chat-pane -->
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                <form action="#" method="post">
                                    <div class="input-group">
                                        <input type="text" name="message" placeholder="Type Message ..." class="form-control">
                                        <span class="input-group-append">
                      <button type="button" class="btn btn-primary">Send</button>
                    </span>
                                    </div>
                                </form>
                            </div>
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
                                    <table id="example1" class="table table-bordered table-striped">
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
                        <div class="card bg-gradient-primary">
                            <div class="card-header border-0">
                                <h3 class="card-title">
                                    <i class="fas fa-map-marker-alt mr-1"></i>
                                    Visitors
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
                                <div id="world-map" style="height: 250px; width: 100%;"></div>
                            </div>
                            <!-- /.card-body-->
                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <div class="col-4 text-center">
                                        <div id="sparkline-1"></div>
                                        <div class="text-white">Visitors</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <div id="sparkline-2"></div>
                                        <div class="text-white">Online</div>
                                    </div>
                                    <!-- ./col -->
                                    <div class="col-4 text-center">
                                        <div id="sparkline-3"></div>
                                        <div class="text-white">Sales</div>
                                    </div>
                                    <!-- ./col -->
                                </div>
                                <!-- /.row -->
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
                                <table class="table table-bordered table-striped">
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
                                        }
                                    }
                                    ?>
                                    <tr>
                                    <tr></tr>
                                    <td></td>
                                    <?php
                                    $getTotalexpence = $expence->getTodayTOtalExpence();
                                    if ($getTotalexpence) {
                                        while ($result = $getTotalexpence->fetch_assoc()) {
                                            ?>
                                            <td>
                                                <h1 class="text-center">Total Expanse: <?=$result['sum']?> </h1>
                                            </td>
                                            <?php
                                        }
                                    }
                                    ?>
                                    <td></td>
                                    <td></td>
                                    </tr>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Details</th>
                                        <th>Date</th>
                                        <th>Amount</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer bg-transparent">
                                <div class="row">
                                    <h1>
                                        Monthly Expense
                                    </h1>
                                </div>
                                <!-- /.row -->
                            </div>
                            <!-- /.card-footer -->
                        </div>
                        <!-- /.card -->

                        <!-- Calendar -->
                        <div class="card bg-gradient-success">
                            <div class="card-header border-0">

                                <h3 class="card-title">
                                    <i class="far fa-calendar-alt"></i>
                                    Calendar
                                </h3>
                                <!-- tools card -->
                                <div class="card-tools">
                                    <!-- button with a dropdown -->
                                    <div class="btn-group">
                                        <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown" data-offset="-52">
                                            <i class="fas fa-bars"></i>
                                        </button>
                                        <div class="dropdown-menu" role="menu">
                                            <a href="#" class="dropdown-item">Add new event</a>
                                            <a href="#" class="dropdown-item">Clear events</a>
                                            <div class="dropdown-divider"></div>
                                            <a href="#" class="dropdown-item">View calendar</a>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="collapse">
                                        <i class="fas fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-success btn-sm" data-card-widget="remove">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                                <!-- /. tools -->
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body pt-0">
                                <!--The calendar -->
                                <div id="calendar" style="width: 100%"></div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
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
