@extends('nav')
@section('content')
<div class="col-sm-10 mx-auto">
   
        @if (isset($status))
          <h2>{{$message}}</h2>
        @else
        <div class="card border-0 shadow p-2">
          @if (session()->has("user"))
          <h3>Welcome to dashboard </h3>
          @endif
            @isset($details)
                <p>{{$details->name}}</p>
            @endisset
          </h3>
          <div class="mx-3 row">
            @if (session()->has("user") && !isset($me))
            <div class="ms-auto justify-content-end">
              <a href="listing/me" class="btn btn-light shadow fw-bold px-2 btn-md">Show my jobs</a>
            </div>
            @endif
            @if (isset($message))
                <div class="alert alert-{{$delete?'success': 'danger'}} w-100 py-2">{{$message}}</div>
            @endif
            @isset($jobs)
              @foreach ($jobs as $job)
                <div class="col-sm-9 mx-aut my-2">
                  <div class="card h-100 shadow rounded p-3 my-2">
                    <div class="card-title">
                      <p><b>Sponsored </b> </p>
                      <a href="{{$job->job_link}}" class="text-decoration-none text-dark">{{$job->job_link}}</a>
                    </div>
                    <h4 class=""><a href="#">{{$job->job_title}}</a></h4>
                    <p class="my-1">{{$job->job_desc}}</p>
                    <div>
                      <b>Requirements</b>
                        <ol>
                          <li>{{$job->job_requirements}}</li>
                        </ol>
                        <b>Location: </b><p>{{$job->job_location}}</p>
                      </div>
                      <a href="/jobs/{{$job->id}}" class="text-decoration-none">View More...</a>
                      </div>
                </div>
              @endforeach
            @endisset
          </div>
        </div>
        @endif
  </div>
@endsection