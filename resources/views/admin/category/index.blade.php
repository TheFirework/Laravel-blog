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
                            <a class="btn btn-primary btn-sm tree-tools" onclick="switchTree(this)"  data-action="expand" title="展开">
                                <i class="fa fa-plus-square-o"></i><span class="hidden-xs">&nbsp;展开</span>
                            </a>
                            <a class="btn btn-primary btn-sm tree-tools" onclick="switchTree(this)"  data-action="collapse" title="收起">
                                <i class="fa fa-minus-square-o"></i><span class="hidden-xs">&nbsp;收起</span>
                            </a>
                        </div>
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
                        <div class="dd" id="tree">
                            <ol class="dd-list">
                                @foreach($categories as $category)
                                <li class="dd-item" data-id="{{ $category['id'] }}">
                                    <div class="dd-handle">
                                        {{ $category['sort'] }} - {{ $category['name'] }}
                                        <span class="pull-right dd-nodrag">
                                            <a href="{{ route('admin.category.edit',$category['id']) }}"><i class="fa fa-edit"></i></a>
                                            <a href="javascript:void(0);" data-id="{{ $category['id'] }}" onclick="tree_branch_delete(this)"  class="tree_branch_delete"><i class="fa fa-trash"></i></a>
                                        </span>
                                    </div>
                                    @if($category['_child'])
                                        @foreach($category['_child'] as $children)
                                            <ol class="da-list" >
                                                <li class="dd-item" data-id="{{ $children['id'] }}">
                                                    <div class="dd-handle">
                                                        {{ $children['sort'] }} - {{ $children['name'] }}
                                                         <span class="pull-right dd-nodrag">
                                                                <a href="{{ route('admin.category.edit',$children['id']) }}"><i class="fa fa-edit"></i></a>
                                                                <a href="javascript:void(0);" data-id="{{ $children['id'] }}" onclick="tree_branch_delete(this)" class="tree_branch_delete">
                                                                    <i class="fa fa-trash"></i>
                                                                </a>
                                                        </span>
                                                    </div>
                                                </li>
                                            </ol>
                                        @endforeach
                                     @endif
                                    </li>
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
    <script data-exec-on-popstate>
        //切换折叠
        function switchTree(obj)
        {
            var target = $(obj),
                action = target.data('action');
            if (action === 'expand') {
                $('.dd').nestable('expandAll');
            }
            if (action === 'collapse') {
                $('.dd').nestable('collapseAll');
            }
        }

        function tree_branch_delete(obj)
        {
            var id = $(obj).data('id');
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
                    $.ajax({
                        method: 'delete',
                        url: "/admin/category/" + id
                    }).done(function(response) {
                        if (response['code'] === 100) {
                            location.href="{{ route('admin.category.index') }}";
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
            //初始化菜单栏
            $('#tree').nestable([]);
        });
    </script>
@endsection