<?php
session_start();
include_once "../classes/Product.php";
include_once "../classes/Brand.php";
include_once "../classes/Size.php";
include_once "../classes/Color.php";
include_once "../classes/Category.php";
include_once "../classes/Suplier.php";


if (!isset($_REQUEST['proId']) || $_REQUEST['proId'] == NULL){

    header("location:allProduct.php");

}
else{
    $id = $_GET['proId'];
}
?>

<?php
$pro = new Product();
if (isset($_POST['submit'])){
    $productUpdate = $pro->productUpdate($_POST,$_FILES,$id);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory  | edit Product</title>
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
                        <h1>edit Suplier</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Product</li>
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
                                <h3 class="card-title">Edit Product</h3>
                               <!-- <h2 class="">
                                    <?php
/*                                    if ($productUpdate){
                                        echo $productUpdate;
                                    }
                                    */?>
                                </h2>-->
                            </div>
                            <form action="" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <?php
                                            $gePro = $pro->geProductById($id);
                                            if ($gePro) {
                                            while ($value = $gePro->fetch_assoc()) {
                                            ?>

                                                     <div class="form-group">
                                                        <label for="productName">product Name</label>
                                                        <input id="productName" class="form-control"
                                                               value="<?= $value['productName']; ?>" name="productName"
                                                               type="text">
                                                    </div>
                                                    <div class="row">
                                                        <div class="form-group col-md-4">
                                                            <label for="categoryName">category Name</label>
                                                            <select id="categoryName" name="catId" class="form-control">
                                                                <option>Select Category</option>

                                                                <?php
                                                                $cat = new Category();
                                                                $getCat = $cat->getAllCat();
                                                                if ($getCat) {
                                                                    while ($result = $getCat->fetch_assoc()) {
                                                                        ?>
                                                                        <option
                                                                            <?php
                                                                            if ($value['catId'] == $result['id']) {
                                                                                ?>

                                                                                selected="selected"
                                                                            <?php }
                                                                            ?>

                                                                                value="<?= $result['id'] ?>"><?= $result['categoryName'] ?>
                                                                        </option>
                                                                    <?php }
                                                                } ?>

                                                            </select>
                                                        </div>
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
                                                                        <option
                                                                            <?php
                                                                            if ($value['suplierId'] == $result['id']) {
                                                                                ?>

                                                                                selected="selected"
                                                                            <?php }
                                                                            ?>
                                                                        value="<?=$result['id']?>"><?=$result['brandName']?></option>
                                                                    <?php } } ?>

                                                            </select>
                                                        </div>
                                                        <div class="form-group col-md-4">
                                                            <label for="SuplierName">Suplier Name</label>
                                                            <select class="form-control" name="suplierId"
                                                                    id=SuplierName"">
                                                                <option>Select Suplier</option>
                                                                <?php
                                                                $sup = new Suplier();
                                                                $getSup = $sup->getAllSuplier();
                                                                if ($getSup) {
                                                                    while ($result = $getSup->fetch_assoc()) {
                                                                        ?>
                                                                        <option
                                                                            <?php
                                                                            if ($value['suplierId'] == $result['id']) {
                                                                                ?>

                                                                                selected="selected"
                                                                            <?php }
                                                                            ?>
                                                                                value="<?= $result['id'] ?>"><?= $result['firstname'] ?>
                                                                        </option>
                                                                    <?php }
                                                                } ?>
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
                                                        <label for="productCode">product Code</label>
                                                        <input id="productCode" class="form-control"
                                                               value="<?= $value['productCode']; ?>" name="productCode"
                                                               type="text">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="productPlce">product Plce</label>
                                                        <input id="productPlce" class="form-control"
                                                               value="<?= $value['productPlce']; ?>" name="productPlce"
                                                               type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="productRoute">product Route</label>
                                                        <input id="productRoute" class="form-control"
                                                               value="<?= $value['productRoute']; ?>"
                                                               name="productRoute"
                                                               type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="buyDate">buy Date</label>
                                                        <input id="buyDate" class="form-control"
                                                               value="<?= $value['buyDate']; ?>" name="buyDate"
                                                               type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="expireDate">expire Date</label>
                                                        <input id="expireDate" class="form-control"
                                                               value="<?= $value['expireDate']; ?>" name="expireDate"
                                                               type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="buyingPrice">buying Price</label>
                                                        <input id="buyingPrice" class="form-control"
                                                               value="<?= $value['buyingPrice']; ?>" name="buyingPrice"
                                                               type="text">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="sellingPrice">selling Price</label>
                                                        <input id="sellingPrice" class="form-control"
                                                               value="<?= $value['sellingPrice']; ?>"
                                                               name="sellingPrice"
                                                               type="text">
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="productDescription">product Description</label>
                                                        <textarea id="productDescription" name="productDescription" class="form-control" id="" cols="30" rows="10">
                                                            <?= $value['productDescription']; ?>
                                                        </textarea>
                                                    </div>
                                                    <div class="form-group">
                                                        <img src="<?= $value['productImage']; ?>" height="60px" width="60px" alt="">
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="exampleInputFile">image</label>
                                                        <div class="input-group">
                                                            <div class="custom-file">
                                                                <input type="file" name="image"
                                                                       class="custom-file-input"
                                                                       id="exampleInputFile">
                                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                                    file</label>
                                                            </div>
                                                            <div class="input-group-append">
                                                                <span class="input-group-text">Upload</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                <?php
                                            }
                                            }
                                            ?>
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
<?php
include_once "../inc/tostr.php";
?>
</body>
</html>
