@extends('admin.layouts.app')

@section('title', 'Laravel Blog')
@section('css')
    <style>
        .body-border{
            border: 1px solid #d2d6de;
        }
    </style>
@endsection
@section('content')
    <section class="content-header">
        <h1>
            文章
            <small>预览</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">预览</h3>
                        <div class="box-tools">
                            <div class="btn-group pull-right" style="margin-right: 5px">
                                <a href="javascript:void(0);" class="btn btn-sm btn-danger btn-delete" onclick="delete_article(this)" data-id="{{ $article->id }}" title="删除">
                                    <i class="fa fa-trash"></i><span class="hidden-xs">  删除</span>
                                </a>
                            </div>
                            <div class="btn-group pull-right" style="margin-right: 5px">
                                <a href="{{ route('admin.article.edit',$article->id) }}" class="btn btn-sm btn-primary btn-edit"  data-id="{{ $article->id }}" title="编辑">
                                    <i class="fa fa-edit"></i><span class="hidden-xs">  编辑</span>
                                </a>
                            </div>
                            <div class="btn-group pull-right" style="margin-right: 5px">
                                <a href="{{ route('admin.article.index') }}" class="btn btn-sm btn-default" title="列表">
                                    <i class="fa fa-list"></i>
                                    <span class="hidden-xs">&nbsp;列表</span>
                                </a>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <div class="box-body">
                        <div class="col-sm-8 col-sm-offset-2 body-border">
                            {!! $article->body !!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scriptAfterJs')
    <script data-exec-on-popstate>
        function delete_article(obj)
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
                        url: "/admin/article/" + id
                    }).done(function(response) {
                        if (response['code'] === 100) {
                            location.href="{{ route('admin.article.index') }}";
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