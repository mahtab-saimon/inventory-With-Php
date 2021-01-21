<?php
session_start();
include_once "../classes/Suplier.php";
$sup = new Suplier();
?>
<?php
if (isset($_REQUEST['supId'])){
    $id = $_REQUEST['supId'];
    $delSuplier = $sup->delSuplierById($id);
}
?>
<?php
if (isset($_REQUEST['active_id'])){
    $id = $_REQUEST['active_id'];
    $active = $sup->activeBrandById($id);
}
?>

<?php
if (isset($_REQUEST['in_ctive_id'])){
    $id = $_REQUEST['in_ctive_id'];
    $inactive = $sup->inActiveBrandById($id);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Inventory  | All Suplier</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
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
                        <h1>Suplier</h1>
                    </div>
                    <div class="col-sm-6">
                        <a href="addSuplier.php" class="btn btn-outline-info ">Add Suplier</a>
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">All Suplier</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">All Suplier</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Account</th>
                                        <th>status</th>
                                        <th>image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <?php
                                    $getSuplier = $sup->getAllSuplier();
                                    if ($getSuplier){
                                        $i=0;
                                        while ($result = $getSuplier->fetch_assoc()) {
                                            $i++;

                                            ?>
                                            <tr class="">
                                                <td><?= $i?></td>
                                                <td><?= $result['firstname']; ?> <?= $result['lastname'];?></td>
                                                <td><?= $result['phone']; ?></td>
                                                <td><?= $result['address']; ?></td>
                                                <td><?= $result['accountNumber']; ?></td>
                                                <td>
                                                    <?php
                                                    if($result['status'] == '1'){
                                                        ?>
                                                        <span class="badge badge-success">Active</span>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <span class="badge badge-danger">Inactive</span>
                                                        <?php
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <img src="<?= $result['image']; ?>" height="60px" width="60px"alt="">
                                                </td>
                                                <td>
                                                    <?php
                                                    if($result['status'] == '1'){
                                                        ?>
                                                        <a href="?in_ctive_id=<?=$result['id']; ?>" class="btn btn-success btn-sm"> <i class="fa fa-ban"></i>Inactive</a>
                                                        <?php
                                                    } else {
                                                        ?>
                                                        <a href="?active_id=<?=$result['id']; ?>" class="btn btn-danger btn-sm"> <i class="fa fa-thumbs-up">Active</i></a>
                                                        <?php
                                                    }
                                                    ?>
                                                    <a href="#" class="btn btn-success btn-sm"> <i class="fa fa-eye"></i></a>
                                                    <a href="editSuplier.php?supId=<?= $result['id']; ?>" class="btn btn-info btn-sm">
                                                        <i class="fa fa-edit"></i>
                                                    </a>
                                                    <button type="button" class="btn btn-outline-dark" data-toggle="modal" data-target="#myBtn<?= $result['id']; ?> ">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="myBtn<?= $result['id']; ?>">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Confirmation</h5>
                                                            <button class="close" data-dismiss="modal">&times;</button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure to delete!
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                            <a href="?supId=<?= $result['id']?>" class="btn btn-outline-dark">Delete</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                    ?>
                                    </tbody>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>Phone</th>
                                        <th>Address</th>
                                        <th>Account</th>
                                        <th>status</th>
                                        <th>image</th>
                                        <th>Actions</th>
                                    </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
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
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- Page specific script -->
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
<?php
include_once "../inc/tostr.php";
?>
</body>
</html>
