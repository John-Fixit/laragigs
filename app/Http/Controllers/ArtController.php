<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ArtController extends Controller
{
    public function view()
    {
        $arts = DB::table('art')->get();
        return view('art.home', ["arts"=>$arts]);
    }

    public function show()
    {
        return view("art.create");
    }
    public function create(Request $request)
    {
        // giving it a new name
        $image_name = time().$request->image->getClientOriginalName();
        //uploading to our server
        $request->image->move(public_path('arts'), $image_name);
        $insert = DB::table('art')->insert([
            "art_name"=>$request->image_name, 
            "art_picture"=>$image_name,
            "created_At"=> now()
        ]);
        if($insert){
            return redirect('/art');
        }
        else{
            echo "Unsuccessful";
        }
    }
}
