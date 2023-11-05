<!-- Main Sidebar Container -->

<aside class="main-sidebar sidebar-light-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ route('dashboard') }}" class="brand-link" >
        <img src="{{ asset('img/logo.png') }}" class="footer-logo mr-2"  height="auto" width="30px" alt="takecare" />
        Take Care
    </a>
<!-- Sidebar Menu -->
        <nav class="mt-2 navbar">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                        with font-awesome or any other icon font library -->

                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p style="margin-left: 10px;">Reception<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('reception.create') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon "></i>
                                <p>Add Patient</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('reception') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon "></i>
                                <p>Patient Lists</p>
                            </a>
                        </li>

                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-user-tie"></i>
                        <p style="margin-left: 15px;">HR information<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('info.create') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon "></i>
                                <p>Add Employee</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('staff.list') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon "></i>
                                <p>Employee List</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="fas fa-cogs"></i>
                        <p style="margin-left: 10px;">Setup<i class="fas fa-angle-left right"></i></p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item {{ \Illuminate\Support\Facades\Route::currentRouteName() == 'admin.list' ? 'active' : '' }}">
                            <a href="{{ route('admin.list') }}" class="nav-link">
                                <i class="fas fa-circle nav-icon"></i>
                                <p>User List</p>
                            </a>
                        </li>
                    </ul>
                </li>

                <ul class="navbar-nav ml-auto">
                    <li class="nav-item nav-link">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="nav-link">
                                <i class="fas fa-sign-out-alt" title="Logout"></i>
                                <p style="margin-left: 10px;">Logout</p>
                            </x-responsive-nav-link>
                        </form>
                    </li>
                </ul>

            </ul>


            </ul>

        </nav>
        <!-- /.sidebar-menu -->

    </div>
    <!-- /.sidebar -->
</aside>
