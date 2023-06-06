
    @extends("nav")
  @section('content')
    <div class="col-sm-6 shadow mx-auto p-2 rounded" style="height: 80vh;">
        <h3 class="card-header">Create New Job</h3>
        <form action="/jobs" method="POST">
            @csrf
            @if (isset($message))
                <p class="alert text-center form-control alert-{{$save? 'success is-valid': 'danger is-invalid'}}">{{$message}}</p>
            @endif
            <div class="form-group my-2">
                <label for="">Job Name</label>
                <input type="text" class="form-control" name="job_title">
                    @if ($errors->get("job_title") !==null)
                        <p class="text-sm text-danger">{{$errors->first("job_title")}}</p>
                    @endif
            </div>
            <div class="form-group my-2">
                <label for="">Job Description</label>
                <textarea rows="5" cols="10" type="text" class="form-control" name="job_description"></textarea>
                @if ($errors->get("job_description") !==null)
                     <p class="text-sm text-danger">{{$errors->first("job_description")}}</p>
                 @endif
            </div>
            <div class="form-group my-2">
                <label for="">Requirements</label>
                <input type="text" class="form-control" name="requirement">
                @if ($errors->get("requirement") !==null)
                    <p class="text-sm text-danger">{{$errors->first("requirement")}}</p>
                 @endif
            </div>
            <div class="form-group my-2">
                <label for="">Job Type</label>
                <input type="text" class="form-control" name="job_type">
                @if ($errors->get("job_type") !==null)
                <p class="text-sm text-danger">{{$errors->first("job_type")}}</p>
            @endif
            </div>
            <div class="form-group my-2">
                <label for="">Job Location</label>
                <input type="text" class="form-control" name="location">
                @if ($errors->get("location") !==null)
                <p class="text-sm text-danger">{{$errors->first("location")}}</p>
            @endif
            </div>
            <div class="form-group my-2">
                <label for="">Link</label>
                <input type="url" class="form-control" name="link">
                @if ($errors->get("link") !==null)
                        <p class="text-sm text-danger">{{$errors->first("link")}}</p>
                    @endif
            </div>
            <div class="btn-group w-100">
                <button class="btn btn-success" type="submit">Post Job</button>
            </div>
        </form>
    </div>
  @endsection