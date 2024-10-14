<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Teacher;

class TeachersController extends Controller
{
    public function teachers(){
        $teachers = Teacher::all();
        return view('admin.teachers.teachers', ["teachers"=>$teachers]);
    }

    public function addteacher(Request $request){
        $request->validate([
            'teacher_id'=>'required|integer',
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'nullable|string',
            'faculty'=>'nullable|string'
        ]);
        try{
            $new_teacher = new Teacher;
            $new_teacher->teacher_id = $request->teacher_id;
            $new_teacher->first_name = $request->first_name;
            $new_teacher->last_name = $request->last_name;
            $new_teacher->email = $request->email;
            $new_teacher->faculty = $request->faculty;
            $new_teacher->save();

        return redirect('/teachers')->with('success', 'Teacher added successfully');
        } catch (\Exception $e){
            return redirect('/teachers')->with('fail', 'Failed to add teacher'. $e->getMessage());
        }
    }

    public function updateteacher(Request $request){
        $request->validate([
            'teacher_id'=>'required|integer',
            'first_name'=>'required|string',
            'last_name'=>'required|string',
            'email'=>'nullable|string',
            'faculty'=>'nullable|string'
        ]);
        try{
            $update_teacher = Teacher::where('teacher_id', $request->teacher_id)->update([
                'teacher_id' => $request->teacher_id,
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'email' => $request->email,
                'faculty' => $request->faculty
            ]);

        return redirect('/teachers')->with('success', 'Teacher updated successfully');
        } catch (\Exception $e){
            return redirect('/teachers')->with('fail', 'Failed to update teacher'. $e->getMessage());
        }
    }

    public function deleteteacher($teacher_id){
        try{
            Teacher::find($teacher_id)->delete();
            return redirect('/teachers')->with('success', 'Teacher deleted successfully');
        } catch(\Exception $e) {
            return redirect('/teachers')->with('fail', 'Failed to delete teacher'. $e->getMessage());
        }
    }
}
