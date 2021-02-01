@extends('layouts.dashboard')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">
                <div class="d-flex justify-content-between align-items-center">
                <h1>Create a new post</h1>
            </div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>

            @endif
            <form action="{{ route('admin.posts.store') }}" method="post">
                @csrf
                @method('POST')
                <div class="form-group">
                    <label>Title</label>
                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" maxlength="255" required>
                </div>
                <div class="form-group">
                    <label>Slug</label>
                    <input type="text" name="slug" class="form-control" value="{{ old('slug') }}" maxlength="255" required>
                </div>
                <div class="form-group">
                    <label>Content</label>
                    <textarea name="content" value="{{ old('content')}}" class="form-control" rows="10" required></textarea>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <select class="form-group" name="category_id">

                        <option class="text-secondary" value=""> ------Show all categories------</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }} {{ old('category_id') == $category->id ? 'selected=selected' : '' }}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <p>Tags</p>
                    @foreach ($tags as $tag)
                        <div class="form-check">
                            <input name="tags[]" class="form-check-input" type="checkbox" value="{{ $tag->id }} {{ in_array($tag->id, old('tags', [])) ? 'checked=checked' : '' }}">
                            <label class="form-check-label">
                                {{ $tag->name }}
                            </label>
                        </div>
                    @endforeach
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
