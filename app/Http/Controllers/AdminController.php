<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Doctor;
use App\Notifications\MyFirstNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    //

    public function addview()
    {


        if (Auth::id()) {


            if (Auth::user()->usertype == 1) {
                return view('admin.add_doctor');
            } else {
                return redirect()->back();
            }
        } else {
            return redirect('login');
        }
    }
    public function upload(Request $request)
    {

        $doctor = new doctor;

        $image = $request->file;

        $imagename = time() . '.' . $image->getClientoriginalExtension();
        $request->file->move('doctorimage', $imagename);
        $doctor->image = $imagename;

        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->room = $request->room;
        $doctor->speciality = $request->speciality;

        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Added Successfully');
    }

    public function showappointmnets()
    {

        if (Auth::id()) {


            if (Auth::user()->usertype == 1) {
                $data = appointment::all();
                return view('admin.showappointments', compact('data'));
            } else {
                return redirect() - back();
            }
        } else {
            return redirect('login');
        }
    }

    public function approved($id)
    {

        $data = appointment::find($id);

        $data->status = 'approved';
        $data->save();

        return redirect()->back();
    }
    public function delete($id)
    {
        $data = appointment::find($id);
        $data->status = 'Cancelled';
        $data->save();
        return redirect()->back();
    }

    public function showdoctor()
    {
        $data = doctor::all();
        return view('admin.showdoctor', compact('data'));
    }
    //specific id to delete
    public function deletedoctor($id)
    {
        $data = doctor::find($id);
        $data->delete();
        return redirect()->back();
    }

    public function updatedoctor($id)
    {
        $data = doctor::find($id);
        return view('admin.update_doctor', compact('data'));
    }

    //request is for requesting to playing with database data
    public function editdoctor(Request $request, $id)
    {

        $doctor = doctor::find($id);
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;

        $image = $request->file;

        if ($image) {
            $imagename = time() . '.' . $image->getClientoriginalExtension();
            $request->file->move('doctorimage', $imagename);
            $doctor->image = $imagename;
        }



        $doctor->save();

        return redirect()->back()->with('message', 'Doctor Details Updated Successfully');
    }

    public function emailview($id)
    {

        $data = appointment::find($id);
        return view('admin.emailview', compact('data'));
    }


    //for sending notification
    public function sendemail(Request $request, $id)
    {

        $data = appointment::find($id);

        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart
        ];

        Notification::send($data, new MyFirstNotification($details));

        return redirect()->back()->with('message', 'Email send is successful');
    }
}
