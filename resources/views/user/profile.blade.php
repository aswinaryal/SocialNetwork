@extends('layouts.app')
<style>
.profile-img{
    max-width:150px;
    border:5px solid #fff;
    border-radius:100%;
    box-shadow:0 2px 2px rgba(0,0,0,0.3);
}
</style>
@section('content')
    <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <div class="panel panel-default">
                <div class="panel-body text-center">
                    <img src="http://www.lovemarks.com/wp-content/uploads/profile-avatars/default-avatar-knives-ninja.png" class="image-responsive profile-img">
                    <h1>{{ $user->username }}</h1>
                    <h5>Email: {{ $user->email }}</h5>
                    <h5>Date Of Birth: {{ $user->dob->format('l j F Y') }}&nbsp({{ $user->dob->age }} years old)</h5>
                    <button class="btn btn-success">Follow</button>
                </div>
            </div>
        </div>
    </div>
@endsection
