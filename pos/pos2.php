
<?php

include_once "../classes/Product.php";
include_once "../classes/Customer.php";
include_once "../classes/Cart.php";
session_start();
$pro = new Product();
$cmr = new Customer();
$ct = new Cart();

if (isset($_POST['customerInsert'])){
    $customerInsert = $cmr->customerInsert($_POST,$_FILES);
}


if (isset($_GET['delpro'])){
    $id = $_GET['delpro'];
    $delProduct=$ct->delCartById($id);
}
/*if (isset($_POST['submit'])){
    $getInsertIntoCart = $ct->addTocart($_POST);
}*/

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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <link rel="stylesheet" href="">

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

        <!--add modal-->
        <div class="modal fade" id="Student_AddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="error-message">
                                </div>
                                <form action="" method="post"  enctype="multipart/form-data">
                                    <div class="card-body">
                                        <div class="form-group">
                                            <label for="firstname">Firstname</label>
                                            <input id="firstname" class="form-control" name="firstname" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="lastname">Lastname</label>
                                            <input id="lastname" class="form-control" name="lastname" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Email</label>
                                            <input id="email" class="form-control" name="email" type="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Phone</label>
                                            <input id="email" class="form-control" name="phone" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label for="address">address</label>
                                            <input id="address" class="form-control" name="address" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="accountHolder">Account Holder</label>
                                            <input id="accountHolder" class="form-control" name="accountHolder" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label for="accountNumber">Account Number</label>
                                            <input id="accountNumber" class="form-control" name="accountNumber" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label for="bankName">Bank Name</label>
                                            <input id="bankName" class="form-control" name="bankName" type="text">
                                        </div>

                                        <div class="form-group">
                                            <label for="bankBranch">Bank Branch</label>
                                            <input id="bankBranch" class="form-control" name="bankBranch" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="city">city</label>
                                            <input id="city" class="form-control" name="city" type="text">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file"  name="image" class="custom-file-input" id="exampleInputFile">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <input class="btn btn-primary" type="submit" value="Submit" name="customerInsert">
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-9">
                                    <h5>
                                        Select The Customer and Customer's Products
                                    </h5>
                                </div>
                                <div class="col-md-3">
                                    <button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#Student_AddModal">
                                        Add
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="">
                                <div class="form-group col-md-12">
                                    <select id="customers" name="customer_Id" class="form-control select2">
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

                                <div class="form-group col-md-12">

                                    <select id="products" name="customer_Id" class="form-control message-show select2">
                                        <option>Select A Product</option>
                                        <?php
                                        $getProduct = $pro->getAllProduct();
                                        if ($getProduct) {
                                            while ($results = $getProduct->fetch_assoc())
                                            {
                                                ?>
                                                <option value="<?= $results['productId']; ?> " data-cost="<?=$results['sellingPrice']?>"><?= $results['productName']; ?></option>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </select>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <div class="row">
                                <div class="col-md-8">
                                    <h4 class="text-center">
                                        Point Of Sale(Customer preferred products)
                                    </h4>
                                </div>
                                <div class="col-md-4">
                                    <h5 class="text-center">
                                        Customer serial No:<span class="customers_products" id="customers_products"></span>
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="message-show">
                            </div>
                            <form action="" method="post">
                                <table class="table">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="example" class="example">
                                    </tbody>
                                </table>
                                <div>
                                    <br/>


                                    <div id="Invoice">
                                        <?php
                                        $getPd = $ct->getCartProduct();
                                        if ($getPd) {
                                          $result = $getPd->fetch_assoc();
                                                ?>

                                                <a href="../invoice.php?cus_Id=<?= $result['cus_Id'] ?>" class="btn btn-outline-info"><i class="fa fa-arrow-circle-right fa-lg">Invoice</i></a>
                                                <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
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
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>

<script src="../plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
<!-- AdminLTE App -->
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>

<script src="../dist/js/demo.js"></script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    $(function () {
        $("#example").DataTable({
            "responsive": true,
            "autoWidth": false,
        });
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<script>
    $(function () {
        bsCustomFileInput.init();
    });
</script>

<script>
    $('.select2').select2();
</script>
<script>
    $(document).ready(function() {
        var selected = [];
        // customers
        $("#customers").change(function(){
            $("#customers_products").html("");
            var customer_id= $("#customers").val();
            // var customer_name= $("#customers option:selected").text();
            // alert(customer_name);
            var show ='<h4>'+customer_id+'</h4>'
            $('#customers_products').append(show);

        });

        $("#products").change(function(){
            // var customer_name= document.getElementById('customers_products').innerText;
            var customer_id= $("#customers_products").text();
            $("#example").html("");
            var product_Id= $("#products").val();
            var product_name= $("#products option:selected").text();
            var product_price= $("#products option:selected").data("cost");
            $.ajax({
                type: "POST",
                url: "ajaxCrud/code.php",
                data: {
                    'checking_add':true,
                    'customer_Id': customer_id,
                    'product_Id': product_Id,
                    'quantity': 1,
                    'product_price': product_price,
                },
                success: function (response) {
                    var success = '<div class="alert alert-success alert-dismissible fade show" role="alert">\n' +
                        '  <strong></strong> '+response+'\n' +
                        '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                        '    <span aria-hidden="true">&times;</span>\n' +
                        '  </button>\n' +
                        '</div>';
                    $('.message-show').append(success);
                    $('.example').html("");
                    getdata();
                }
            });

        });

    });

    function getdata()
    {
        $.ajax({
            type: "GET",
            url: "ajaxCrud/fetch.php",
            success: function (response) {
                // console.log(response);
                $.each(response, function (key, value) {
                    var show = '<tr>'+
                        '<td id="pro_id" class="pro_id">'+value['cartId']+'</td>\
                                 <td>'+value['productName']+'</td>\
                                 <td>'+value['price']+'</td>\
                                 <td><input id="quantity" class="myInput" type="number" min="1" value='+value['quantity']+' ><button id="student_update_ajax" type="button" class="btn btn-info btn-sm">Update</button></td>\
                                 <td id="subtotal">'+value['price'] * value['quantity'] +'</td>\
                                <td>\
                                    <a href="" class="badge btn-danger delete_btn">Remove</a>\
                                </td>\
                            </tr>'
                    $('.example').append(show);

                });
            }
        });
    }
</script>

<!--Update-->
<script>
    $(document).ready(function () {

        $(document).on("click", "#student_update_ajax", function () {
            var pro_id = $(this).closest('tr').find('#pro_id').text();
            // alert(pro_id);
            var quantity=$('#quantity').val();
            //  alert(quantity);
            $.ajax({
                type: "POST",
                url: "ajaxCrud/updateCode.php",
                data: {
                    'checking_update':true,
                    'pro_id': pro_id,
                    'quantity': quantity,
                },
                success: function (response) {
                    var success = '<div class="alert alert-success alert-dismissible fade show" role="alert">\n' +
                        '  <strong></strong> '+response+'\n' +
                        '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                        '    <span aria-hidden="true">&times;</span>\n' +
                        '  </button>\n' +
                        '</div>';
                    $('.message-show').append(success);
                    $('#example').html("");
                    getdata();
                }


            });

        });

    });
</script>

<!--delete script-->
<script>
    getdata();
    $(document).on("click", ".delete_btn", function () {
        var pro_id = $(this).closest('tr').find('.pro_id').text();

        $.ajax({
            type: "POST",
            url: "ajaxCrud/deleteCode.php",
            data: {
                'checking_delete': true,
                'pro_id': pro_id,
            },
            success: function (response) {
                var success = '<div class="alert alert-success alert-dismissible fade show" role="alert">\n' +
                    '  <strong</strong> '+response+'\n' +
                    '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">\n' +
                    '    <span aria-hidden="true">&times;</span>\n' +
                    '  </button>\n' +
                    '</div>';
                $('.message-show').append(success);
                $('.example').html("");
                getdata();

            }
        });

    });

</script>

<?php
include_once "../../inc/tostr.php";
?>
</body>
</html>
