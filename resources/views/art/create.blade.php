@extends('layouts.app')
@section('content')
    <div class="row w-50 mx-auto">
        <form action="/art/create" method="POST" enctype="multipart/form-data">
            @csrf
            <input type="text" name="image_name">
            <input type="file" name="image">
            <button type="submit">Submit</button>
        </form>
    </div>

@endsection