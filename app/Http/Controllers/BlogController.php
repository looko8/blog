<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use App\User;

class BlogController extends Controller
{
    private $user;
    private $section;
    private $userSections;

    public function __construct(Request $request)
    {
        $this->user = User::find($request->user);
        $this->section = Section::find($request->section);
        $this->userSections = $this->user->sections;
    }

    /**
     * Display a listing of the resource.
     *
     * @param $user
     * @param $section
     * @return void
     */
    public function index($user, $section)
    {
        $articles = $this->section->articles;
        /*$articles = $this->user->with(['articles' => function($query) use($section) {
            $query->where('section_id', $section);
        }])->get()->pluck('articles');*/
        //dd(compact('articles'));
        return view('sections.list', compact('articles'));
    }


    /**
     * Display the specified resource.
     *
     * @param $user
     * @param $section
     * @param $article
     * @return void
     */
    public function show($user, $section, $article)
    {
        $article = $this->section->load(['articles' => function($query) use($article) {
            $query->where('id', $article);
        }]);
        dd($article);
    }


    public function showFullArticleList($user)
    {
        $articles = $this->user->articles;
        dd($articles);
    }
}
