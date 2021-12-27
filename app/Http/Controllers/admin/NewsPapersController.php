<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Article;
use App\Models\Newspaper;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;
use Vedmant\FeedReader\Facades\FeedReader;

class NewsPapersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admin = Auth::user();
        $newspapers = Newspaper::all();
       return view('admin.newspapers.shownewspapers' , compact('admin','newspapers'));
    }


    public function create()
    {

        $admin = Auth::user();
        $tags = Tag::select('id', 'name')->get();
        return view('admin.newspapers.addnewspapers',compact('admin','tags'));
    }


    public function store(Request $request)
    {   $request->validate([
        'logo' => 'required',
        'link' => 'required',
        'title' => 'required',

    ]);

        $file = $request->file('logo');
        $extenstion = $file->getClientOriginalExtension();
        $filename = time().'.'.$extenstion;
        $file->move('uploads/media/', $filename);

        Newspaper::create(
            [
                'link' => $request->link ,
                'title' => $request->title ,
                'logo' => $filename ,

            ]);
            $Newspaper = Newspaper::where('title',$request->title)->first();
         //   $artical = Newspaper::find($Newspaper_id);
            $Newspaper->Tag()->attach($request->servicesIds);
            return redirect()->back()->with('msg','newspaper added successfully');
    }



    public function show($id)
    {

    }


    public function edit($id)
    {
        $admin = Auth::user();
        $Newspaper = Newspaper::find($id);
        $tags = Tag::select('id', 'name')->get();
        return view('admin.newspapers.editNewspapers', compact('admin','Newspaper','tags'));
    }


    public function update(Request $request, $id)
    {
        $request->validate([
            'logo' => 'required',
            'link' => 'required',
            'title' => 'required',

        ]);
        $Newspaper = Newspaper::find($id);
        if($request->file('logo'))
        {
            $file = $request->file('logo');
            $extenstion = $file->getClientOriginalExtension();
            $filename = time().'.'.$extenstion;
            $file->move('uploads/media/', $filename);
            $Newspaper->logo = $filename;
        }
        $Newspaper->title = $request->title;
        $Newspaper->link = $request->link;
        $Newspaper->save();
        $Newspaper->tag()->syncWithoutDetaching($request->servicesIds);

        return redirect()->route('newspapers.index')->with('msgedit','the newspaper edited successfully');

    }



    public function destroy($id)
    {
        Newspaper::find($id)->delete();
        return redirect()->back()->with('msg','the newspaper deleted');
    }


    public function readrss($id)
    {

        /** @var \SimplePie $f */
        $f = FeedReader::read(config('epops.rssNews'));

        foreach ($f->get_items(0, $f->get_item_quantity()) as $item) {
            $i['id'] = $item->get_id();
            $i['date'] = $item->get_date();
            $i['title'] = $item->get_title();
            $i['link'] = $item->get_link();
            //           $i['media'] = $item->get_media();
            $i['author'] = $item->get_author();
            $i['date'] = $item->get_date();
            $i['updated_date'] = $item->get_updated_date();
            $i['description'] = $item->get_description();
            $result['items'][] = $i;
        }



        foreach ($result['items'] as $item)
        {
            $articles = Article::create([
                'title' => $item['title'] ,
                'author' => 'author1',
                'link' => $item['link'],
                'media' => null,
                'publish_date' => $item['date'],
                'updated_date' => $item['updated_date'],
                'conclusion' => $item['description'] ,
                'newspaper_id' => $id
            ]);
        }

        return \Response::json([
            'status' => 'true',
            'errNum' => '201' ,
            'message' => 'Articles Saved Successfully'
        ]);
    }





}
