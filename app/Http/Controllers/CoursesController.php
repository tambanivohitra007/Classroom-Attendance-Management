<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Course;

use App\Models\Semester;

use Illuminate\Support\Facades\DB;

class CoursesController extends Controller
{
    public function courses() {
        $courses = Course::all();
        $semesters = Semester::all();
        return view('admin.courses.courses', ["courses" => $courses, "semesters" => $semesters]);
    }


    public function addcourse(Request $request){
        $request->validate([
            'course_name'=>'required|string',
            'course_code'=>'required|string|unique:courses,course_code',
            'semester_id' => 'required|exists:semesters,semester_id',
            'credit'=>'nullable|integer'
        ]);
        try{
            $new_course = new Course;
            $new_course->course_name = $request->course_name;
            $new_course->course_code = $request->course_code;
            $new_course->semester_id = $request->semester_id;
            $new_course->credit = $request->credit;
            $new_course->save();

        return redirect('/courses')->with('success', 'Course added successfully');
        } catch (\Exception $e){
            return redirect('/courses')->with('fail', 'Failed to add course'. $e->getMessage());
        }
    }

    public function updatecourse(Request $request, $course_id){
        $course = Course::findOrFail($course_id);
        $request->validate([
            'course_name'=>'required|string',
            'course_code' => 'required|string|unique:courses,course_code,' . $course_id . ',course_id',
            'semester_id' => 'required|exists:semesters,semester_id',
            'credit'=>'nullable|integer'
        ]);
        try{
            $update_course = Course::where('course_id', $request->course_id)->update([
                'course_name' => $request->course_name,
                'course_code' => $request->course_code,
                'semester_id' => $request->semester_id,
                'credit' => $request->credit
            ]);

        return redirect('/courses')->with('success', 'Course updated successfully');
        } catch (\Exception $e){
            return redirect('/courses')->with('fail', 'Failed to update course'. $e->getMessage());
        }
    }

    public function deletecourse($course_id){
        try{
            Course::find($course_id)->delete();
            return redirect('/courses')->with('success', 'Course deleted successfully');
        } catch(\Exception $e) {
            return redirect('/courses')->with('fail', 'Failed to delete course'. $e->getMessage());
        }
    }
}
