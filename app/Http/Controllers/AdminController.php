<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;

class AdminController extends Controller
{

    public function index()
    {
        //dd('list');
        if(Session()->has('admin')){
        $users = User::all();

        return view('bookings.listing',compact('users'))->with('i',(request()->input('page',1) - 1) * 5);}
        else{
            return redirect('/login');
        }
    }
    public function login(){
        return view('admin.login');
    }

    public function credentials(Request $request)
    {
        $admin= Admin::where([
        'email'=>$request->email,
        'password'=>$request->password,
        ])->first();
        if(!$admin)
        {
            return "Username or password is not matched";
        }
        else{
            $request->session()->put('admin',$admin);
            return redirect('/');
        }
    }

    public function dashboard()
    {
        //dd('list');
        if(Session()->has('admin')){

        return view('admin.dashboard');
    }
        else{
            return redirect('/login');
        }
    }
        
    }

