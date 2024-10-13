<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Semester;

class SemestersController extends Controller
{
    public function semesters(){
        $semesters = Semester::all();
        return view('admin.semesters.semesters', ["semesters"=>$semesters]);
    }

    public function addsemester(Request $request){
        $request->validate([
            'semester_name'=>'required|string',
            'start_date'=>'nullable|date',
            'end_date'=>'nullable|date'
        ]);
        try{
            $new_semester = new Semester;
            $new_semester->semester_name = $request->semester_name;
            $new_semester->start_date = $request->start_date;
            $new_semester->end_date = $request->end_date;
            $new_semester->save();

        return redirect('/semesters')->with('success', 'Semester added successfully');
        } catch (\Exception $e){
            return redirect('/semester')->with('fail', 'Failed to add semester'. $e->getMessage());
        }
    }

    public function updatesemester(Request $request){
        $request->validate([
            'semester_name'=>'required|string',
            'start_date'=>'nullable|date',
            'end_date'=>'nullable|date'
        ]);
        try{
            $update_semester = Semester::where('semester_id', $request->semester_id)->update([
                'semester_name' => $request->semester_name,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date
            ]);

        return redirect('/semesters')->with('success', 'Semester updated successfully');
        } catch (\Exception $e){
            return redirect('/semesters')->with('fail', 'Failed to update semester'. $e->getMessage());
        }
    }

    public function deletesemester($semester_id){
        try{
            Semester::find($semester_id)->delete();
            return redirect('/semesters')->with('success', 'Semester deleted successfully');
        } catch(\Exception $e) {
            return redirect('/semesters')->with('fail', 'Failed to delete semester'. $e->getMessage());
        }
    }
}
