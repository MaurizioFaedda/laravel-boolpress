<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Category;
use App\Post;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            "categories" => Category::all()
        ];
        return view('admin.categories.index', $data);
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
        $new_form = $request ->all();
        $new_category = new Category();
        $new_category ->fill($new_form);

        $slug = Str::slug($new_category->slug);
        $slug_basic = $slug;
        $new_slug = Category::where('slug', $slug)->first();
        $counter = 1;
        while($new_slug){
           $slug = $slug_basic . '-' . $counter;
           $counter++;
           $new_slug = Category::where('slug', $slug)->first();
        }
        $new_category->slug = $slug;
        $new_category->save();
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        if(!$category) {
            abort(404);
        }
        $post = Post::where('category_id', $category->id)->get();
        $data = [
            'category' => $category,
            'posts' => $post
        ];
        // dd($post);
        // dd($category->id);
        return view('admin.categories.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        if(!$category) {
            abort(404);
        }
        $data = [
            'category' => $category,
        ];
        return view('admin.categories.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $form_data = $request->all();

        // dd($form_data);
        $slug = Str::slug($form_data['slug']);
        $slug_copy = $slug;
        $new_slug = Category::where('slug', $slug)->first();
        $counter = 1;
        while($new_slug) {
            $slug = $slug_copy . '-' . $counter;
            $counter++;
            $new_slug = Post::where('slug', $slug)->first();
        }
        $form_data['slug'] = $slug;
        $category->update($form_data);

        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('admin.categories.index');
    }
}
