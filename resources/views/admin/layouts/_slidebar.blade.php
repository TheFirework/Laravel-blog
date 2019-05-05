<aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::guard('admin')->user()->avatar }}" class="img-circle" alt="User Image">
                {{--<img src="{{ asset('images/user2-160x160.jpg') }}" class="img-circle" alt="User Image">--}}
            </div>
            <div class="pull-left info">
                <p>{{ Auth::guard('admin')->user()->name }}</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <!-- search form -->
        {{--<form action="#" method="get" class="sidebar-form">--}}
            {{--<div class="input-group">--}}
                {{--<input type="text" name="q" class="form-control" placeholder="Search...">--}}
                {{--<span class="input-group-btn">--}}
                {{--<button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>--}}
                {{--</button>--}}
              {{--</span>--}}
            {{--</div>--}}
        {{--</form>--}}
        <!-- /.search form -->
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="active treeview">
                <a href="#">
                    <i class="fa fa-tasks"></i> <span>系统管理</span>
                    <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
                </a>
                <ul class="treeview-menu">
                    <li class="active"><a href="{{ route('admin.auth.users') }}"><i class="fa fa-users"></i>管理员管理</a></li>
                    <li><a href="#"><i class="fa fa-user"></i>角色</a></li>
                    <li><a href="#"><i class="fa fa-ban"></i>权限</a></li>
                    <li><a href="#"><i class="fa fa-bars"></i>菜单</a></li>
                    <li><a href="#"><i class="fa fa-history"></i>操作日志</a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>