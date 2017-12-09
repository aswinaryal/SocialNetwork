<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Auth;
use DB;
class ArticlesController extends Controller
{
    
    public function index()
    {
        // $articles = Article::all();
        $articles = Article::paginate(10);
        return view('articles.index',compact('articles'));
        //Using QueryBuilder
        // $articles = DB::table('articles')->get();
        // $articles = DB::table('articles')->whereLive(1)->first();
        // dd($articles);
        // return $articles;
    }

    
    public function create()
    {
        return view('articles.create');
    }

  
    public function store(Request $request)
    {
        // $article = new Article;

        // $article->user_id = Auth::user()->id;
        // $article->content = $request->content;
        // $article->live = (boolean)$request->live;
        // $article->post_on = $request->post_on;

        // $article->save();
        // return $request->all();

        
        //when input field name matches with database column name
        Article::create($request->all());
        return redirect('/articles');

        //when column name doesn't matches with input field name

        // Article::create([
        //     'user_id'=> Auth::user()->id,
        //     'contents'=> $request->content,
        //     'live' => $request->live,
        //     'post_on'=>$request->post_on
        // ]);

        // With QueryBuilder
        // DB::table('articles')->insert($request->except('_token'));
        // DB::table('articles')->insert([
        //     'user_id'=> Auth::user()->id,
        //     'contents'=> $request->content,
        //     'live' =>(boolean)$request->live,
        //     'post_on'=>$request->post_on
        // ]);


    }

 
    public function show($id)
    {
        $article = Article::findOrFail($id);
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
       if(!isset($request->live))
           $article->update(array_merge($request->all(),['live'=>false]));
       else
       $article->update($request->all());

       return redirect('/articles');
    }

   
    public function destroy($id)
    {
        //
    }
}
