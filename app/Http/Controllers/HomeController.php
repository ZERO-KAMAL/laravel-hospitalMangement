<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    //

    public function redirect()
    {
        if (Auth::id()) {
            if (Auth::user()->usertype == 0) {

                $doctor = doctor::all();
                return view('user.home', compact('doctor'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index()
    {

        // we can declear any variable

        //it will kepp still on the same page
        if (Auth::id()) {
            return redirect('home');
        } else {
            $doctor = doctor::all();

            return view('user.home', compact('doctor'));
        }
    }

    public function appointment(Request $request)
    {

        $data = new appointment();

        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;
        $data->date = $request->date;
        $data->message = $request->message;
        $data->doctor = $request->doctor;
        $data->status = 'In progress';

        if (Auth::id()) {
            $data->user_id = Auth::user()->id;
        }

        $data->save();

        return redirect()->back()->with('message', 'Appoint Request Successful . We Will Contact You Soon');
    }

    public function myappointment()
    {

        if (Auth::id()) {

            if (Auth::user()->usertype == 0) {
                $userid = Auth::user()->id;
                // if the user id in the table and user id matches the only it shows the data
                $appoint = appointment::where('user_id', $userid)->get();
                return view('user.my_appointment', compact('appoint'));
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }

    public function cancel_appoint($id)
    {


        $data = appointment::find($id);
        $data->delete();
        return redirect()->back();
    }
}
