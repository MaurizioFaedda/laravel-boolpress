@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="d-flex justify-content-between align-items-center">
                <h1>Edit post</h1>
            </div>
            <form action="{{ route('admin.posts.update', ['post' => $post->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $post->title }}" maxlength="255" required>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" class="form-control" rows="10" required>{{ $post->content }}</textarea>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-group" name="category_id">

                        <option class="text-secondary" value=""> ------Show all categories------</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ $category->id == $post->category_id ? 'selected=selected' : '' }}>{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">
                        Save post
                    </button>
                </div>
            </form>
            </div>
        </div>
    </div>
@endsection
