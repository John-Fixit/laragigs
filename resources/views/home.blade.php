@extends('layouts.app')

@section('content')
<div class="container">
    {{-- <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div> --}}
    <div class="card border-0 shadow p-2">
        <h3>Welcome to dashboard 
          @isset($details)
              <p>{{$details->name}}</p>
          @endisset
        </h3>
        <div class="mx-3 row">
          <a href="listing/me" class="btn btn-warning">Show my Jobs</a>
          @isset($jobs)
            @foreach ($jobs as $job)
              <div class="col-sm-3">
                <div class="card h-100 shadow rounded p-3 my-2" type="submit">
                  <div> 
                      <p>{{$job->job_desc}}</p>
                      <ol>
                        <li>{{$job->job_requirements}}</li>
                      </ol>
                    </div>
                    <b>Location: {{$job->job_location}}</b>
                    <a href="/jobs/{{$job->id}}">View More...</a>
                    <a href="/jobs/{{$job->id}}/edit" class="btn btn-danger ">Edit</a>
              </div>
              </div>
            @endforeach
          @endisset
        </div>
      </div>
</div>
@endsection
