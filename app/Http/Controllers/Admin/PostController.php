<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Post;
use App\Category;
use App\Tag;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data =[
            'posts' => Post::all(),
            'postCount' => count(Post::all())
        ];
        return view('admin.posts.index', $data);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   $data = [
            'categories' => Category::all(),
            'tags' => Tag::all()
        ];
        return view('admin.posts.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id'

        ]);
        $new_form = $request ->all();
        $new_post = new Post();
        if(array_key_exists('image', $new_form)){
            $cover_path = Storage::put('post_covers', $new_form['image']);
            $new_form['cover'] = $cover_path;
        }

        $new_post ->fill($new_form);

        $slug = Str::slug($new_post->title);
        $slug_basic = $slug;
        $new_slug = Post::where('slug', $slug)->first();
        $counter = 1;
        while($new_slug){
           $slug = $slug_basic . '-' . $counter;
           $counter++;
           $new_slug = Post::where('slug', $slug)->first();
        }
        $new_post->slug = $slug;
        $new_post->save();
        if(array_key_exists('tags', $new_form))
        {
            $new_post->tags()->sync($new_form['tags']);

        }
        return redirect()->route('admin.posts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {

        if(!$post) {
            abort(404);
        }
        return view('admin.posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        if(!$post) {
            abort(404);
        }
        $data = [
            'categories' => Category::all(),
            'post' => $post,
            'tags' => Tag::all()
        ];
        return view('admin.posts.edit', $data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|max:255',
            'slug' => 'required|max:255',
            'content' => 'required',
            'category_id' => 'nullable|exists:categories,id',
            'tags' => 'exists:tags,id'
        ]);
        $form_data = $request->all();
        $slug = Str::slug($form_data['slug']);
        $slug_copy = $slug;
        $new_slug = Post::where('slug', $slug)->first();
        $counter = 1;
        while($new_slug) {
            $slug = $slug_copy . '-' . $counter;
            $counter++;
            $new_slug = Post::where('slug', $slug)->first();
        }
        $form_data['slug'] = $slug;

        $post->update($form_data);
        if(array_key_exists('tags', $form_data))
        {
            $post->tags()->sync($form_data['tags']);
        }

        return redirect()->route('admin.posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->tags()->sync([]);
        $post->delete();
        return redirect()->route('admin.posts.index');
    }
}
