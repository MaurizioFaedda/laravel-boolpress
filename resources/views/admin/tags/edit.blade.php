@extends('layouts.dashboard')

@section('content')
    <div class="text-center">
        <form class="" action="{{ route('admin.tags.update', ['tag' => $tag->id]) }}" method="post">
            <div class="">
                <h2 class="my-h2">Edit Tag</h2>
            </div>
            @csrf
            @method('PUT')
            <div class="form-group ">
                <label>Name</label>
                <input type="text" name="name" class="form-control " value="{{ $tag->name }}" maxlength="255" required>
            </div>
            <div class="form-group">
                <label>Slug</label>
                <input name="slug" class="form-control" value="{{ $tag->slug }}" maxlength="255" required></input>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-success">
                    Save Category
                </button>
            </div>
        </form>
    </div>
@endsection
