@extends('nav')
@section('content')
<div class="card col-sm-6 mx-auto">
    <h4 class="card-header">REGISTER HERE!</h4>
    <form action="/register" class="px-3 py-2" method="POST">
        @csrf
        <div class="" >
            @if (isset($message))
                    {{-- <div class="w-100"> --}}
                        <p class="alert form-control alert-{{$insert? "success is-valid": "danger is-invalid"}}">{{$message}}</p>
                    {{-- </div> --}}
            @endif
        </div>
        <div>
            <div class="form-group my-2">
                <label for="">Name</label>
                <input type="text" class="form-control" name="name">
            </div>
            <div class="form-group my-2">
                <label for="">Email</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group my-2">
                <label for="">Password</label>
                <input type="password" class="form-control" name="password">
            </div>
            <div class="form-group my-3">
                <button type="submit" class="btn btn-primary">Register</button>
            </div>
        </div>
    </form>
</div>
@endsection