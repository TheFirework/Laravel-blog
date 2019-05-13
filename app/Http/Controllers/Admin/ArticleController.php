<?php

namespace App\Http\Controllers\Admin;

use App\Handlers\ImageUploadHandler;
use App\Http\Requests\Article\Store;
use App\Http\Requests\Article\Update;
use App\Models\Article;
use App\Models\ArticleTag;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;
use LaravelChen\MyFlash\MyFlash;

class ArticleController extends Controller
{
    public function index(Request $request, Article $article)
    {
        $keywords = $request->keywords;

        if (empty($keywords)) {
            $id = [];
        } else {
            $id = $article->searchArticleGetId($keywords);
        }

        $articles = Article::with('category')
            ->orderBy('created_at', 'desc')
            ->when($keywords, function ($query) use ($id) {
                return $query->whereIn('id', $id);
            })
            ->paginate(15);

        return view('admin/article/index', compact('articles'));
    }

    public function show(Article $article)
    {
        return view('admin/article/show',compact('article'));
    }

    public function create()
    {
        $categories = Category::all();

        $tags = Tag::all();

        return view('admin/article/create', compact('categories', 'tags'));
    }

    public function store(Store $request,ImageUploadHandler $uploader)
    {
        $data = $request->only([
            'title','category_id','author','markdown','description','keywords','cover','is_top'
        ]);

        $tags = $request->tags;

        $tags = explode(',',$tags);

        if ($request->hasFile('cover')){
            $result = $uploader->save($request->cover, 'cover', 'cover');
            if ($result) {
                $data['cover'] = $result['path'];
            }
        }

        $data['body'] = markdown_to_html($data['markdown']);

        $article = Article::create($data);

        if ($article) {
            $articleTag = new ArticleTag();
            $articleTag->addTagIds($article->id, $tags);
        }

        MyFlash::success('文章新增!');

        return redirect()->route('admin.article.show',$article->id);
    }

    public function edit(Article $article)
    {
        $categories = Category::all();

        $tags = Tag::all();

        $article->tag_ids = ArticleTag::where('article_id', $article->id)->pluck('tag_id')->toArray();

        return view('admin/article/edit',compact('article','categories','tags'));
    }

    public function update(Article $article,Update $request,ImageUploadHandler $uploader,ArticleTag $articleTag)
    {
        $data = $request->only([
            'title','category_id','author','markdown','description','keywords','cover','is_top'
        ]);

        $tags = $request->tags;

        $tags = explode(',',$tags);

        if ($request->hasFile('cover')){
            $result = $uploader->save($request->cover, 'cover', 'cover');
            if ($result) {
                $data['cover'] = $result['path'];
            }
        }

        $data['body'] = markdown_to_html($data['markdown']);

        ArticleTag::where('article_id', $article->id)->forceDelete();

        $articleTag->addTagIds($article->id, $tags);

        $article->update($data);

        MyFlash::success('文章更新!');

        return redirect()->route('admin.article.show',$article->id);
    }

    public function destroy($id)
    {
        Article::destroy($id);

        MyFlash::success('文章删除');

        return response()->json([
            'code'=>100,
            'msg'=>'删除文章成功'
        ]);
    }

    /**
     * editormd上传图片
     * @return \Illuminate\Http\JsonResponse
     */
    public function uploadImage(ImageUploadHandler $uploader,Request $request)
    {
        if ($request->hasFile('editormd-image-file')){
            $result = $uploader->save($request->file('editormd-image-file'),'markdown','markdown');
            if ($result) {
                $data = [
                    'success' => 1,
                    'message' => '图片上传成功',
                    'url'     => $result['path'],
                ];

            } else {
                $data = [
                    'success' => 0,
                    'message' => '上传图片失败',
                    'url'     => '',
                ];
            }
            return response()->json($data);
        } else {
            return response()->json([
                'success' => 0,
                'message' => '请上传图片',
                'url'     => ''
            ]);
        }

    }
}
