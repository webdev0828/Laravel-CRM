@extends('layouts.auth')

@section('content')

<div class="card">
    <div class="card-body text-center">
        <div class="mb-4">
            <i class="feather icon-user-plus auth-icon"></i>
        </div>
        <h3 class="mb-4">Sign up</h3>
        @include('common/flash-message')
        <form method="POST" action="{{ route('register') }}">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="name" class="form-control" placeholder="Username">
            </div>
            <div class="input-group mb-3">
                <input type="email" name="email" class="form-control" placeholder="Email">
            </div>
            <div class="input-group mb-4">
                <input type="password" name="password" class="form-control" placeholder="password">
            </div>
         
            <div class="form-group text-left">
                <div class="checkbox checkbox-fill d-inline">
                    <input type="checkbox" name="checkbox-fill-2" id="checkbox-fill-2">
                    
                </div>
            </div>
            <button type="submit" class="btn btn-primary shadow-2 mb-4">Sign up</button>
        </form>
        <p class="mb-0 text-muted">Allready have an account? <a href="{{route('login')}}"> Log in</a></p>
    </div>
</div>

@endsection
