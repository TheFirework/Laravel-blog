@extends('admin.layouts.app')

@section('title', 'Laravel Blog')

@section('content')
    <section class="content-header">
        <h1>
            管理员
            <small>列表</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Auth</a></li>
            <li><a href="#"><i class="fa fa-dashboard"></i> Users</a></li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header">
                        <div class="pull-right">
                            {{--<div class="btn-group pull-right" style="margin-right: 10px">--}}
                            {{--<a class="btn btn-sm btn-twitter" title="导出"><i class="fa fa-download"></i><span--}}
                            {{--class="hidden-xs"> 导出</span></a>--}}
                            {{--<button type="button" class="btn btn-sm btn-twitter dropdown-toggle"--}}
                            {{--data-toggle="dropdown" aria-expanded="false">--}}
                            {{--<span class="caret"></span>--}}
                            {{--<span class="sr-only">Toggle Dropdown</span>--}}
                            {{--</button>--}}
                            {{--<ul class="dropdown-menu" role="menu">--}}
                            {{--<li><a href="{{ url('/admin/auth/users',['_export_'=>'all']) }}"--}}
                            {{--target="_blank">全部</a></li>--}}
                            {{--<li><a href="{{ url('/admin/auth/users',['_export_'=>'page']) }}"--}}
                            {{--target="_blank">当前页</a></li>--}}
                            {{--<li><a href="{{ url('/admin/auth/users',['_export_'=>'__rows__']) }}"--}}
                            {{--target="_blank" class="export-selected">选择的行</a></li>--}}
                            {{--</ul>--}}
                            {{--</div>--}}
                            <div class="btn-group pull-right" style="margin-right: 10px">
                                <a href="{{ url('/admin/auth/users/create') }}" class="btn btn-sm btn-success"
                                   title="新增">
                                    <i class="fa fa-plus"></i><span class="hidden-xs">&nbsp;&nbsp;新增</span>
                                </a>
                            </div>
                        </div>
                        <span>
                                <a class="btn btn-sm btn-primary grid-refresh" href="{{ route('admin.auth.users.index') }}" title="刷新"><i class="fa fa-refresh"></i><span class="hidden-xs"> 刷新</span></a>
                                <div class="btn-group" style="margin-right: 10px" data-toggle="buttons" onclick="screenBox()">
                                    <label class="btn btn-sm btn-dropbox" title="筛选">
                                        <i class="fa fa-filter"></i><span class="hidden-xs">&nbsp;&nbsp;筛选</span>
                                    </label>
                                </div>
                        </span>
                    </div>
                    <div class="box-header with-border hide" id="filter-box">
                        <form action="{{ route('admin.auth.users.index') }}" class="form-horizontal" method="get" pjax-container>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box-body">
                                        <div class="fields-group">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> 邮箱</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-envelope"></i>
                                                        </div>
                                                        <input type="text" class="form-control name" placeholder="Email" name="email" value="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> 名称</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-pencil"></i>
                                                        </div>
                                                        <input type="text" class="form-control name" placeholder="Name" name="name" value="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->

                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="col-md-2"></div>
                                        <div class="col-md-8">
                                            <div class="btn-group pull-left">
                                                <button class="btn btn-info submit btn-sm"><i class="fa fa-search"></i>&nbsp;&nbsp;搜索</button>
                                            </div>
                                            <div class="btn-group pull-left " style="margin-left: 10px;">
                                                <a href="{{ route('admin.auth.users.index') }}" class="btn btn-default btn-sm"><i class="fa fa-undo"></i>&nbsp;&nbsp;重置</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="users" class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>邮箱</th>
                                <th>名称</th>
                                <th>角色</th>
                                <th>创建时间</th>
                                <th>更新时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td> {{ $user->id }} </td>
                                    <td> {{ $user->email }} </td>
                                    <td> {{ $user->name }} </td>
                                    <td><span class="label label-success">Administrator</span></td>
                                    <td> {{ $user->created_at }} </td>
                                    <td> {{ $user->updated_at }}</td>
                                    <td>
                                        @if($user->id != 1)
                                            <a href="{{ route('admin.auth.users.edit',$user->id) }}">
                                                <i class="fa fa-edit"></i>
                                            </a>
                                            <a href="javascript:void(0)" class="btn-del-user" onclick="delete_user(this)" data-id="{{ $user->id }}">
                                                <i class="fa fa-trash"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                    {{ $users->links('vendor.pagination.page') }}
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('scriptAfterJs')
    <script data-exec-on-popstate>
        function delete_user(obj) {
            var id = $(obj).data('id');
            swal({
                title: "确认要删除该用户？",
                icon: "warning",
                buttons: ['取消', '确定'],
                dangerMode: true,
            })
                .then(function (willDelete) {
                    if (!willDelete) {
                        return;
                    }
                    axios.delete('/admin/auth/users/' + id)
                        .then(function (response) {
                            // 请求成功之后重新加载页面
                            if (response['data']['code'] === 100) {
                                $.pjax.reload('#pjax-container');
                            } else {
                                swal({
                                    title: "删除失败，请稍后再试！",
                                    icon: "warning",
                                });
                            }
                        })
                });
        }
    </script>
@endsection