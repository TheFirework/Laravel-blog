<?php

namespace App\Http\Controllers\Home;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $articles = Article::orderBy('created_at','desc')->paginate(12);

        if ($request->ajax()){
            $view = view('home/layouts/article',compact('articles'))->render();
            return response()->json($view);
        }

        return view('home.index.index',compact('articles'));
    }
}
