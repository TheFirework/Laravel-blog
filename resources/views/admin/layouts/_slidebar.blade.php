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
        <ul class="sidebar-menu">
            <li class="header">菜单</li>
            <li >
                <a href="{{ route('admin.index.index') }}">
                    <i class="fa fa-home">
                    </i>
                    <span>首页</span>
                </a>
            </li>
            <li >
                <a href="{{ route('admin.index.dashboard') }}">
                    <i class="fa fa-tachometer">
                    </i>
                    <span>仪表盘</span>
                </a>
            </li>
            <li >
                <a href="javascript:void(0);">
                    <i class="fa fa-tasks"></i>
                    <span>系统管理</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.auth.users.index') }}"><i class="fa fa-users"></i><span>管理员</span></a></li>
                    <li><a href="{{ route('admin.nav.index') }}"><i class="fa fa-bars"></i><span>导航</span></a></li>
                </ul>
            </li>
            <li ><a href="#"><i class="fa fa-history"></i><span>操作日志</span></a></li>
            <li >
                <a href="JavaScript:void(0);">
                    <i class="fa fa-align-center"></i>
                    <span>内容管理</span>
                    <i class="fa fa-angle-left pull-right"></i>
                </a>
                <ul class="treeview-menu">
                    <li><a href="{{ route('admin.category.index') }}"><i class="fa fa-bars"></i><span>分类</span></a></li>
                    <li><a href="{{ route('admin.tag.index') }}"><i class="fa fa-tags"></i><span>标签</span></a></li>
                </ul>
            </li>
        </ul>
    </section>
    <!-- /.sidebar -->
</aside>