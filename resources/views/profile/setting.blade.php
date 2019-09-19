@extends('layouts.auth')

@section('content')

<div class="card">
    <div class="card-body text-center">
        <h5 class="mb-4">Einstellungen</h5>
        <img src="{{asset('images/user/avatar-3.jpg')}}" class="img-radius mb-4" alt="User-Profile-Image">

        <form method="POST" action="{{ route('setting') }}">
            @csrf
            <div class="input-group mb-3">
                <input type="text" name="name" value="{{Auth::user()->name}}" class="form-control" placeholder="Name">
            </div>

            <div class="input-group mb-3">
                <input type="text" name="username" value="{{Auth::user()->username}}" class="form-control" placeholder="Nutzername">
            </div>
            <div class="input-group mb-3">
                <input type="email" name="email" value="{{Auth::user()->email}}" class="form-control" placeholder="E-Mail">
            </div>
            <div class="input-group mb-3">
                <input type="text" name="phone" value="{{Auth::user()->phone}}" class="form-control" placeholder="Handynummer">
            </div>
            <div class="mb-4 text-left">
                <div class="form-group d-inline">
                    <div class="radio d-inline">
                        <input type="radio" name="status" value="1" id="radio-in-1" <?php echo Auth::user()->status==1?"checked":""; ?>>
                        <label for="radio-in-1" class="cr">Examiniert</label>
                    </div>
                </div>
                <div class="form-group d-inline">
                    <div class="radio d-inline">
                        <input type="radio" name="status" value="0" id="radio-in-2" <?php echo Auth::user()->status==0?"checked":""; ?>>
                        <label for="radio-in-2" class="cr">Nicht examiniert</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary shadow-2 mb-4">Speichern</button>

        </form>

        <p class="mb-0 text-muted">Brauchst du Hilfe? <a href="{{route('register')}}">Kontakt</a></p>
    </div>
</div>
@endsection
