@extends('layouts.dashboard')

@section('content')
    <section id="posts">
        <div class="container px-2 py-3">
            <div class="row justify-content-center">
                <div class="col-12">

                        <div class="my-top d-flex align-items-center  my-3 py-3">
                            <h1 class="my-h1">Posts</h1>
                            <a href="{{ route('admin.posts.create') }}" class="my-action ml-2 mb-1">
                                Add New
                            </a>
                        </div>
                        <div class="info-post">
                            <span>All ({{$postCount}})</span>
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
    </section>
@endsection
