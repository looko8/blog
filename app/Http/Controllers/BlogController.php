<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use App\User;
use App\Article;

class BlogController extends Controller
{
    private $user;

    /**
     * Get user from request
     *
     * BlogController constructor.
     * @param Request $request
     */
    public function __construct(Request $request)
    {
        $this->user = User::find($request->user);
        View::share('sections', $this->user->sections);
        View::share('user', $this->user);
        View::share('latestPosts', Article::latest()->limit(5)->get()->load('user'));
    }

    /**
     * Display a listing of the resource.
     *
     * @param $section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index($user, $section)
    {
        $currentSection = $this->user->sections->find($section);
        if(!$currentSection) abort(404);
        $articles = $currentSection->articles;
        return view('layouts.list', compact('currentSection', 'articles'));
    }


    /**
     * Display the specified resource.
     *
     * @param $section
     * @param $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($user, $section, $article)
    {
        $article = $this->user->sections->find($section)->articles->find($article);
        $article->load('section');
        return view('layouts.item', compact('article'));
    }


    /**
     * Display all articles
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showFullArticleList()
    {
        $articles = $this->user->articles;
        return view('layouts.list', compact('articles'));
    }
}
