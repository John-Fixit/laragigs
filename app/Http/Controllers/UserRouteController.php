<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserRouteController extends Controller
{

    // public function home()
    // {
    //     $user = "John Adeoye";
    //     $sch = "SQICT";
    //     $data = [
    //         'name'=> 'Adeoye John',
    //         'state'=> 'Oyo State Governor To Be'
    //     ];
    //     // return view('home', compact('user', "sch", 'data'));
    //     return view('home')->with('user', $user)->with('sch', $sch)->with('insert', false);
    // }

    public function login()
    {
       return view('signin');
    }
    

    public function signup(){
        return view('home1');
    }
}
