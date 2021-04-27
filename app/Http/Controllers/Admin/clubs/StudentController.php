<?php

namespace App\Http\Controllers\Admin\clubs;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;


class StudentController extends Controller {

	public function index() {

        $student = DB::table('student')
        ->leftJoin('class_student', 'student.std_id', '=', 'class_student.std_id')
        ->leftJoin('class', 'class_student.nccode', '=', 'class.nccode')
        ->leftJoin('course', 'class.courseid', '=', 'course.courseid')
        ->select('student.*','class_student.nccode','class.lastdate','class.courseid','course.coursename')
        ->where('class.lastdate','>',date('Y-m-d'))
        ->orderBy('student.updated_at','DESC')
        ->get();

        $course = DB::table('course')
       ->join('class','course.courseid', '=', 'class.courseid')
       ->where('class.lastdate', '>',date('Y-m-d'))
       ->select('course.courseid','course.coursename','class.nccode','class.startdate','class.lastdate')
       ->orderBy('class.created_at', 'desc')
       ->get();

        $club_type  = DB::table('club_room')
        ->join('club_subtitle', 'club_subtitle.id', '=', 'club_room.subtitle_id')
        ->join('club_type', 'club_type.id', '=', 'club_subtitle.type_id')
        ->select('club_room.*','club_type.title_type','club_subtitle.title')
        ->get();

        $data = [
			'student' => $student,
			'course' => $course,
            'club_type' => $club_type
		];

        // dd($data);
       
        return view('admin.clubs.student', compact('data'));
    }

    public function create($status=null)
	{

       $course = DB::table('course')
       ->join('class','course.courseid', '=', 'class.courseid')
       ->where('class.lastdate', '>',date('Y-m-d'))
       ->select('course.courseid','course.coursename','class.nccode','class.startdate','class.lastdate')
       ->orderBy('class.created_at', 'desc')
       ->get();

       return view('admin.clubs.student', compact('course'));
   }

    public function addstudent(Request $request){

       $student = DB::table('student')
       ->select('std_username')
       ->where('std_username', '=',$request->std_username)
       ->get();

       $row_student = count($student);

       if($row_student == 0){

        DB::table('student')->insert(
           ['std_username' => $request->std_username, 'std_password' => md5($request->std_password), 'std_name' => $request->std_name, 'std_nickname' => $request->std_nickname, 'std_point' => $request->std_point, 'std_bonus' => $request->std_bonus, 'std_mobile' => $request->std_mobile , 'std_pointsac' => $request->std_pointsac,'std_pointspeaking' => $request->std_pointspeaking]
       );

        $data = DB::table('student')
        ->select('*')
        ->where('std_username', '=',$request->std_username)
        ->limit(1)
        ->get();

        DB::table('class_student')->insert(
           ['std_id' => $data['0']->std_id, 'nccode' => $request->course]
        );

        return redirect('clubs/dashboard');
    }else{
        $status = 'er-01';
        
        session()->flash('add_ans','<div class="alert alert-success" role="alert">
        <i class="mdi mdi-check-all mr-2"></i><strong>Add Student Success</strong></div>'); 
        return redirect('clubs/student',compact('status'));
    }

        return redirect('clubs/dashboard');
    }


    public function edit($std_id)
	{

       $course = DB::table('course')
       ->join('class','course.courseid', '=', 'class.courseid')
       ->where('class.lastdate', '>',date('Y-m-d'))
       ->select('course.courseid','course.coursename','class.nccode','class.startdate','class.lastdate')
       ->get();

       $course_student = DB::table('class_student')
       ->where('std_id','=',$std_id)
       ->limit(1)
       ->select('*')
       ->get();

       $student = DB::table('student')
       ->select(DB::raw('*'))
       ->where('std_id','=',$std_id)
       ->get();

        //    dd($course);

       return view('admin.clubs.edit', compact('student','course','course_student') );
    }

    public function studentupdate($std_id, Request $request)
	{
        // dd($std_id);
		DB::table('student')
        ->where('std_id', $std_id)
        ->update(['std_username' => $request->std_username,'std_password' => md5($request->std_password),'std_mobile' => $request->std_mobile,'std_name' => $request->std_name,
           'std_nickname' => $request->std_nickname,'std_email' => $request->std_email
           ,'std_point'=> $request->std_point,
           'std_bonus' => $request->std_bonus,
           'crm_std_id' => $request->crm_std_id,
           'std_pointsac' => $request->std_pointsac,
           'std_pointspeaking' => $request->std_pointspeaking]);

        DB::table('class_student')
        ->where('std_id', $std_id)
        ->update(['nccode' => $request->course ]);

        session()->flash('edit_ans','<div class="alert alert-success" role="alert">
        <i class="mdi mdi-check-all mr-2"></i><strong>Update Success</strong></div>'); 

        return redirect('clubs/student');
    }

    

    public function studentdelete($std_id)
	{
		DB::transaction(function() use($std_id) {
        DB::table('class_student')->where('std_id', $std_id)->delete();
        DB::table('student')->where('std_id', '=',$std_id)->delete();
        });

        session()->flash('del_ans','<div class="alert alert-danger" role="alert">
        <i class="mdi mdi-check-all mr-2"></i><strong>Delete Success</strong></div>'); 

		return redirect('clubs/student');
	}
}
