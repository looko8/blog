<?php

namespace App\Http\Controllers;

use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;

class SectionController extends Controller
{
    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            if($request->section->user_id !== Auth::id()) {
                abort(404);
            }
            return $next($request);
        })->only('edit', 'update', 'destroy');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('sections.create');
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

        $imagePath = $request->hasFile('image') ? $request->file('image')->store('sections', 'public') : NULL;
        Section::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'image_path' => $imagePath
        ]);

        return redirect()->route('articles.create')->with('canCreateArticle', 'Now you can create an article!');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit(Section $section)
    {
        return view('sections.edit', compact('section'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Section  $section
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, Section $section)
    {
        $this->validator($request);

        $section->title = $request->title;
        $section->description = $request->description;

        if($request->hasFile('image')) {
            Storage::disk('public')->delete($section->image_path);
            $imagePath = $request->file('image')->store('sections', 'public');
            $section->image_path = $imagePath;
        }
        $section->save();

        return redirect('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Section  $section
     * @return \Illuminate\Http\Response
     */
    public function destroy(Section $section)
    {
        $section->articles()->delete();
        $section->delete();
        return redirect('home')->with("message", "Section \"{$section->title}\" deleted successful");
    }

    private function validator(Request $request)
    {
        return Validator::make($request->all(), [
            'title' => 'required',
            'description' => 'required',
            'image' => 'nullable|mimes:jpeg,png,jpg,gif|max:2048'
        ])->validate();
    }
}
