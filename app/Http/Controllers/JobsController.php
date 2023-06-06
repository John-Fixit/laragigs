<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class JobsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
            $jobs = Jobs::get();
            return view('dashboard', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("postJobs");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $user = $request->session()->get("user");
        $validator = Validator::make($request->all(), [
            // "job_title" => "required|max:50",
            "job_title" => "required",
            "job_description" => "required",
            "requirement"=>"required",
            "job_type" => "required",
            "location"=> "required",
            "link"=>"required|url",
        ]);

        if($validator->fails()){
            return view('postJobs')->with("errors", $validator->errors());
        }
        else{
            $job = new Jobs();
            $job->job_title = $request->job_title;
            $job->job_desc = $request->job_description;
            $job->job_requirements = $request->requirement;
            $job->job_type = $request->job_type;
            $job->job_location = $request->location;
            $job->job_link = $request->link;
            $job->users_id = $user->id;
           
            $save = $job->save();
            if($save){
                return view("postJobs")->with("message", "Job listing created")->with("save", true);
            }
            else{
                return view("postJobs")->with("message", "Error occurred in posting job")->with("save", false);
            }
        }

    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $job_detail = Jobs::where("id", $id)->first();
        if($job_detail){
            return view("showJob")->with("job", $job_detail);
        }
        else{
            return "Page not found";
        }

    }


    public function showUserJobs(Request $request)
    {
        $user = $request->session()->get("user");
        $jobs = User::find($user->id)->jobs;
        if($jobs->count() == 0){
            return view('dashboard')->with('message', "You have not posted any job")->with("status", false)->with('me', true);
        }else{
            return view('dashboard')->with('jobs', $jobs)->with('me', true);
        }
    }

    public function logout(Request $request){
        $request->session()->forget("user");
        return redirect("/login");
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $job = Jobs::where('id', $id)->first();
        return view("editJob")->with("job", $job);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $validator = Validator::make($request->all(), [
            "job_title" => "required",
            "job_description" => "required",
            "requirement"=>"required",
            "job_type" => "required",
            "location"=> "required",
            "link"=>"required|url",
        ]);

        if($validator->fails()){
            return view('postJobs')->with("errors", $validator->errors());
        }
        else{
            $updatedCrd = [
                "job_title"=>$request->job_title,
                "job_desc"=> $request->job_description,
                "job_desc"=> $request->requirement,
                "job_type"=>$request->job_type,
                "job_location"=> $request->location,
                "job_link"=> $request->link
            ];
            $update = Jobs::find($id)->update($updatedCrd);
            if($update){
                return redirect("/jobs");
            }
            else{
                return view("editJob")->with("message", "Error occurred in posting job")->with("save", false);
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id, Request $request)
    {
        $job = Jobs::where('id', $id)->first();
        $jobs = Jobs::get();
        $user = $request->session()->get("user");
        if($job->users_id == $user->id){
            $delete = Jobs::where('id', $id)->delete();
            return $delete;
            if($delete){
                return view('dashboard')->with('message', "Job deleted successfully")->with('delete', true);
            }
            else{
                return view('dashboard')->with('message', "Error occurred Job not deleted")->with('delete', true);
            }
        }
        else{
            return view('dashboard')->with("message", "You cannot delete this job because it is not created by you")->with('delete', false)->with("jobs", $jobs);
        }
    }
}
