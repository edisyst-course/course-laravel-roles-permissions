<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class ArticleController extends Controller
{

    public function index()
    {
        $articles = Article::all();

        return view('articles.index', compact('articles'));
    }


    public function create()
    {
        return view('articles.create', [
            'categories' => Category::all()
        ]);
    }


    public function store(Request $request)
    {
        $organizationId = auth()->user()->organization_id ?? auth()->id();

        $attributes = $request->validate([
            'title' => 'required|string',
            'full_text' => 'required|string',
        ]);

//        $attributes['user_id'] = $organizationId;
        // only store attribute for published_at if authenticated user is an admin or a publisher
        // additionally populate column only if checkbox is selected
//        $attributes['published_at'] = Gate::allows('publish-articles')
//        && $request->input('published') ? now() : null;

        Article::create($attributes + ['user_id' => auth()->id()]);

        return redirect()->route('articles.index');

//        dd($attributes);
    }


    public function show(Article $article)
    {
        //
    }


    public function edit(Article $article)
    {
//        return view('articles.edit', compact('article'));

        // authorising the update action via policy
//        $this->authorize('update', $article);

        $categories = Category::all();
        return view('articles.edit', [
            'article' => $article,
            'categories' => $categories
        ]);
    }


    public function update(Request $request, Article $article)
    {
//        $this->authorize('update', $article);

        $attributes = $request->validate([
            'title' => 'required|string',
            'full_text' => 'required|string',
        ]);

//        $attributes['published_at'] = Gate::allows('publish-articles')
//        && $request->input('published') ? now() : null;

        $article->update($attributes);

        return redirect()->route('articles.index');
    }


    public function destroy(Article $article)
    {
//        $this->authorize('update', $article);

        $article->delete();

        return redirect()->route('articles.index');
    }
}
