@extends('nav')
@section('content')
    <div class="card border-0 rounded-0 shadow-sm col-md-10 px-2 py-1 mt-3 mx-auto rounded ">
        <div class="d-flex">
            <p class="fs-4">{{$job->job_title}}</p>
        </div>
        @isset($job)
        <div class="card-body">
            <div class="my-1">
                <b>Posted On:</b>
                {{$job->created_at}}
            </div>
            <div class="my-1">
                <b>Job Location:</b>
                {{$job->job_location}}
            </div>
            <div class="my-1">
                <b>Job Description:</b>
                <div class="mx-3">
                    <b>Description</b><br>
                    {{$job->job_desc}}
                </div>
            </div>
            <div class="my-1">
                <b>Job Requirement:</b>
                <div >
                    {{$job->job_requirements}}
                </div>
            </div>
            <div class="my-1">
                <b>Job Type:</b>
                {{$job->job_type}}
            </div>
            <a href="{{$job->job_link}}" class="btn btn-dark rounded-0 my-2">Apply Here</a>
        </div>
        @if (session()->has("user") && session()->get("user")->id == $job->users_id)
        <div class="card-footer btn-group">
            <form method="GET">
                <a href="/jobs/{{$job->id}}/edit" class="btn btn-danger" type="submit">Edit</a>
            </form>
            <form action="/jobs/{{$job->id}}" method="POST">
                @csrf
                @method('DELETE')
                <a class="btn btn-danger btn-md px-1" type="submit">
                    delete
            </a>
            </form>
        </div>
        @endif
        
    </div>
@endsection
@endif