<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Post;
use App\Tag;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
                "tags" => Tag::all()
        ];
        return view("admin.tags.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        if(!$tag) {
           abort(404);
       }
        $data = [
            'tag' => $tag,
            
        ];
        return view("admin.tags.show", $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        if(!$tag) {
            abort(404);
        }
        $data = [
            'tag' => $tag,
        ];
        return view('admin.tags.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $form_data = $request->all();

        // dd($form_data);
        $slug = Str::slug($form_data['slug']);
        $slug_copy = $slug;
        $new_slug = Tag::where('slug', $slug)->first();
        $counter = 1;
        while($new_slug) {
            $slug = $slug_copy . '-' . $counter;
            $counter++;
            $new_slug = Tag::where('slug', $slug)->first();
        }
        $form_data['slug'] = $slug;
        $tag->update($form_data);

        return redirect()->route('admin.tags.index');
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
    }
}
