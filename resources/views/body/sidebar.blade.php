<div class="left-side-menu">

    <div class="h-100" data-simplebar>

        <!-- User box -->


        <!--- Sidemenu -->
        <div id="sidebar-menu">

            <ul id="side-menu">

                <li class="menu-title">Menu</li>

                <li>
                    <a href="{{ route('dashboard') }}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span> Dashboard </span>
                    </a>
                </li>


                <li>
                    <a href="#sidebarEcommerce" data-bs-toggle="collapse">
                        <i class="fas fa-user-tie	"></i>
                        <span> Manage Employee </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('view.employee') }}">All Employees</a>
                            </li>
                            <li>
                                <a href="{{ route('employee.add') }}">Add Employee</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#sidebarEcommerce2" data-bs-toggle="collapse">
                        <i class="bi bi-people "></i>
                        <span> Manage Customers </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce2">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('view.customer') }}">All Customers</a>
                            </li>
                            <li>
                                <a href="{{ route('customer_add_form') }}">Add Customers</a>
                            </li>
                        </ul>
                    </div>
                </li>

                <li>
                    <a href="#sidebarEcommerce3" data-bs-toggle="collapse">
                        <i class="fas fa-dolly-flatbed"></i>
                        <span> Manage Suppliers </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce3">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('view.suppliers') }}">All Suppliers</a>
                            </li>
                            <li>
                                <a href="{{ route('supplier_add_form') }}">Add Customers</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#sidebarEcommerce4" data-bs-toggle="collapse">
                        <i class="fa fa-money	
                        "></i>
                        <span> Employee Salary </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce4">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('all.advance.salary') }}">All Advances</a>
                            </li>
                            <li>
                                <a href="{{ route('add.advance.salary') }}">Add Advance Salary</a>
                            </li>
                            
                            <li>
                                <a href="{{route('PaySalary')}}">Pay Salary</a>
                            </li>

                            <li>
                                <a href="{{ route('PaidSalaries') }}">Piad Salaries</a>
                            </li>
                        </ul>
                    </div>
                </li>


                <li>
                    <a href="#sidebarEcommerce5" data-bs-toggle="collapse">
                        <i class="fa fa-calendar"></i>
                        <span> Employee Attendance </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <div class="collapse" id="sidebarEcommerce5">
                        <ul class="nav-second-level">
                            <li>
                                <a href="{{ route('employee.attendance.list') }}">Attendance List</a>
                            </li>
                        </ul>
                    </div>
                </li>


            </ul>

        </div>
        <!-- End Sidebar -->

        <div class="clearfix"></div>

    </div>
    <!-- Sidebar -left -->

</div>
