@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 pt-2 pb-4">
            <h1 class="my-h1">Categories</h1>
        </div>
        <div class="col-3">
            <div class="new-category">
                <h2 class="my-h2">Add New Category</h2>
                <form action="{{ route('admin.categories.store') }}" method="post">
                    @csrf
                    @method('POST')
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="" maxlength="255" required>
                    </div>
                    <div class="form-group">
                        <label>Slug</label>
                        <input type="text" name="slug" class="form-control" value="" maxlength="255" required>


                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">
                            Save category
                        </button>
                    </div>
                </form>
            </div>
        </div>
        <div class="col-9">
            <div class="d-flex justify-content-between pb-3 px-3">
            </div>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
                        <th>Slug</th>
                        <th>Related posts</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>
                                <a class="" href="{{ route('admin.categories.show', ['category' => $category->id]) }}">
                                    Show
                                </a>
                            </td>
                            <td class="td-edit">
                                <a class="btn btn-warning" href="{{ route('admin.categories.edit', ['category' => $category->id]) }}">
                                    Edit
                                </a>
                                {{-- <div class="form-overlay text-center">
                                    <form class="" action="{{ route('admin.categories.update', ['category' => $category->id]) }}" method="post">
                                        <div class="d-flex justify-content-between w-100 px-4 pt-4">
                                            <h2 class="my-h2">Edit Category</h2>

                                            <div class="btn-edit"><i class="fas fa-times fa-2x"></i></div>
                                        </div>
                                        @csrf
                                        @method('PUT')
                                        <div class="form-group ">
                                            <label>Name</label>
                                            <input type="text" name="name" class="form-control " value="{{ $category->name }}" maxlength="255" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Slug</label>
                                            <input name="content" class="form-control" value="{{ $category->slug }}" maxlength="255" required></input>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">
                                                Save Category
                                            </button>
                                        </div>
                                    </form>
                                </div> --}}
                            </td>
                            <td>
                                <form class="" action="{{ route('admin.categories.destroy', ['category' =>$category->id])}}"  method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" name="button">
                                    Delete
                                </button>

                            </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
