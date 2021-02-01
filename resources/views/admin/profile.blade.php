@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 p-3">

            <h1 class="my-h1">Profile</h1>
            <dl>
                <dt>Nome</dt>
                <dd>{{ Auth::user()->name }}</dd>
                <dt>Email</dt>
                <dd>{{ Auth::user()->email }}</dd>
                <dt>API token</dt>
                @if (Auth::user()->api_token)
                    <dd>{{ Auth::user()->api_token }}</dd>
                @else
                    <form action="{{ route('admin.generate_token') }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-primary">
                            API token generator
                        </button>
                    </form>
                @endif

            </dl>
        </div>
    </div>
</div>
@endsection
