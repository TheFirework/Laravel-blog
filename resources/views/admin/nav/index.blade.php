@extends('admin.layouts.app')

@section('title', 'Laravel Blog')

@section('content')
    <section class="content-header">
        <h1>
            导航
            <small>列表</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-6">
                <div class="box">
                    <div class="box-header">
                        <div class="btn-group">
                            <a class="btn btn-warning btn-sm" title="刷新" href="{{ route('admin.nav.index') }}"><i class="fa fa-refresh"></i><span
                                        class="hidden-xs">&nbsp;刷新</span></a>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <div class="dd" id="tree">
                            <ol class="dd-list">
                                @foreach($navs as $nav)
                                    <li class="dd-item" data-id="{{ $nav->id }}">
                                        <div class="dd-handle">
                                            <strong>{{ $nav->name }}</strong>
                                            &nbsp; &nbsp; &nbsp;
                                            <a href="/" class="dd-nodrag">/</a>
                                            <strong>{{ $nav->url }}</strong>
                                            <span class="pull-right dd-nodrag">
                                            <a href="{{ route('admin.nav.edit',$nav->id) }}"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0);" data-id="{{ $nav->id }}"
                                               class="tree_branch_delete btn-del-nav" onclick="tree_branch_delete(this)"><i class="fa fa-trash"></i></a>
                                        </span>
                                        </div>
                                    </li>
                                @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">新增</h3>
                        <div class="box-tools pull-right">
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <div class="box-body">
                        <form action="/admin/nav/index" class="form-horizontal" accept-charset="UTF-8" method="post" pjax-container>
                            {{ csrf_field() }}
                            <div class="box-body fields-group">
                                <div class="form-group  {!! !$errors->has('name') ?: 'has-error' !!}">
                                    <label for="name" class="col-sm-2  control-label">名称</label>
                                    <div class="col-sm-8">
                                        @if($errors->has('name'))
                                            @foreach($errors->get('name') as $message)
                                                <label class="control-label" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i>{{$message}}
                                                </label><br>
                                            @endforeach
                                        @endif
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                            <input type="text" id="name" name="name" value="{{ old('name') }}"
                                                   class="form-control name" placeholder="输入 名称">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  {!! !$errors->has('url') ?: 'has-error' !!}">
                                    <label for="url" class="col-sm-2  control-label">路径</label>
                                    <div class="col-sm-8">
                                        @if($errors->has('url'))
                                            @foreach($errors->get('url') as $message)
                                                <label class="control-label" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i>{{$message}}
                                                </label><br>
                                            @endforeach
                                        @endif
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-internet-explorer fa-fw"></i></span>
                                            <input type="text" id="url" name="url" value="{{ old('url') }}"
                                                   class="form-control url" placeholder="输入 路径">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  {!! !$errors->has('sort') ?: 'has-error' !!}">
                                    <label for="number" class="col-sm-2  control-label">排序</label>
                                    <div class="col-sm-8">
                                        @if($errors->has('sort'))
                                            @foreach($errors->get('sort') as $message)
                                                <label class="control-label" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i>{{$message}}
                                                </label><br>
                                            @endforeach
                                        @endif
                                        <div class="input-group">
                                            <div class="input-group">
                                                <input style="width: 100px; text-align: center;" type="text" id="number"
                                                       name="sort" value="0"
                                                       class="form-control number sort initialized" placeholder="输入 数字">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-footer">
                                <div class="col-md-2"></div>
                                <div class="col-md-8">
                                    <div class="btn-group pull-left">
                                        <button type="reset" class="btn btn-warning pull-right">重置</button>
                                    </div>
                                    <div class="btn-group pull-right">
                                        <button type="submit" class="btn btn-info pull-right">提交</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scriptAfterJs')
    <script data-exec-on-popstate charset="UTF-8">
        function tree_branch_delete(obj)
        {
            var id = $(obj).data('id');
            swal({
                title: "确认删除？",
                icon: "warning",
                buttons: ['取消', '确定'],
                dangerMode: true,
            })
                .then(function (willDelete) {
                    if (!willDelete) {
                        return;
                    }
                    $.ajax({
                        method: 'post',
                        url: '/admin/nav/destroy/' + id,
                        success: function (response) {
                            if (response['code'] === 100) {
                                location.href="{{ route('admin.nav.index') }}";
                            } else {
                                swal({
                                    title: "删除失败，请稍后再试！",
                                    icon: "warning",
                                });
                            }
                        }
                    });
                });
        }
    </script>
@endsection