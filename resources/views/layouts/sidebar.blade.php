<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="" class="brand-link">
        <img src="/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">Affsquare-Task</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>


            <div class="info ">
                <a href="#" class="d-block"> {{ Auth::user()->name }}  </a>
            </div>
        </div>




        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                @can('role')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user-tag"></i>
                            <p>
                                Roles
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>


                        <ul class="nav nav-treeview">
                            @can('role-list')
                            <li class="nav-item">
                                <a href="{{ url('role/index') }}" class="nav-link">
                                    <i class="fas fa-user-circle"></i>
                                    <p>
                                        View
                                    </p>
                                </a>
                            </li>
                            @endcan
                            @can('role-create')
                            <li class="nav-item">
                                <a href="{{ url('role/create') }}" class="nav-link">
                                    <i class="fas fa-user-edit"></i>
                                    <p>Create</p>
                                </a>
                            </li>
                            @endcan
                        </ul>

                    </li>
                @endcan

                @can('user')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user-tag"></i>
                            <p>
                                Users
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>


                        <ul class="nav nav-treeview">
                            @can('user-list')
                                <li class="nav-item">
                                    <a href="{{ url('user/index') }}" class="nav-link">
                                        <i class="fas fa-user-circle"></i>
                                        <p>
                                            View
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('user-create')
                                <li class="nav-item">
                                    <a href="{{ url('user/create') }}" class="nav-link">
                                        <i class="fas fa-user-edit"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>

                    </li>
                @endcan

                @can('table')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user-tag"></i>
                            <p>
                                Tables
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>


                        <ul class="nav nav-treeview">
                            @can('table-list')
                                <li class="nav-item">
                                    <a href="{{ url('table/index') }}" class="nav-link">
                                        <i class="fas fa-user-circle"></i>
                                        <p>
                                            View
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('table-create')
                                <li class="nav-item">
                                    <a href="{{ url('table/create') }}" class="nav-link">
                                        <i class="fas fa-user-edit"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>

                    </li>
                @endcan

                @can('reservation')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="fas fa-user-tag"></i>
                            <p>
                                Reservations
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>


                        <ul class="nav nav-treeview">
                            @can('reservation-list')
                                <li class="nav-item">
                                    <a href="{{ url('reservation/index') }}" class="nav-link">
                                        <i class="fas fa-user-circle"></i>
                                        <p>
                                            View
                                        </p>
                                    </a>
                                </li>
                            @endcan
                            @can('reservation-create')
                                <li class="nav-item">
                                    <a href="{{ url('reservation/create') }}" class="nav-link">
                                        <i class="fas fa-user-edit"></i>
                                        <p>Create</p>
                                    </a>
                                </li>
                            @endcan
                        </ul>

                    </li>
                @endcan

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
