@extends('admin.layouts.app')

@section('title', 'Laravel Blog')

@section('css')
    <link rel="stylesheet" href="{{ asset('laravel-admin/nestable/nestable.css') }}">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            菜单
            <small>列表</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">编辑</h3>
                        <div class="box-tools">
                            <div class="btn-group pull-right" style="margin-right: 5px">
                                <a href="javascript:void(0);" class="btn btn-sm btn-danger btn-delete" data-id="{{ $nav->id }}" title="删除">
                                    <i class="fa fa-trash"></i><span class="hidden-xs">  删除</span>
                                </a>
                            </div>
                            <div class="btn-group pull-right" style="margin-right: 5px">
                                <a href="{{ route('admin.nav.index') }}" class="btn btn-sm btn-default" title="列表">
                                    <i class="fa fa-list"></i>
                                    <span class="hidden-xs">&nbsp;列表</span>
                                </a>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <div class="box-body">
                        <form action="{{ route('admin.nav.update',$nav->id) }}" class="form-horizontal" accept-charset="UTF-8" method="post">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}
                            <div class="box-body fields-group">
                                <div class="form-group ">
                                    <label class="col-sm-2  control-label">ID</label>
                                    <div class="col-sm-8">
                                        <div class="box box-solid box-default no-margin">
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                {{ $nav->id }}
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                </div>
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
                                            <input type="text" id="name" name="name" value="{{ $nav->name }}"
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
                                            <span class="input-group-addon"><i
                                                        class="fa fa-internet-explorer fa-fw"></i></span>
                                            <input type="text" id="url" name="url" value="{{ $nav->url }}"
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
                                                       name="sort" value="{{ $nav->sort }}"
                                                       class="form-control number sort initialized" placeholder="输入 数字">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2  control-label">创建时间</label>
                                    <div class="col-sm-8">
                                        <div class="box box-solid box-default no-margin">
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                {{ $nav->created_at }}
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2  control-label">更新时间</label>
                                    <div class="col-sm-8">
                                        <div class="box box-solid box-default no-margin">
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                {{ $nav->updated_at }}
                                            </div>
                                            <!-- /.box-body -->
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
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
@endsection

@section('scriptAfterJs')
    <script src="{{ asset('laravel-admin/nestable/jquery.nestable.js') }}"></script>
    <script>
        $(document).ready(function () {
            // 删除按钮点击事件
            $('.btn-delete').click(function () {
                // 获取按钮上 data-id 属性的值，也就是地址 ID
                var id = $(this).data('id');
                // 调用 sweetalert
                swal({
                    title: "确认要删除该菜单？",
                    icon: "warning",
                    buttons: ['取消', '确定'],
                    dangerMode: true,
                })
                    .then(function (willDelete) { // 用户点击按钮后会触发这个回调函数
                        // 用户点击确定 willDelete 值为 true， 否则为 false
                        // 用户点了取消，啥也不做
                        if (!willDelete) {
                            return;
                        }
                        // 调用删除接口，用 id 来拼接出请求的 url
                        axios.post("/admin/nav/destroy/" + id)
                            .then(function (response) {
                                // 请求成功之后重新加载页面
                                if (response['data']['code'] === 100) {
                                    location.href="{{ route('admin.nav.index') }}";
                                } else {
                                    swal({
                                        title: "删除失败，请稍后再试！",
                                        icon: "warning",
                                    });
                                }
                            })
                    });
            });
        });
    </script>
@endsection