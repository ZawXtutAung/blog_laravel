<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index(){

        $article = Article::latest()->paginate(5);
        return view('articles.index', [
            'articles' => $article
        ]);
    }
    public function detail(Article $article){
        return view('articles.detail',[
           'article' => $article
        ]);
    }
    public function add(){
        $data=[
            ["id" => 1,"name" => "News"],
            ["id" => 2,"name" => "Tech"]
        ];
        return view('articles.add',[
            'categories' => $data
        ]);
    }
    public function create(Request $request){
        $this->validateRequest($request);

        Article::create([
            'title'       => $request->title,
            'body'        => $request->body,
            'category_id' => $request->category_id,
            'user_id'     => auth()->user()->id
        ]);

        return redirect('/articles');
    }

    public function delete(Article $article){
        $article->delete();
        return redirect('/articles')->with('info','Article delete');
    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'title'       => 'required',
            'body'        => 'required',
            'category_id' => 'required'
        ]);
    }
}
