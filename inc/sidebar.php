
<aside class="main-sidebar sidebar-dark-primary elevation-4">
       <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="../<?=Session::get('image')?>" class="img-circle elevation-3" alt="Admin Image">
            </div>
            <div class="info">
                <a href="../index.php" class="d-block"><h5><?=Session::get('name')?></h5></a>
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
                    <a href="../pos/index.php" class="nav-link">
                        <i class="fa fa-shopping-cart nav-icon"></i>
                        <p>Pos</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="../report.php" class="nav-link">
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
                            <a href="../employee/addEmployee.php" class="nav-link  ">
                                <i class="far fa-user nav-icon"></i>
                                <p>Add Employee</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../employee/allEmployee.php" class="nav-link">
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
                            <a href="../customer/addCustomer.php" class="nav-link  ">
                                <i class="far fa-user nav-icon"></i>
                                <p>Add Customer</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../customer/allCustomer.php" class="nav-link">
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
                            <a href="../supliers/addSuplier.php" class="nav-link  ">
                                <i class="far fa-user nav-icon"></i>
                                <p>Suplier add</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../supliers/allSuplier.php" class="nav-link">
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
                            <a href="../category/addCategory.php" class="nav-link  ">
                                <i class="far fa-fa-list-alt nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../category/allCategory.php" class="nav-link">
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
                            <a href="../brand/addBrand.php" class="nav-link  ">
                                <i class="far fa-fa-list-alt nav-icon"></i>
                                <p>Add Brand</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../brand/allBrand.php" class="nav-link">
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
                            <a href="../size/addSize.php" class="nav-link  ">
                                <i class="far fa-fa-list-alt nav-icon"></i>
                                <p>Add Size</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../size/allSize.php" class="nav-link">
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
                            <a href="../color/addColor.php" class="nav-link  ">
                                <i class="far fa-brush nav-icon"></i>
                                <p>Add Color</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../color/allColor.php" class="nav-link">
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
                            <a href="../product/addProduct.php" class="nav-link  ">
                                <i class="fab fa-product-hunt nav-icon"></i>
                                <p>Add Product</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../product/allProduct.php" class="nav-link">
                                <i class="fab fa-product-hunt nav-icon"></i>
                                <p>Manage Product</p>
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
                            <a href="../advanceSalary/addAdvanceSalary.php" class="nav-link  ">
                                <i class="far fa-money-bill-alt nav-icon"></i>
                                <p>Add Advance Salary</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../advanceSalary/allAdvanceSalary.php" class="nav-link">
                                <i class="far fa-money-bill-alt nav-icon"></i>
                                <p>All Advance Salary</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../advanceSalary/paySalary.php" class="nav-link">
                                <i class="far fa-money-bill-alt nav-icon"></i>
                                <p>pay</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../advanceSalary/viewAdvanceSalary.php" class="nav-link">
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
                            <a href="../sales_report/monthlyReport.php" class="nav-link">
                                <i class="far fa-money-bill-alt nav-icon"></i>
                                <p>monthly Sales Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../sales_report/report.php" class="nav-link">
                                <i class="far fa-money-bill-alt nav-icon"></i>
                                <p>Today Sales Report</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../sales_report/yearlyReport.php" class="nav-link">
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
                            <a href="../expense/addExpence.php" class="nav-link  ">
                                <i class="far fa-money-bill-alt nav-icon"></i>
                                <p>Add Expense</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../expense/monthlyExpence.php" class="nav-link">
                                <i class="far fa-money-bill-alt nav-icon"></i>
                                <p>monthly Expense</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../expense/TodayExpence.php" class="nav-link">
                                <i class="far fa-money-bill-alt nav-icon"></i>
                                <p>Today Expence</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="../expense/yearlyExpence.php" class="nav-link">
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
                            <a href="../order/pendingOrder.php" class="nav-link  ">
                                <i class="fab fa-product-hunt nav-icon"></i>
                                <p>All Pending Order</p>
                            </a>
                        <li class="nav-item">
                            <a href="../order/viewOrder.php" class="nav-link">
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
