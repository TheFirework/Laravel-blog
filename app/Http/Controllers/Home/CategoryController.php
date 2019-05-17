<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    public function index(Request $request,$id)
    {
        $articles = Article::where('category_id',$id)->orderBy('created_at','desc')->paginate(12);

        if ($request->ajax()){
            $view = view('home/layouts/article',compact('articles'))->render();
            return response()->json($view);
        }

        return view('home/article/index',compact('articles'));
    }
}
