@extends('layouts.dashboard')

@section('content')
<div class="container p-2">
    <div class="row justify-content-center">
        <div class="col-12">
            <h3>Related posts with tag <strong>{{$tag->name}}</strong></h3>
            <ul>
                @forelse ($tag->posts as $post)

                        <li>
                        <a href="{{ route('admin.posts.show', ['post' => $post->id])}}">
                            {{ $post->title }}

                        </a>

                        </li>
                @empty
                    No Related Post with this Tag
                @endforelse

            </ul>
        </div>
    </div>
</div>
@endsection
