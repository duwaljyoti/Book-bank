<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ asset("/AdminLTE-2.0.5/dist/img/user2-160x160.jpg") }}" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
                <p>{{Auth::user()->name}}</p>
                <!-- Status -->
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- search form (Optional) -->
        <{{--form action="#" method="get" class="sidebar-form">
            <div class="input-group">
                <input type="text" name="q" class="form-control" placeholder="Search..."/>
                <span class="input-group-btn">
  <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
</span>
            </div>
        </form>--}}
        <!-- /.search form -->

        <!-- Sidebar Menu -->
        <ul class="sidebar-menu">
            <li class="header">HEADER</li>
            <li><a href="{{url('admin/dashboard')}}">Dashboard</a></li>
            <li class="treeview active">
                <a href="#">
                    <i class="fa fa-book"></i><span>Books</span> <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{url('admin/books')}}"><i class="fa fa-list"></i> <span> View All </span></a></li>
                    <li><a href="{{url('admin/books')}}"><i class="fa fa-plus"></i> <span> Add New </span></a></li>
                </ul>
            </li>
            <li class="treeview users">
                <a href="#">
                    <i class="fa fa-users"></i> <span>Users</span>
                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="users-all">
                        <a href="{{url('admin/users')}}">
                            <i class="fa fa-list"></i> <span>View All </span>
                            {{--<span class="pull-right-container">
                                <small class="label pull-right bg-blue">10</small>
                            </span>--}}
                        </a>
                    </li>
                </ul>
            </li>
            <li class="treeview users">
                <a href="#">
                    <i class="fa fa-plus-square"></i> <span>Requests</span>
                    <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                                </span>
                </a>
                <ul class="treeview-menu">
                    <li class="users-all">
                        <a href="{{url('admin/mass_requests')}}">
                            <i class="fa fa-users"></i> <span>Mass Requests </span>
                        </a>
                    </li>
                    <li class=""><a href="{{url('admin/personal_requests')}}"><i class="fa fa-user"></i>Personal Requests</a></li>
                </ul>
            </li>
            <li class="new_menu">
                <a href="#"><i class="fa fa-calendar"></i> <span>New Menu</span></a>
            </li>
        </ul><!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
</aside>