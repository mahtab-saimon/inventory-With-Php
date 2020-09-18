
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="index.php" class="brand-link">
        <img src="img/customer/768d2abee5.jpeg" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Inventory </span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->


        <!-- SidebarSearch Form -->
      <!--  <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div>-->

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item menu-open">
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.php" class="nav-link active">
                                <i class="far fa-user nav-icon"></i>
                                <p>Dashboard</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                           Employee
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="employee/addEmployee.php" class="nav-link">
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
                <li class="nav-item">
                    <a href="pos.php" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                           POS
                            <i class="fas fa-angle-left right"></i>
                            <span class="badge badge-info right"></span>
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Customer
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="customer/addCustomer.php" class="nav-link">
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
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-user"></i>
                        <p>
                            Suplier
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="supliers/addSuplier.php" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>Add Suplier</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="supliers/allSuplier.php" class="nav-link">
                                <i class="far fa-user nav-icon"></i>
                                <p>All Suplier</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Category
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="category/addCategory.php" class="nav-link">
                                <i class="far fa-list nav-icon"></i>
                                <p>Add Category</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="category/allCategory.php" class="nav-link">
                                <i class="far fa-list nav-icon"></i>
                                <p>All Category</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Brand
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="brand/addBrand.php" class="nav-link">
                                <i class="far fa-list nav-icon"></i>
                                <p>Add Brand</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="brand/allBrand.php" class="nav-link">
                                <i class="far fa-list nav-icon"></i>
                                <p>All Brand</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Size
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="size/addSize.php" class="nav-link">
                                <i class="far fa-list nav-icon"></i>
                                <p>Add Size</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="size/allSize.php" class="nav-link">
                                <i class="far fa-list nav-icon"></i>
                                <p>All Size</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            Color
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="color/addColor.php" class="nav-link">
                                <i class="far fa-list nav-icon"></i>
                                <p>Add Color</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="color/allColor.php" class="nav-link">
                                <i class="far fa-list nav-icon"></i>
                                <p>All Color</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Product
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="product/addProduct.php" class="nav-link">
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
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-money-bill"></i>
                        <p>
                            Salary
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="advanceSalary/AdvanceSalary.php" class="nav-link">
                                <i class="fa fa-money-bill nav-icon"></i>
                                <p>Add Advance Salary</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="advanceSalary/allAdvanceSalary.php" class="nav-link">
                                <i class="fa fa-money-bill nav-icon"></i>
                                <p>All Advance Salary</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="advanceSalary/paySalary.php" class="nav-link">
                                <i class="fa fa-money-bill nav-icon"></i>
                                <p>pay Salary</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-money-bill"></i>
                        <p>
                            Expence
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="expense/addExpence.php" class="nav-link">
                                <i class="fa fa-money-bill nav-icon"></i>
                                <p>Add Expence </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="expense/TodayExpence.php" class="nav-link">
                                <i class="fa fa-money-bill nav-icon"></i>
                                <p>Today Expence</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="expense/monthlyExpence.php" class="nav-link">
                                <i class="fa fa-money-bill nav-icon"></i>
                                <p>Monthly Expence</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="expense/yearlyExpence.php" class="nav-link">
                                <i class="fa fa-money-bill nav-icon"></i>
                                <p>Yearly Expence</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fab fa-product-hunt"></i>
                        <p>
                            Order
                            <i class="right fas fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="order/pendingOrder.php" class="nav-link">
                                <i class="fab fa-product-hunt nav-icon"></i>
                                <p>pending Order</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="order/viewOrder.php" class="nav-link">
                                <i class="fab fa-product-hunt nav-icon"></i>
                                <p>view Order</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <br>
                <br>
                <br>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
