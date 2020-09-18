<?php
include_once "../classes/Product.php";
include_once "../classes/Size.php";
include_once "../classes/Brand.php";
include_once "../classes/Color.php";
include_once "../classes/Category.php";
include_once "../classes/Suplier.php";
$pro = new Product();
if (isset($_POST['submit'])){
    $getProInserted = $pro->productInsert($_POST,$_FILES);
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory | Add Product</title>
    <link rel="stylesheet" href="../plugins/summernote/summernote-bs4.min.css">

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
                        <h1>Product Form</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Add Product</li>
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
                                <h2>
                                    <?php
                                    if (isset($getProInserted)){
                                        echo $getProInserted;
                                    }
                                    ?>
                                </h2>
                                <h3 class="card-title">Add Product</h3>
                            </div>
                            <form action="" method="post"  enctype="multipart/form-data">
                                <div class="card-body">

                                    <div class="form-group">
                                        <label for="productName">product Name</label>
                                        <input id="productName" class="form-control" name="productName" type="text">
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-md-4">
                                        <label for="categoryName">Brand Name</label>
                                        <select id="categoryName" name="brand_Id" class="form-control">
                                            <option>Select Brand</option>

                                            <?php
                                            $br = new Brand();
                                            $getbr = $br->getAllBrand();
                                            if ($getbr){
                                                while ($result=$getbr->fetch_assoc()){
                                                    ?>
                                                    <option value="<?=$result['id']?>"><?=$result['brandName']?></option>
                                                <?php } } ?>

                                        </select>
                                    </div>
                                        <div class="form-group col-md-4">
                                        <label for="categoryName">category Name</label>
                                        <select id="categoryName" name="catId" class="form-control">
                                            <option>Select Category</option>

                                            <?php
                                            $cat = new Category();
                                            $getCat = $cat->getAllCat();
                                            if ($getCat){
                                                while ($result=$getCat->fetch_assoc()){
                                                    ?>
                                                    <option value="<?=$result['id']?>"><?=$result['categoryName']?></option>
                                                <?php } } ?>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="SuplierName">Suplier Name</label>
                                        <select class="form-control" name="suplierId" id=SuplierName"">
                                            <option>Select Suplier</option>
                                            <?php
                                            $sup = new Suplier();
                                            $getSup = $sup->getAllSuplier();
                                             if ($getSup){
                                                while ($result=$getSup->fetch_assoc()){
                                                    ?>
                                                    <option
                                                            value="<?=$result['id']?>"><?=$result['firstname']?>
                                                    </option>
                                                    <?php } } ?>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="Size">Size</label>
                                        <select id="Size" name="size_Id" class="form-control">
                                            <option>Select Size</option>

                                            <?php
                                            $Size = new Size();
                                            $getSize = $Size->getAllSize();
                                            if ($getSize){
                                                while ($result=$getSize->fetch_assoc()){
                                                    ?>
                                                    <option value="<?=$result['id']?>"><?=$result['sizeName']?></option>
                                                <?php }
                                            } ?>

                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="Color">Color</label>
                                        <select class="form-control" name="color_Id" id=Color"">
                                            <option>Select Color</option>
                                            <?php
                                            $color = new Color();
                                            $getColor = $color->getAllColor();
                                             if ($getColor){
                                                while ($result=$getColor->fetch_assoc()){
                                                    ?>
                                                    <option
                                                            value="<?=$result['id']?>"><?=$result['color']?>
                                                    </option>
                                                    <?php }
                                             } ?>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="productCode">productCode</label>
                                        <input id="productCode" class="form-control" name="productCode" type="text">
                                    </div>
                                     <div class="form-group">
                                        <label for="productPlce">productPlce</label>
                                        <input id="productPlce" class="form-control" name="productPlce" type="text">
                                    </div>
                                     <div class="form-group">
                                        <label for="productRoute">productRoute</label>
                                        <input id="productRoute" class="form-control" name="productRoute" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="buyDate">buyDate</label>
                                        <input id="buyDate" class="form-control" name="buyDate" type="date">
                                    </div>
                                    <div class="form-group">
                                        <label for="expireDate">expireDate</label>
                                        <input id="expireDate" class="form-control" name="expireDate" type="date">
                                    </div>

                                    <div class="form-group">
                                        <label for="buyingPrice">buyingPrice</label>
                                        <input id="buyingPrice" class="form-control" name="buyingPrice" type="text">
                                    </div>

                                    <div class="form-group">
                                        <label for="sellingPrice">sellingPrice</label>
                                        <input id="sellingPrice" class="form-control" name="sellingPrice" type="text">
                                    </div>
                                    <div class="form-group">
                                        <label for="">productDescription</label>
                                        <textarea class="form-control" name="productDescription" id="summernote" >

                                        </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputFile">image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file"  name="productImage" class="custom-file-input" id="exampleInputFile">
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
                                    <input class="btn btn-primary" type="submit" value="Submit" name="submit">
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
<script src="../plugins/summernote/summernote-bs4.min.js"></script>

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
<script>
    $(function () {
        // Summernote
        $('#summernote').summernote()

    })
</script>

</body>
</html>
