@extends('admin.layouts.app')

@section('title', 'Laravel Blog')

@section('css')
    <link rel="stylesheet" href="{{ asset("laravel-admin/bootstrap-fileinput/css/fileinput.min.css") }}">
@endsection

@section('content')
    <section class="content-header">
        <h1>
            管理员
            <small>编辑</small>
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
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">编辑</h3>
                        <div class="box-tools">
                            <div class="btn-group pull-right" style="margin-right: 5px">
                                <a href="{{ route('admin.auth.users.index') }}" class="btn btn-sm btn-default"
                                   title="列表"><i class="fa fa-list"></i><span class="hidden-xs">&nbsp;列表</span></a>
                            </div>
                        </div>
                    </div>
                    <form action="{{ url('admin/auth/users') }}" method="post" accept-charset="UTF-8"
                          class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        {{ csrf_field() }}
                        <div class="box-body">
                            <div class="fields-group">
                                <div class="form-group">
                                    <label for="id" class="col-sm-2 control-label">ID</label>
                                    <div class="col-sm-8">
                                        <div class="box box-solid box-default no-margin">
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                {{ $user->id }}
                                            </div>
                                            <!-- /.box-body -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {!! !$errors->has('email') ?: 'has-error' !!}">
                                    <label for="email" class="col-sm-2  control-label">邮箱</label>
                                    <div class="col-sm-8">
                                        @if($errors->has('email'))
                                            @foreach($errors->get('email') as $message)
                                                <label class="control-label" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i>{{$message}}
                                                </label><br>
                                            @endforeach
                                        @endif
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                            <input type="text" id="email" name="email" value="{{ $user->email }}"
                                                   class="form-control email" placeholder="输入 邮箱">
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
                                            <input type="text" id="name" name="name" value="{{ $user->name }}"
                                                   class="form-control name"
                                                   placeholder="输入 名称">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {!! !$errors->has('password') ?: 'has-error' !!}">
                                    <label for="avatar" class="col-sm-2  control-label">头像</label>
                                    <div class="col-sm-8">
                                        @if($errors->has('avatar'))
                                            @foreach($errors->get('avatar') as $message)
                                                <label class="control-label" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i>{{$message}}
                                                </label><br>
                                            @endforeach
                                        @endif
                                            <input id="avatar" name="avatar" type="file" data-browse-on-zone-click="true" data-show-upload="false" data-show-caption="true">
                                    </div>
                                </div>
                                <div class="form-group {!! !$errors->has('password') ?: 'has-error' !!}">
                                    <label for="password" class="col-sm-2  control-label">密码</label>
                                    <div class="col-sm-8">
                                        @if($errors->has('password'))
                                            @foreach($errors->get('password') as $message)
                                                <label class="control-label" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i>{{$message}}
                                                </label><br>
                                            @endforeach
                                        @endif
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-eye-slash fa-fw"></i></span>
                                            <input type="password" id="password" name="password" value=""
                                                   class="form-control password" placeholder="输入 密码"
                                                   aria-autocomplete="list">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {!! !$errors->has('password_confirmation') ?: 'has-error' !!}">
                                    <label for="password_confirmation" class="col-sm-2  control-label">确认密码</label>
                                    <div class="col-sm-8">
                                        @if($errors->has('password_confirmation'))
                                            @foreach($errors->get('password_confirmation') as $message)
                                                <label class="control-label" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i>{{$message}}
                                                </label><br>
                                            @endforeach
                                        @endif
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-eye-slash fa-fw"></i></span>
                                            <input type="password" id="password_confirmation"
                                                   name="password_confirmation" value=""
                                                   class="form-control password_confirmation" placeholder="输入 确认密码">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <div class="col-md-2">
                            </div>
                            <div class="col-md-8">
                                <div class="btn-group pull-right">
                                    <button type="submit" class="btn btn-primary btn-create-user">提交</button>
                                </div>
                                <div class="btn-group pull-left">
                                    <button type="reset" class="btn btn-warning">重置</button>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scriptAfterJs')
    <script src="{{ asset('laravel-admin/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#avatar').fileinput({
                language: 'zh', //设置语言
                // uploadUrl: "", //上传的地址
                allowedFileExtensions: ['jpg', 'gif', 'png', 'jpeg'],//接收的文件后缀
                overwriteInitial: false,
                validateInitialCount: true,
                initialPreview: [
                    "<img class='kv-preview-data file-preview-image' src='{{ $user->avatar }}'>",
                ],
                initialPreviewConfig: [
                    {caption: "{{ $user->avatar }}"},
                ],
                // layoutTemplates :{
                //     actionDelete:'', //去除上传预览的缩略图中的删除图标
                //     actionUpload:'',//去除上传预览缩略图中的上传图片；
                //     // actionZoom:''   //去除上传预览缩略图中的查看详情预览的缩略图标。
                // },
                fileActionSettings: {
                    showRemove: false, //移除
                    showUpload: false, //上传
                    showZoom: true, //放大
                    showDrag: false,
                },
                maxFileCount: 1, //表示允许同时上传的最大文件个数
                enctype: 'multipart/form-data',
                previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
                browseClass: "btn btn-primary", //按钮样式
                // dropZoneEnabled: false,//是否显示拖拽区域
                minImageWidth: 50, //图片的最小宽度
                minImageHeight: 50,//图片的最小高度
            });
        });
    </script>
@endsection