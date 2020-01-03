<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\User;
use File;
use DB;
use App\Http\Requests;
use Session;
use Illuminate\Support\Facades\Redirect;
use App\Student;
session_start();

class StudentController extends Controller
{
    public function add_student()
    {
    	return view('student.addstudent');
    }




    public function save_student(Request $request)
    {

        $validatedData = $request->validate([
        'name' => 'required|max:20|min:4',
        'email' => 'required|unique:students|max:30|min:9',
        'phone' => 'required|unique:students',
        ]);


        $student = new Student;

         $student->name = $request->name;
         $student->email = $request->email;
         $student->phone = $request->phone;
         $student->save();

         //return response()->json($student);

        Session::put('messege','Data are Succesully Inserted');
        return Redirect::to('/addstudent');
    }

    public function all_student()
    {

    	$student = Student::all();
    	return view('student.allstudent',compact('student'));
    }


     public function view_student($id)
    {
       $student = Student::findorfail($id);
       return view('student.singlestudent',compact('student'));
    }



     public function delete_student($id)
    {
    	$student = Student::findorfail($id);
    	$student->delete();
        return Redirect::to('/addstudent');
                
    }



     public function edit_student($id)
    {
        $student = Student::findorfail($id);
       return view('student.editstudent',compact('student'));
       
    }




     public function update_student(Request $request, $id)
    {
        $student =Student::findorfail($id);
        $student->name=$request->name;
        $student->email=$request->email;
        $student->phone=$request->phone;
        $student->save();
        $notification=array(
                'messege'=>'Succcessfully Updated',
                'alert-type'=>'info'
                 );
               return Redirect()->to('/allstudent')->with($notification);
    }




}
