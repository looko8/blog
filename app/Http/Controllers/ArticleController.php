<?php

namespace App\Http\Controllers;

use App\Article;
use Illuminate\Http\Request;
use App\Section;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class ArticleController extends Controller
{

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if($request->article->user_id !== Auth::id()) {
                abort(404);
            }
            return $next($request);
        })->only('edit', 'update', 'destroy');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function create()
    {
        $sections = Auth::user()->sections;
        return count($sections) > 0 ? view('articles.create', ['sections' => $sections]) : redirect()->route('sections.create')->with('userHasNoSections', 'You have no sections to create an article. Please create a section.');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validator($request);

        $imagePath = $request->file('image')->store('articles', 'public');
        Article::create([
            'user_id' => Auth::id(),
            'section_id' => $request->section_id,
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath
        ]);
        return redirect()->route('home')->with('message', 'Article created successful');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Article $article)
    {
        $sections = Auth::user()->sections;
        return view('articles.edit', compact('article', 'sections'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Article  $article
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Article $article)
    {
        $this->validator($request);

        $article->section_id = $request->section_id;
        $article->title = $request->title;
        $article->description = $request->description;

        if($request->hasFile('image')) {
            Storage::disk('public')->delete($article->image_path);
            $imagePath = $request->file('image')->store('articles', 'public');
            $article->image_path = $imagePath;
        }
        $article->save();

        return redirect('home');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        $article->delete();
        return redirect('home')->with("message", "Article    \"{$article->title}\" deleted successful");
    }

    private function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'section_id' => 'required|integer',
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048'
        ])->validate();
    }
}
