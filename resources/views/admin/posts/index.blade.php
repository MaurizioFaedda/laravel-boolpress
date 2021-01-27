@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="d-flex justify-content-between pb-3 px-3 align-middle">
                <h1>All Posts</h1>
                <a href="{{ route('admin.posts.create') }}" class="btn text-white py-3 btn-info">
                    Add new Post
                </a>
            </div>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Show</th>
                        <th>Edit</th>
                        <th>Delete</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <td>{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->slug }}</td>
                            <td>
                                <a class="btn btn-primary" href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                                    Show
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">
                                    Edit
                                </a>
                            </td>
                            <td>
                                <form class="" action="{{ route('admin.posts.destroy', ['post' =>$post->id])}}"  method="post">
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
