@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <h1>Contatcs</h1>
            <form class="" action="{{ route('contacts.sent') }}" method="post">
                @csrf
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" placeholder="Enter your name" name="name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="email" placeholder="Enter your email" name="email" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Message</label>
                    <textarea name="message" placeholder="Enter your message" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success" value="Send" required>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
