<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\User;

use App\Models\Courses;

use App\Models\Student;

use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function students(){
        $students = Student::all();
        return view('students', ["students"=>$students]);
    }
    public function addstudent(Request $request){
        $request->validate([
            'student_id'=>'required|integer',
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'nick_name'=>'nullable|string',
            'email'=>'nullable|string'
        ]);
        try{
            $new_student = new Student;
            $new_student->student_id = $request->student_id;
            $new_student->first_name = $request->first_name;
            $new_student->last_name = $request->last_name;
            $new_student->nick_name = $request->nick_name;
            $new_student->email = $request->email;
            $new_student->save();

        return redirect('/dashboard')->with('success', 'Student added successfully');
        } catch (\Exception $e){
            return redirect('/dashboard')->with('fail', 'Failed to add student'. $e->getMessage());
        }
    }

    public function updatestudent(Request $request){
        $request->validate([
            'student_id'=>'required|integer',
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'nick_name'=>'nullable|string',
            'email'=>'nullable|string'
        ]);
        try{
            $update_student = Student::where('student_id', $request->student_id)->update([
                'student_id' => $request->student_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'nick_name' => $request->nick_name,
                'email' => $request->email
            ]);

        return redirect('/dashboard')->with('success', 'Student updated successfully');
        } catch (\Exception $e){
            return redirect('/dashboard')->with('fail', 'Failed to update student'. $e->getMessage());
        }
    }
    public function deletestudent($student_id){
        try{
            Student::find($student_id)->delete();
            return redirect('/dashboard')->with('success', 'Student deleted successfully');
        } catch(\Exception $e) {
            return redirect('/dashboard')->with('fail', 'Failed to delete student'. $e->getMessage());
        }
    }
}
