@extends('admin.layouts.app')

@section('title', 'Laravel Blog')
@section('content')
    <section class="content-header">
        <h1>
            文章
            <small>创建</small>
        </h1>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-info">
                    <div class="box-header with-border">
                        <h3 class="box-title">创建</h3>
                        <div class="box-tools">
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
                        <form action="{{ route('admin.article.store') }}" class="form-horizontal" pjax-container
                              accept-charset="UTF-8" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="box-body fields-group">
                                <div class="form-group  {!! !$errors->has('title') ?: 'has-error' !!}">
                                    <label for="title" class="col-sm-2  control-label">标题</label>
                                    <div class="col-sm-8">
                                        @if($errors->has('title'))
                                            @foreach($errors->get('title') as $message)
                                                <label class="control-label" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i>{{$message}}
                                                </label><br>
                                            @endforeach
                                        @endif
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                            <input type="text" id="title" name="title" value="{{ old('title') }}" maxlength="255"
                                                   class="form-control title" placeholder="输入 标题">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  {!! !$errors->has('author') ?: 'has-error' !!}">
                                    <label for="author" class="col-sm-2  control-label">作者</label>
                                    <div class="col-sm-8">
                                        @if($errors->has('author'))
                                            @foreach($errors->get('author') as $message)
                                                <label class="control-label" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i>{{$message}}
                                                </label><br>
                                            @endforeach
                                        @endif
                                        <div class="input-group">
                                            <span class="input-group-addon"><i class="fa fa-pencil fa-fw"></i></span>
                                            <input type="text" id="author" name="author" value="{{ old('author') }}" maxlength="255"
                                                   class="form-control author" placeholder="输入 作者">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group {!! !$errors->has('cover') ?: 'has-error' !!}">
                                    <label for="cover" class="col-sm-2  control-label">封面</label>
                                    <div class="col-sm-8">
                                        @if($errors->has('cover'))
                                            @foreach($errors->get('cover') as $message)
                                                <label class="control-label" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i>{{$message}}
                                                </label><br>
                                            @endforeach
                                        @endif
                                        <input id="cover" name="cover" type="file" data-browse-on-zone-click="true" data-show-upload="false" data-show-caption="true">
                                    </div>
                                </div>
                                <div class="form-group  {!! !$errors->has('title') ?: 'has-error' !!}">
                                    <label for="category_id" class="col-sm-2  control-label">分类</label>
                                    <div class="col-sm-8">
                                        @if($errors->has('category_id'))
                                            @foreach($errors->get('category_id') as $message)
                                                <label class="control-label" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i>{{$message}}
                                                </label><br>
                                            @endforeach
                                        @endif
                                        <select class="form-control category_id select2-hidden-accessible" id="category_id"
                                                style="width: 100%;" name="category_id" data-value="" tabindex="-1"
                                                aria-hidden="true">
                                            @foreach( $categories as $category)
                                                <option value="{{ $category['id'] }}">
                                                    {{ $category['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group  {!! !$errors->has('title') ?: 'has-error' !!}">
                                    <input type="hidden" name="tags" id="tags">
                                    <label for="tag_id" class="col-sm-2  control-label">标签</label>
                                    <div class="col-sm-8">
                                        @if($errors->has('tag_id'))
                                            @foreach($errors->get('tag_id') as $message)
                                                <label class="control-label" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i>{{$message}}
                                                </label><br>
                                            @endforeach
                                        @endif
                                        <select class="form-control tag_id select2-hidden-accessible"
                                                style="width: 100%;"  data-value="" tabindex="-1" id="tag_id" multiple="multiple"
                                                aria-hidden="true">
                                            @foreach( $tags as $tag)
                                                <option value="{{ $tag['id'] }}">
                                                    {{ $tag['name'] }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group  {!! !$errors->has('is_top') ?: 'has-error' !!}">
                                    <label for="is_top" class="col-sm-2  control-label">置顶</label>
                                    <div class="col-sm-8">
                                        @if($errors->has('is_top'))
                                            @foreach($errors->get('is_top') as $message)
                                                <label class="control-label" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i>{{$message}}
                                                </label><br>
                                            @endforeach
                                        @endif
                                            <label class="">
                                                <div class="iradio_minimal-blue checked" aria-checked="true" aria-disabled="false" style="position: relative;">
                                                    <label for="top_1">是</label>
                                                    <input type="radio" name="is_top"  id="top_1" value="1" class="minimal" checked="" style="position: absolute; opacity: 0;">
                                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                </div>
                                            </label>
                                            <label class="is_top_margin_left">
                                                <div class="iradio_minimal-blue" aria-checked="false" aria-disabled="false" style="position: relative;">
                                                    <label for="top_2">否</label>
                                                    <input type="radio" name="is_top" id="top_2" value="0" class="minimal" style="position: absolute; opacity: 0;">
                                                    <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; background: rgb(255, 255, 255); border: 0px; opacity: 0;"></ins>
                                                </div>
                                            </label>
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
                                                        class="fa fa-pencil fa-fw"></i></span>
                                            <input type="text" id="keywords" name="keywords" maxlength="255"
                                                   value="{{ old('keywords') }}"
                                                   class="form-control url" placeholder="输入 关键词">
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
                                                  placeholder="输入 描述">{{ old('description') }}</textarea>
                                    </div>
                                </div>
                                <div class="form-group  {!! !$errors->has('markdown') ?: 'has-error' !!}">
                                    <label for="markdown" class="col-sm-2  control-label">内容</label>
                                    <div class="col-sm-8">
                                        @if($errors->has('markdown'))
                                            @foreach($errors->get('markdown') as $message)
                                                <label class="control-label" for="inputError"><i
                                                            class="fa fa-times-circle-o"></i>{{$message}}
                                                </label><br>
                                            @endforeach
                                        @endif
                                        <div id="editor">
                                              <textarea name="markdown" style="display:none;"
                                                        placeholder="输入 文章内容">{{ old('markdown') }}</textarea>
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
    <script data-exec-on-popstate>
        $(document).ready(function () {
            $('input').iCheck({
                checkboxClass: 'icheckbox_square-blue',
                // radioClass: 'iradio_minimal-blue',
                radioClass: 'iradio_square-blue',
                increaseArea: '20%' // optional
            });
            var editor = editormd("editor", {
                autoFocus : false,
                width     : "100%",
                height    : 720,
                toc       : true,
                syncScrolling: true,
                todoList  : true,
                placeholder: "请输入文章内容",
                toolbarAutoFixed: false,
                path : "{{ asset('/laravel-admin/editormd/lib') }}/",  // Autoload modules mode, codemirror, marked... dependents libs path
                emoji: true,
                toolbarIcons : ['undo', 'redo', 'bold', 'del', 'italic', 'quote', 'uppercase', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6', 'list-ul', 'list-ol', 'hr', 'link', 'reference-link', 'image', 'code', 'code-block', 'table', 'emoji', 'html-entities', 'watch', 'preview', 'search', 'fullscreen'],
                imageUpload: true,
                imageUploadURL : '{{ route('admin.article.uploadImage') }}',

            });

            var $cover = $('#cover'), initPlugin = function() {
                $cover.fileinput({
                    language: 'zh', //设置语言
                    // uploadUrl: "", //上传的地址
                    allowedFileExtensions: ['jpg', 'gif', 'png', 'jpeg'],//接收的文件后缀
                    //uploadExtraData:{"id": 1, "fileName":'123.mp3'},
                    uploadAsync: false, //默认异步上传
                    showUpload: false, //是否显示上传按钮
                    showRemove: false, //显示移除按钮
                    showPreview: true, //是否显示预览
                    showCaption: false,//是否显示标题
                    browseClass: "btn btn-primary", //按钮样式
                    dropZoneEnabled: false,//是否显示拖拽区域
                    minImageWidth: 50, //图片的最小宽度
                    minImageHeight: 50,//图片的最小高度
                    //maxImageWidth: 1000,//图片的最大宽度
                    //maxImageHeight: 1000,//图片的最大高度
                    maxFileSize: 0,//单位为kb，如果为0表示不限制文件大小
                    //minFileCount: 0,
                    maxFileCount: 1, //表示允许同时上传的最大文件个数
                    enctype: 'multipart/form-data',
                    validateInitialCount: true,
                    previewFileIcon: "<i class='glyphicon glyphicon-king'></i>",
                    msgFilesTooMany: "选择上传的文件数量({n}) 超过允许的最大数值{m}！",
                    fileActionSettings: {
                        showRemove: false, //移除
                        showUpload: false, //上传
                        showZoom: true, //放大
                        showDrag: false,
                    },
                    layoutTemplates :{
                        actionDelete:'', //去除上传预览的缩略图中的删除图标
                        actionUpload:'',//去除上传预览缩略图中的上传图片；
                        // actionZoom:''   //去除上传预览缩略图中的查看详情预览的缩略图标。
                    },
                    uploadExtraData: {}, //额外参数设置
                });
            };
            initPlugin();

            $(".category_id").select2({"allowClear": true,"placeholder": "Category id"});
            $(".tag_id").select2({"allowClear": true, "maximumSelectionLength":5,"placeholder": "Tag id"});

            $('#tag_id').change(function(){
                var o=document.getElementById('tag_id').getElementsByTagName('option');
                var all="";
                for(var i=0;i<o.length;i++){
                    if(o[i].selected){
                        all+=o[i].value+",";
                    }
                }
                all = all.substr(0, all.length - 1);//去掉末尾的逗号
                $("#tags").val(all);//赋值给隐藏的文本框
            })
        });
    </script>
@endsection

@section('scriptAfterJs')
@endsection