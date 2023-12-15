<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Admin;
use App\User;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\ImportUser;
use App\Exports\ExportUser;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;
// use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function msg()
    {
       return view('bookings.message');
    }

    public function create()
    {
        return view('bookings.create');
    }

    public function store(Request $request)
    {
        //dd($request->all());
        $request->validate([
            'name' => 'required|regex:/^[\pL\s]+$/u|min:2',
            'email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix|unique:users',
            'phone'=>'required|digits:10|numeric',
            'dateslot'=>'required|date_format:Y-m-d',
            'timeslot'=>'required|date_format:H:i',
        
        ]);

        $user = new User();
        $user->name=  $request->input(['name']);
        $user->email=  $request->input(['email']);
        $user->phone=  $request->input(['phone']);
        $user->dateslot=  $request->input(['dateslot']);
        $user->timeslot=  $request->input(['timeslot']);
        $user->save();
        return redirect()->route('bookings.message')->withSuccess('Booking successful.');
    }


    public function show( Admin $admin,User $user,$id)
    {
        if(Session()->has('admin'))
        {$user=User::find($id);
        return view('bookings.show',compact('user'));}
        else{
            return redirect('/login');
        }
    }
    public function edit(Admin $admin,User $user,$id)
    {//dd('edit');
        if(Session()->has('admin'))
        {$user=User::find($id);
        return view('bookings.edit',compact('user'));}
        else{
            return redirect('/login');
        }
    }

    public function update(Request $request, User $user, $id)
    {//dd('dfjgjg');
        $request->validate([
            'name' => 'required||regex:/^[\pL\s]+$/u|min:2',
            'email' => 'required|email|regex:/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix',
            'phone'=>'required|digits:10|numeric',
            'dateslot'=>'required',
            'timeslot'=>'required',

        ]);

        $user =User::find($id);
        $user->name=  $request->input(['name']);
        $user->email=  $request->input(['email']);
        $user->phone=  $request->input(['phone']);
        $user->dateslot=  $request->input(['dateslot']);
        $user->timeslot=  $request->input(['timeslot']);
        $user->save();
        return redirect()->route('bookings.listing')->withSuccess('updating successful.');
    }

    public function destroy(Admin $admin,User $user,$id)
    {
        
        $user=User::find($id);
        $user->delete();

        return redirect()->route('bookings.listing')->withSuccess('Customer details deleted successfully.');

    }

    public function exportUsers(Request $request){
        return Excel::download(new ExportUser, 'users.xlsx');
    }



}
