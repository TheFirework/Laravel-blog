@extends('admin.layouts.app')

@section('title', 'Laravel Blog')

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
                    <form action="{{ route('admin.auth.users.update',$user->id) }}" method="post" accept-charset="UTF-8" pjax-container
                          class="form-horizontal" enctype="multipart/form-data">
                        <input type="hidden" name="id" value="{{ $user->id }}">
                        {{ csrf_field() }}
                        {{ method_field('patch') }}
                        <div class="box-body">
                            <div class="fields-group box-body">
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
                                        <input type="file" class="file avatar" name="avatar"
                                               data-initial-preview="<img  src='{{ $user->avatar }}' />" class='file-preview-image'
                                               data-initial-caption="{{ $user->avatar }}"
                                               data-show-upload="false"
                                        />
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
                                            <input type="password" id="password" name="password" value="{{ $user->password }}"
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
                                                   name="password_confirmation" value="{{ $user->password }}"
                                                   class="form-control password_confirmation" placeholder="输入 确认密码">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2  control-label">创建时间</label>
                                    <div class="col-sm-8">
                                        <div class="box box-solid box-default no-margin">
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                {{ $user->created_at }}
                                            </div><!-- /.box-body -->
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group ">
                                    <label class="col-sm-2  control-label">更新时间</label>
                                    <div class="col-sm-8">
                                        <div class="box box-solid box-default no-margin">
                                            <!-- /.box-header -->
                                            <div class="box-body">
                                                {{ $user->updated_at }}
                                            </div><!-- /.box-body -->
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
    <script data-exec-on-popstate>
        $(document).ready(function () {

            $("input.avatar").fileinput({
                uploadAsync: false,
                overwriteInitial: true,
                initialPreviewAsData: true,
                browseLabel: "\u6d4f\u89c8",
                showRemove: false,
                showUpload: false,
                layoutTemplates :{
                    actionDelete:'', //去除上传预览的缩略图中的删除图标
                    actionUpload:'',//去除上传预览缩略图中的上传图片；
                    // actionZoom:''   //去除上传预览缩略图中的查看详情预览的缩略图标。
                },
                allowedFileTypes: ["image"],
                minImageWidth:50,
                minImageHeight:50,
                maxFileCount: 1, //表示允许同时上传的最大文件个数
            });
        });
    </script>
@endsection