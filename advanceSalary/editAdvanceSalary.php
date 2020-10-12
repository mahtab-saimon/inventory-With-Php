<?php
session_start();
include_once "../classes/Employee.php";
include_once "../classes/AdvanceSalary.php";

if (!isset($_REQUEST['adSalaryId']) || $_REQUEST['adSalaryId'] == NULL){

    header("location:allAdvanceSalary.php");

}
else{
    $id = $_GET['adSalaryId'];
}
?>

<?php
$AdS = new AdvanceSalary();
if (isset($_POST['submit'])){
    $advanceSalaryUpdate = $AdS->advanceSalaryUpdate($_POST, $id);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory  | edit </title>
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
                        <h1>edit Advance Salary</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Edit Advance Salary</li>
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
                                    if (isset($AdvanceSalaryInserted)){
                                        echo $AdvanceSalaryInserted;
                                    }
                                    ?>
                                </h2>
                                <h3 class="card-title">Advance Salary</h3>
                            </div>
                            <form action="" method="post">
                                <?php
                                $geAdS = $AdS->getAdvanceSalaryById($id);
                                if ($geAdS) {
                                while ($value = $geAdS->fetch_assoc()) {
                                    ?>

                                    <div class="form-group col-md-6">
                                        <label for="employee_id">Employee Name</label>
                                        <select class="form-control" name="employee_id" id=employee_id"">
                                            <option>Select Employee</option>
                                            <?php
                                            $emp = new Employee();
                                            $getEmp = $emp->getAllEmployee();
                                            if ($getEmp) {
                                                while ($result = $getEmp->fetch_assoc()) {
                                                    ?>
                                                    <option
                                                        <?php
                                                        if ($value['employee_id'] == $result['id']) {
                                                            ?>

                                                            selected="selected"
                                                        <?php }
                                                        ?>
                                                            value="<?= $result['id'] ?>"><?= $result['firstname'] ?> <?= $result['lastname'] ?>
                                                    </option>
                                                <?php }
                                            } ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="month">Month</label>
                                        <select id="month" name="month" class="form-control">
                                            <option>Select Month</option>
                                            <option value="Jan">Jan</option>
                                            <option value="Feb">Feb</option>
                                            <option value="Mar">Mar</option>
                                            <option value="Apr">Apr</option>
                                            <option value="May">May</option>
                                            <option value="Jun">Jun</option>
                                            <option value="Jul">Jul</option>
                                            <option value="Aug">Aug</option>
                                            <option value="Sep">Sep</option>
                                            <option value="Oct">Oct</option>
                                            <option value="Nov">Nov</option>
                                            <option value="Dec">Dec</option>
                                        </select>
                                    </div>


                                    <div class="card-body">
                                        <div class="form-group  col-md-6">
                                            <label for="categoryName">advance Salary</label>
                                            <input id="categoryName" value="<?= $value['advance_salary']; ?>"
                                                   class="form-control" name="advance_salary" type="text">
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <input class="btn btn-primary" type="submit" value="Submit" name="submit">
                                    </div>
                                    <?php
                                }
                                }
                                ?>
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
