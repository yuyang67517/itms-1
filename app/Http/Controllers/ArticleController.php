<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        //$this->authorizeResource(Article::class, 'article');
    }

    public function index()
    {
        //
        $articles = Article::all();

        return View::make('articles.index')->with('articles',$articles);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categories = Category::all();
        return View::make('articles.create')->with('categories',$categories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $article = new Article;
        $article->title = $request->title;
        $article->description = $request->description;
        $article->user_id = $request->user_id;
        $article->save();
        $categories = $request->categories;
        $article->categories()->attach($categories);
        return redirect("articles");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $article = Article::find($id);
        $user = Auth::user();

        return View::make('articles.show')
        ->with('article', $article, 'user', $user);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        // get the article
        $article = Article::find($id);
        $categories = Category::all();

        $this->authorize('update', $article);

        // show the edit form and pass the article
        return View::make('articles.edit')
            ->with('article',$article)
            ->with('categories', $categories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
         $article = Article::findOrFail($id);
        // Getting values from the blade template form
        $article->title =  $request->get('title');
        $article->description = $request->get('description');
        $article->save();
        $categories = $request->categories;
        $article->categories()->sync($categories);

        return redirect("articles");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $article = Article::find($id);
        $this->authorize('delete', $article);
        $article->delete();

        return redirect("articles");
    }
}
