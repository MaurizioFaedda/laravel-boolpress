@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-9">

                <h1>{{ $post->title }}</h1>
                @if($post->cover)
                   <img src="{{ asset('storage/' . $post->cover) }}" alt="{{ $post->title }}">
               @endif
                <p>{{ $post->content}}</p>
                <ul>
                    <li>
                        @if ($post->category)
                            Category: <a href="{{ route("categories.show", ['slug' => $post->category->slug])}}">
                                {{$post->category->name}}
                            </a>
                        @else
                            No category
                        @endif
                    </li>
                    <li>
                        Tag:
                        @forelse ($post->tags as $tag)
                        <a href="{{ route("tags.show", ['slug' => $tag->slug]) }}">{{$tag->name}}</a>{{ !$loop->last ? ',' : '' }}
                        @empty
                            -
                        @endforelse

                    </li>
                </ul>

            </div>
        </div>
    </div>
@endsection
