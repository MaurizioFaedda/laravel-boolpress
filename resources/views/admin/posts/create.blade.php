@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="d-flex justify-content-between align-items-center">
                <h1>Create a new post</h1>
            </div>
            <form action="{{ route('admin.posts.store') }}" method="post">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="" maxlength="255" required>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" class="form-control" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-group" name="category_id">

                        <option class="text-secondary" value=""> ------Show all categories------</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{$category->name}}</option>
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
