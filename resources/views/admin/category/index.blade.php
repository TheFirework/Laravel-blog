@extends('admin.layouts.app')

@section('title', 'Laravel Blog')
@section('css')
    <link rel="stylesheet" href="{{ asset('laravel-admin/nestable/nestable.css') }}">
@endsection
@section('content')
    <section class="content-header">
        <h1>
            分类
            <small>列表</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header">
                        <div class="btn-group">
                            <a class="btn btn-warning btn-sm " href="{{ route('admin.category.index') }}" title="刷新">
                                <i class="fa fa-refresh"></i>
                                <span class="hidden-xs">&nbsp;刷新</span>
                            </a>
                        </div>
                        <div class="btn-group">
                        </div>
                        <div class="btn-group pull-right">
                            <a class="btn btn-success btn-sm" href="{{ route('admin.category.create') }}"><i class="fa fa-save"></i><span class="hidden-xs">&nbsp;新增</span></a>
                        </div>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <div class="dd" id="tree-">
                            <ol class="dd-list">
                                @foreach($categories as $category)
                                <li class="dd-item" data-id="{{ $category['id'] }}">
                                    <div class="dd-handle">
                                        {{ $category['sort'] }} - {{ $category['name'] }}
                                        <span class="pull-right dd-nodrag">
                                            <a href="{{ route('admin.category.edit',$category['id']) }}"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0);" data-id="{{ $category['id'] }}" class="tree_branch_delete"><i class="fa fa-trash"></i></a>
                                        </span>
                                    </div>
                                </li>
                                    @if($category['_child'])
                                        @foreach($category['_child'] as $children)
                                            <li class="da-item" data-id="{{ $children['id'] }}">
                                                <div class="dd-handle" style="margin-left: 40px">
                                                    {{ $children['sort'] }} - {{ $children['name'] }}
                                                    <span class="pull-right dd-nodrag">
                                                            <a href="{{ route('admin.category.edit',$children['id']) }}"><i class="fa fa-edit"></i></a>
                                                            <a href="javascript:void(0);" data-id="{{ $children['id'] }}" class="tree_branch_delete"><i class="fa fa-trash"></i></a>
                                                        </span>
                                                </div>
                                            </li>
                                        @endforeach
                                    @endif
                                 @endforeach
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scriptAfterJs')
    <script src="{{ asset('laravel-admin/nestable/jquery.nestable.js') }}"></script>
    <script>
        $(function () {
            $('.tree_branch_delete').click(function() {
                var id = $(this).data('id');

                swal({
                    title: "确认删除？",
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
                        axios.delete("/admin/category/" + id)
                            .then(function (response) {
                                // 请求成功之后重新加载页面
                                if (response['data']['code'] === 100) {
                                    location.href="{{ route('admin.category.index') }}";
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