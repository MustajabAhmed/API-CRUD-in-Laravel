<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Test\Constraint\ResponseCookieValueSame;

class StudentController extends Controller
{
    function store(Request $request)
    {
        $request->validate(([
            'name' => 'required|min:3|max:191',
            'course' => 'required|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|min:10|max:10'
        ]));

        $student = new Student();
        $student->name = $request->get('name');
        $student->course = $request->get('course');
        $student->email = $request->get('email');
        $student->phone = $request->get('phone');
        $result = $student->save();
        if ($result) {
            return response()->json([
                'status' => '200',
                'student' => "Data Saved Sucessfully..."
            ]);
        } else {
            return response()->json([
                'status' => '404',
                'student' => "error in saving data..."
            ]);
        }
    }

    // showing all data
    // function show()
    // {
    //     $student = Student::all();
    //     if ($student) {
    //         return  response()->json([
    //             'status' => '200',
    //             'student' => $student
    //         ]);
    //     } else {
    //         return response()->json([
    //             'status' => '404',
    //             'student' => "Data Not Found....."
    //         ]);
    //     }
    // }

    // Showing specific data
    function show($id)
    {
        $student = Student::find($id);
        // $student = Student::select('id', 'name', 'course', 'email', 'phone')->get();
        if ($student) {
            return  response()->json([
                'status' => '200',
                'student' => $student
            ]);
        } else {
            return response()->json([
                'status' => '404',
                'student' => "Data Not Found....."
            ]);
        }
    }

    function update(Request $request, $id)
    {
        $request->validate(([
            'name' => 'required|min:3|max:191',
            'course' => 'required|max:191',
            'email' => 'required|email|max:191',
            'phone' => 'required|min:10|max:10'
        ]));

        $student = Student::find($id);
        $student->name = $request->get('name');
        $student->course = $request->get('course');
        $student->email = $request->get('email');
        $student->phone = $request->get('phone');
        $result = $student->save();
        if ($result) {
            return response()->json([
                'status' => '200',
                'student' => "Data Updated Sucessfully..."
            ]);
        } else {
            return response()->json([
                'status' => '404',
                'student' => "error in updating data..."
            ]);
        }
    }

    function delete($id)
    {
        $student = Student::find($id);
        if ($student) {
            $student->delete();
            return  response()->json([
                'status' => '200',
                'student' => "Data Deleted Successfully....."
            ]);
        } else {
            return response()->json([
                'status' => '404',
                'student' => "Data Not Found....."
            ]);
        }
    }
}