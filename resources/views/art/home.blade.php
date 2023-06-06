@extends('layouts.app')

@section('content')
    <div class="row w-50 mx-auto shadow" >
        @foreach ($arts as $art)
        <div class="card row">
            <div class="col-6">{{$art->art_name}}</div>
            <div class="col-6">
                <img src="{{ asset('arts') . "/" . $art->art_picture }}" alt="" @class(['p-4', 'font-bold' => true, 'w-50'])>
            </div>
        </div>
        @endforeach
    </div>
@endsection