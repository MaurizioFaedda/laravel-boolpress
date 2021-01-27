@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            <h3>Related posts with category <strong>{{$category->name}}</strong></h3>
            <table class="table text-center">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Title</th>
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
                            <td>
                                <a class="" href="{{ route('admin.posts.show', ['post' => $post->id]) }}">
                                    Show
                                </a>
                            </td>
                            <td>
                                <a class="btn btn-warning mr-3" href="{{ route('admin.posts.edit', ['post' => $post->id]) }}">
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
