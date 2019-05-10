@extends('admin.layouts.app')

@section('title', 'Laravel Blog')
@section('content')
    <section class="content-header">
        <h1>
            分类
            <small>编辑</small>
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
                                <a href="javascript:void(0);" class="btn btn-sm btn-danger btn-delete" onclick="delete_category(this)" data-id="{{ $category->id }}" title="删除">
                                    <i class="fa fa-trash"></i><span class="hidden-xs">  删除</span>
                                </a>
                            </div>
                            <div class="btn-group pull-right" style="margin-right: 5px">
                                <a href="{{ route('admin.category.index') }}" class="btn btn-sm btn-default" title="列表">
                                    <i class="fa fa-list"></i>
                                    <span class="hidden-xs">&nbsp;列表</span>
                                </a>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <div class="box-body">
                        <form action="{{ route('admin.category.update',$category->id) }}" class="form-horizontal" pjax-container
                              accept-charset="UTF-8" method="post">
                            {{ csrf_field() }}
                            {{ method_field('patch') }}
                            <div class="box-body fields-group">
                                <div class="form-group  ">
                                    <label for="parent_id" class="col-sm-2  control-label">Parent id</label>
                                    <div class="col-sm-8">
                                        <input type="hidden" name="pid">
                                        <select class="form-control parent_id select2-hidden-accessible"
                                                style="width: 100%;" name="pid" data-value="" tabindex="-1"
                                                aria-hidden="true">
                                            @foreach( $categories as $cate)
                                                <option value="{{ $cate['id'] }}" @if($category->pid === $cate['id']) selected="selected" @endif>
                                                    @if($cate['level'] === 1)
                                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                                    @elseif($category['level'] === 2)
                                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                    @endif
                                                    {{ $cate['name'] }}</option>
                                                @if($cate['_child'])
                                                    @foreach( $cate['_child'] as $children)
                                                        <option value="{{ $children['id'] }}" @if($category->pid === $children['id']) selected="selected" @endif>
                                                            @if($children['level'] === 1)
                                                                &nbsp;&nbsp;&nbsp;
                                                            @elseif($children['level'] === 2)
                                                                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                                            @endif
                                                            {{ $children['name'] }}</option>
                                                    @endforeach
                                                @endif
                                            @endforeach
                                                {{--<option value="0">Root</option>--}}
                                        </select>
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
                                            <input type="text" id="name" name="name" value="{{ $category->name }}" maxlength="15"
                                                   class="form-control name" placeholder="输入 名称">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  {!! !$errors->has('keywords') ?: 'has-error' !!}">
                                    <label for="keywords" class="col-sm-2  control-label">关键词</label>
                                    <div class="col-sm-8">
                                        @if($errors->has('keywords'))
                                            @foreach($errors->get('keywords') as $message)
                                                <label class="control-label" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i>{{$message}}
                                                </label><br>
                                            @endforeach
                                        @endif
                                        <div class="input-group">
                                            <span class="input-group-addon"><i
                                                        class="fa fa-internet-pencil fa-fw"></i></span>
                                            <input type="text" id="keywords" name="keywords" maxlength="255"
                                                   value="{{ $category->keywords }}"
                                                   class="form-control url" placeholder="输入 关键词">
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
                                                       name="sort" value="{{ $category->sort }}"
                                                       class="form-control number sort initialized" placeholder="输入 数字">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  {!! !$errors->has('description') ?: 'has-error' !!}">
                                    <label for="description" class="col-sm-2  control-label">描述</label>
                                    <div class="col-sm-8">
                                        @if($errors->has('description'))
                                            @foreach($errors->get('description') as $message)
                                                <label class="control-label" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i>{{$message}}
                                                </label><br>
                                            @endforeach
                                        @endif
                                        <textarea name="description" class="form-control desc" rows="5" maxlength="255"
                                                  placeholder="输入 描述">{{ $category->description }}</textarea>
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
    <script data-exec-on-popstate>
        function delete_category(obj) {
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
                    axios.delete("/admin/category/" + id)
                        .then(function (response) {
                            // 请求成功之后重新加载页面
                            if (response['data']['code'] === 100) {
                                location.href = "{{ route('admin.category.index') }}";
                            } else {
                                swal({
                                    title: "删除失败，请稍后再试！",
                                    icon: "warning",
                                });
                            }
                        })
                });
        }

        $(document).ready(function () {
            $(".parent_id").select2({"allowClear": true, "placeholder": "Parent id"});
        });
    </script>
@endsection


@section('scriptAfterJs')
@endsection