<?php

namespace App\Http\Controllers;
use App\Article;
use App\Http\Requests;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticlesController extends Controller
{
    public function index()
    {   //latest() 最新的 再最前面
        $articles = Article::latest()->get();
        return view('articles.index',compact('articles'));

    }

    public function store(Requests\CreateArticleRequest $request)
    {
        //获取单个值的写法 $request->get('某个字段');
        //$input = $request->all();
        //$input['published_at'] = Carbon::now();
        Article::create($request->all());
        return redirect('/articles');
    }
    public function show($id)
    {
       // $article = Article::find($id);
        $article = Article::findOrFail($id); //默认不查询空数据
       // dd($article->published_at->diffForHumans());
        return view('articles.show',compact('article'));
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('articles.edit',compact('article'));
    }

    public function update(Request $request, $id)
    {

        $article = Article::findOrFail($id);
        $article->update($request->all());
        return redirect('/articles');
    }
    //新建文章页面
    public function create()
    {
        return view('articles.create');
    }
}
