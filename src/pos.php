<?php
include_once "classes/Product.php";
include_once "classes/Category.php";
include_once "classes/Cart.php";
include_once "classes/Suplier.php";
include_once "classes/Customer.php";
$cmr = new Customer();
$pro = new Product();
$ct = new Cart();
if (isset($_GET['delpro'])){
    $id = $_GET['delpro'];
    $delProduct=$ct->delCartById($id);
}
if (isset($_POST['submit'])){
    $getInsertIntoCart = $ct->addTocart($_POST);
}

if (isset($_POST['quantityBtn'])){
    $id=$_POST['id'];
    $quantity=$_POST['quantity'];
    $updateCart  = $ct->updateCartQuantity($quantity, $id);
    if ($quantity<=0){
        $delProduct=$ct->delCartById($id);
    }
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
                        <h1>Point Of sales</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Point Of sales</li>
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
                                <h2 class="card-title text-center">
                                    <?php
                                    if (isset($getInsertIntoCart)){
                                        echo $getInsertIntoCart;
                                    }
                                    ?>
                                </h2>
                            </div>
                            <form method="post">
                                <div class="card">
                                    <div class="card-title bg-dark">
                                        <h1>Customer</h1>
                                    </div>
                                    <div class="card-body">
                                        <table class="table">
                                            <div class="form-group col-md-12">
                                                <label for="customer">Customer Name</label>
                                                <select id="customer" name="customer_Id" class="form-control">
                                                    <option>Select A Customer</option>
                                                    <?php
                                                    $getCustomer = $cmr->getAllCustomer();
                                                    if ($getCustomer) {
                                                        while ($results = $getCustomer->fetch_assoc())
                                                        {
                                                            ?>
                                                            <option value="<?= $results['id']; ?>">
                                                                <?= $results['firstname']; ?>
                                                            </option>
                                                            <?php
                                                        }
                                                    }
                                                    ?>
                                                </select>
                                            </div>
                                        </table>
                                    </div>
                                </div>
                                <div class="card card-dark">
                                    <div class="card-header">
                                        <h2 class="text-center"><span class="break"></span><?=date("d/m/Y")?></h2>
                                        <h2 class="card-title text-center">Product</h2>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                        <tr>
                                            <th>add</th>
                                            <th>product Name</th>
                                            <th>product Code</th>
                                            <th>selling Price</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                        </tr>
                                        </thead>
                                        <?php
                                        $getProduct = $pro->getAllProduct();
                                        if ($getProduct){
                                            while ($result = $getProduct->fetch_assoc()) {
                                                ?>
                                                <tr class="">
                                                    <td>
                                                        <button type="submit" name="submit" class="btn btn-outline-dark">
                                                            <i class="fa fa-plus-circle"></i>
                                                        </button>
                                                    </td>
                                                    <td><?= $result['productName']; ?></td>
                                                    <input type="hidden" value="<?=$result['productId']; ?>" name="product_Id">
                                                    <input type="hidden" value="1" name="quantity">
                                                    <input type="hidden" value="<?= $result['sellingPrice'];?>" name="price">

                                                    <td><?= $result['productCode']; ?></td>
                                                    <td><?= $result['sellingPrice']; ?></td>
                                                    <td><?= $result['categoryName']; ?></td>
                                                    <td>
                                                        <img src="img/<?= $result['productImage']; ?>" height="60px" width="60px"alt="">
                                                    </td
                                                </tr>
                                                <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>add</th>
                                            <th>product Name</th>
                                            <th>product Code</th>
                                            <th>selling Price</th>
                                            <th>Category</th>
                                            <th>Image</th>
                                        </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card card-dark">
                            <div class="card-header">
                                <h2 class="text-center"><span class="break"></span><?=date("d/m/Y")?></h2>
                                <h2 class="card-title text-center">Cart Product</h2>
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
                                            <th>SL NO</th>
                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php
                                        $getPd = $ct->getCartProduct();
                                        if ($getPd){
                                            $i=0;
                                            $sum =0;
                                            $quantity =0;
                                            while ($result=$getPd->fetch_assoc()) {
                                                $i++;
                                                ?>
                                                <tr>
                                                    <td><?=$i?></td>
                                                    <td><?=$result['productName']?></td>
                                                    <td>
                                                        <img src="<?= $result['cart_Image']; ?>" height="60px" width="60px"alt="">
                                                    </td>

                                                    <td>TK<?=$result['price']?></td>
                                                    <td>
                                                        <form action="" method="post">
                                                            <input type="hidden" name="id" value="<?=$result['cartId'];?>"/>
                                                            <input type="number" name="quantity" value="<?=$result['quantity'];?>"/>
                                                            <button type="submit" name="quantityBtn"><i class="fa fa-cart-plus"></i></button>
                                                        </form>
                                                    </td>
                                                    <td>
                                                        <?php
                                                        $total = $result['price'] * $result['quantity'];
                                                        echo $total;
                                                        ?>
                                                    </td>
                                                    <td>
                                                        <a onclick="return confirm( 'Are You Sure To Delete.?')" href="?delpro=<?=$result['cartId'];?>" class="btn btn-outline-dark">X</a>
                                                    </td>
                                                </tr>
                                                <a href="invoice.php?cus_Id=<?=$result['cus_Id']?>" class="btn btn-outline-dark"><?=$result['firstname']?></a>

                                                <?php
                                            }
                                        }
                                        ?>
                                        </tbody>
                                        <tfoot>
                                        <tr>
                                            <th>SL NO</th>
                                            <th>Product Name</th>
                                            <th>Image</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Total Price</th>
                                            <th>Action</th>
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
<!-- bs-custom-file-input -->
<script src="plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- Page specific script -->
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>
</body>
</html>
