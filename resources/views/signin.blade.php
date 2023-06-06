@extends('nav')
@section('content')
<div style="display: flex; justify-content: center; height: 90vh; align-items: center;">
    <div class="card col-sm-12 col-md-7 col-lg-5 mx-auto shadow">
        <h1 class="card-header text-cener">LOGIN HERE</h1>
        <form action="/loginFunc" method="POST" class="p-3">
            @csrf
            @isset($message)
                <p class="alert alert-{{$status?'success': "danger"}}">{{$message}}</p>
            @endisset
            <div class="form-group my-2">
                <label for="" >Email Address</label>
                <div class="form-floating my-2">
                    <input type="email" class="form-control" placeholder="Email" name="email">
                    <label for="">Email</label>
                </div>
            </div>
            <div class="form-group my-2">
                <label for="" >Password</label>
                <div class="form-floating my-2">
                    <input type="password" class="form-control" placeholder="Password" name="password">
                    <label for="">password</label>
                </div>
            </div>
            <div class="button-group text-end">
                <button type="submit" class="btn btn-lg btn-primary">Login</button>
            </div>
        </form>
    </div>
</div>
@endsection