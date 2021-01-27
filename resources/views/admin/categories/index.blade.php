@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-9">
            <div class="d-flex justify-content-between pb-3 px-3">
                <h1>My Category</h1>
                <button class="btn text-white btn-info" type="button" name="button">
                    Add new Category
                </button>
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
