@extends('admin.layouts.app')

@section('title', 'Laravel Blog')
@section('content')
    <section class="content-header">
        <h1>
            标签
            <small>列表</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <div class="btn-group pull-right">
                            <a class="btn btn-success btn-sm" href="{{ route('admin.tag.create') }}"><i class="fa fa-save"></i><span class="hidden-xs">&nbsp;新增</span></a>
                        </div>
                        <span>
                                <a class="btn btn-sm btn-primary grid-refresh" href="{{ route('admin.tag.index') }}" title="刷新"><i class="fa fa-refresh"></i><span class="hidden-xs"> 刷新</span></a>
                                <div class="btn-group" style="margin-right: 10px" data-toggle="buttons" onclick="screenBox()">
                                    <label class="btn btn-sm btn-dropbox" title="筛选">
                                        <i class="fa fa-filter"></i><span class="hidden-xs">&nbsp;&nbsp;筛选</span>
                                    </label>
                                </div>
                        </span>
                    </div>
                    <div class="box-header with-border hide" id="filter-box">
                        <form action="{{ route('admin.tag.index') }}" class="form-horizontal" method="get" pjax-container>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box-body">
                                        <div class="fields-group">
                                            <div class="form-group">
                                                <label class="col-sm-2 control-label"> ID</label>
                                                <div class="col-sm-8">
                                                    <div class="input-group input-group-sm">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-pencil"></i>
                                                        </div>
                                                        <input type="text" class="form-control id" placeholder="ID" name="id" value="">
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
                                                <a href="{{ route('admin.tag.index') }}" class="btn btn-default btn-sm"><i class="fa fa-undo"></i>&nbsp;&nbsp;重置</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                    <div class="box-body table-responsive no-padding">
                        <table class="table table-hover">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>名称</th>
                                <th>文章数</th>
                                <th>创建时间</th>
                                <th>更新时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach ($tags as $tag)
                                <tr>
                                    <td> {{ $tag->id }} </td>
                                    <td> {{ $tag->name }} </td>
                                    <td> {{ $tag->article_count }} </td>
                                    <td> {{ $tag->created_at }} </td>
                                    <td> {{ $tag->updated_at }}</td>
                                    <td>
                                        <a href="{{ route('admin.tag.edit',$tag->id) }}">
                                            <i class="fa fa-edit"></i>
                                        </a>
                                        <a href="javascript:void(0)" class="btn-del-user" onclick="delete_tag(this)" data-id="{{ $tag->id }}">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{ $tags->links('vendor.pagination.page') }}
                </div>
            </div>
        </div>
    </section>
    <script data-exec-on-popstate>
        function delete_tag(obj)
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
                        method: 'delete',
                        url: "/admin/tag/" + id
                    }).done(function(response) {
                        if (response['code'] === 100) {
                            location.href="{{ route('admin.tag.index') }}";
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

@section('scriptAfterJs')
@endsection