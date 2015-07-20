<?php

namespace App\Http\Controllers;

use Request;
use App\Http\Requests\ArticleRequest;
use App\Http\Controllers\Controller;
use App\Article;

class ArticlesController extends Controller
{

    public function index()
    {
        $articles = Article::all();

        if (Request::wantsJson()) {
            return $articles;
        } else {
            return view('articles.index', compact('articles'));
        }
    }

    public function create()
    {
        $article = new Article;

        return view('articles.create', compact('article'));
    }

    public function store(ArticleRequest $request)
    {
        $article = Article::create($request->all());

        if (Request::wantsJson()) {
            return $article;
        } else {
            return redirect('articles');
        }
    }

    public function show(Article $article)
    {
        if (Request::wantsJson()) {
            return $article;
        } else {
            return view('articles.show', compact('article'));
        }
    }

    public function edit(Article $article)
    {
        return view('articles.edit', compact('article'));
    }

    public function update(ArticleRequest $request, Article $article)
    {
        $article->update($request->all());

        if (Request::wantsJson()) {
            return $article;
        } else {
            return redirect('articles');
        }
    }

    public function destroy(Article $article)
    {
        $deleted = $article->delete();

        if (Request::wantsJson()) {
            return (string) $deleted;
        } else {
            return redirect('articles');
        }
    }
}
