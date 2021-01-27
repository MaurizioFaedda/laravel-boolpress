@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 pt-2 pb-4">
            <h1 class="my-h1">Categories</h1>
        </div>
        <div class="col-4">
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
        <div class="col-8">
            <div class="d-flex justify-content-between pb-3 px-3">
            </div>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Category</th>
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
                            <td>
                                <a class="" href="{{ route('admin.categories.show', ['category' => $category->id]) }}">
                                    Show
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <form class="" action=""  method="post">
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
