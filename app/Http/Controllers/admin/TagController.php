<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Newspaper;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{

    public function index()
    {
        $admin = Auth::user();
        $tags = Tag::get();

       return view('admin.tags.showtags', compact('admin','tags'));
    }


    public function create()
    {
        $admin = Auth::user();
    //   $newspapers = Newspaper::select('id', 'title')->get();

        return view('admin.tags.addtag', compact('admin'));
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Tag::create(
            [
                'name' => $request->name ,

            ]);
//            $Tag_id = Tag::where('name',$request->name)->first()->id;
//            $Tag = Tag::find($Tag_id);
//            $Tag->newspaper()->attach($request->servicesIds);

            return redirect()->back()->with('msg','Tag added successfully');
    }

    public function show($id)
    {

    }


    public function edit($id)
    {
        $admin = Auth::user();
        $tag = Tag::find($id);
        $newspapers = Newspaper::select('id', 'title')->get();
        return view('admin.tags.editTag', compact('admin','tag','newspapers'));
      }


    public function update(Request $request, $id)
    {

        $tag = Tag::find($id);
        if ($request->name) {
            $request->validate([ 'name' => 'required',]);
         $tag->name = $request->name;
        $tag->save();
        $tag->newspaper()->syncWithoutDetaching($request->servicesIds);

        }

        // edit tag to catigory

        if ($tag->is_category=='true') {

            $tag->is_category = 'false';
        }
        else{
            $tag->is_category = 'true';
        }
        $tag->save();


        return redirect()->route('tags.index')->with('msgedit','the Tag edited successfully');

    }


    public function destroy($id)
    {
        Tag::find($id)->delete();
        return redirect()->back()->with('msg','the Tag deleted');
    }
}
