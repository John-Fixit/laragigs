<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{

    public $dept = "Software";
    //function controllers
    public function register(Request $req){
        //query buider
        $check = DB::table('users')->where('email', $req->email)->first();
        if(!$check){
            $hashedPassword = password_hash($req->password, PASSWORD_DEFAULT);
            $insert = DB::table('users')->insert([
                'name' => $req->name,
                'email' => $req->email,
                'password' => $hashedPassword,
                'created_at' => now()
            ]);

            if ($insert) {
                # code...
                return redirect("/login");
            }else{
                return view('home1')->with('message', 'Registration failed, please try again')->with('insert', false);
            }
        }
        else{
            return view('home1')->with('message', 'Email already registered')->with('insert', false);
        }


        // eloquent ORL
    }

    public function login(Request $req){
            $email = $req->email;
            $password = $req->password;
            $check = User::where("email", $email)->first();
            if($check){
                $verifyPassword = password_verify($password, $check->password);
                if($verifyPassword){
                    $req->session()->put('user', $check);
                    return redirect("/jobs")->with("details", $check)->with("status", true);
                }else{
                    return view("signin")->with("message", "The password entered is incorrect pls try again")->with("status", false);
                }
            }
    }

}