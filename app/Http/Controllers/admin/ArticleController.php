<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Models\Article;
use App\Models\Newspaper;
use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    //show articles
    public function index()
    {
        $admin = Auth::user();
        $articles = Article::get();

        return view('admin.articles.showarticle', compact('admin','articles'));
    }


    public function create()
    {
        $admin = Auth::user();
        $tags = Tag::select('id', 'name')->get();
        $newspapers = Newspaper::select('id', 'title')->get();
        return view('admin.articles.addarticle', compact('admin', 'tags','newspapers'));
    }


    public function store(Request $request)
    {  $request->validate([
        'author' => 'required',
        'conclusion' => 'required',
        'title' => 'required',
        'newspaper'=>'required',
        'servicesIds'=>'required',
        'media'=>'required'

    ]);
        $file = $request->file('media');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'.$extenstion;
        $file->move('uploads/media/', $filename);

     //$filename =null;
        Article::create(
            [
                'author' => $request->author ,
                'conclusion' => $request->conclusion ,
                'link' => $request->link ,
                'media' => $filename ,
                'title' => $request->title ,
                'publish_date'=>Carbon::now(),
                'newspaper_id'=>$request->newspaper

            ]);
            $artical = Article::where('title',$request->title)->first();
            $artical->Tag()->attach($request->servicesIds);

            return redirect()->back()->with('msg','atrical added successfully');

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $admin = Auth::user();
        $article = Article::find($id);
        $tags = Tag::select('id', 'name')->get();
        return view('admin.articles.editArticle', compact('admin','article','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    { $request->validate([
        'author' => 'required',
        'conclusion' => 'required',
        'title' => 'required',
        'newspaper'=>'required',
        'servicesIds'=>'required'
    ]);
        $article = Article::find($id);
        if($request->file('media'))
        {
            $file = $request->file('media');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/media/', $filename);
            $article->media = $filename;
        }
        $article->conclusion = $request->conclusion;
        $article->author = $request->author ;

        $article->title = $request->title;
        $article->conclusion = $request->conclusion;
        $article->link = $request->link;
        $article->save();
        $article->tag()->syncWithoutDetaching($request->servicesIds);
        return redirect()->route('articles.index')->with('msgedit','the article edited successfully');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Article::find($id)->delete();
        return redirect()->back()->with('msg','the article deleted');
    }
}
