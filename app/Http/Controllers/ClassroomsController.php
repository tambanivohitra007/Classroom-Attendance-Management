<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Classroom;

class ClassroomsController extends Controller
{
    public function classrooms(){
        $classrooms = Classroom::all();
        return view('admin.classrooms.classrooms', ["classrooms" => $classrooms]);
    }

    public function addclassroom(Request $request){
        $request->validate([
            'classroom_name'=>'required|string',
            'capacity'=>'nullable|integer'
        ]);
        try{
            $new_classroom = new Classroom;
            $new_classroom->classroom_name = $request->classroom_name;
            $new_classroom->capacity = $request->capacity;
            $new_classroom->save();

        return redirect('/classrooms')->with('success', 'Classroom added successfully');
        } catch (\Exception $e){
            return redirect('/classrooms')->with('fail', 'Failed to add classroom'. $e->getMessage());
        }
    }

    public function updateclassroom(Request $request){
        $request->validate([
            'classroom_name'=>'required|string',
            'capacity'=>'nullable|integer'
        ]);
        try{
            $update_classroom = Classroom::where('classroom_id', $request->classroom_id)->update([
                'classroom_name' => $request->classroom_name,
                'capacity' => $request->capacity
            ]);

        return redirect('/classrooms')->with('success', 'Classroom updated successfully');
        } catch (\Exception $e){
            return redirect('/classrooms')->with('fail', 'Failed to update classroom'. $e->getMessage());
        }
    }

    public function deleteclassroom($classroom_id){
        try{
            Classroom::find($classroom_id)->delete();
            return redirect('/classrooms')->with('success', 'Classroom deleted successfully');
        } catch(\Exception $e) {
            return redirect('/classrooms')->with('fail', 'Failed to delete classroom'. $e->getMessage());
        }
    }
}
