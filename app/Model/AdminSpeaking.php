<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Auth;

/**
 * 
 */
class AdminSpeaking extends Model
{
	
	// query speaking status = wait
	public static function total_speaking() {

		$total_speaking = DB::table('speaking')
		->select('speaking.*','users.username')
		->leftjoin('users','users.id','=','speaking.std_id')
		->where('speaking.status','=','sent')
		->orderBy('speaking.created_at','asc')
		->get();

		return ($total_speaking);

	}

	// query status = receive and auth = th_id
	public static function receive_speaking() {

		$receive_speaking = DB::table('speaking')
		->select('speaking.*','users.username')
		->leftjoin('users','users.id','=','speaking.std_id')
		->where([
			['speaking.status','=','pending'],
			['speaking.th_id','=', Auth::user('staff')->id]
		])
		->orderBy('speaking.created_at','desc')
		->get();

		return ($receive_speaking);
	}

	// update status and th_id
	public static function receive($id) {
	
		$receive = DB::table('speaking')
		->where('id','=',$id)
		->update(['status' => 'pending',
		'th_id' => Auth::user('staff')->id]);

		return ($receive);
	}

	public static function check($id){

		$speaking = DB::table('speaking')
		->select('speaking.*','users.username')
		->leftjoin('users','users.id','=','speaking.std_id')
		->where('speaking.id','=', $id)
		->get();


		if(strlen($speaking[0]->topic) == 7) {
			$path_img = str_replace(' ', '0', $speaking[0]->topic);
		} else {
			$path_img = str_replace(' ', '', $speaking[0]->topic);
		}

        $check = [
			'id' => $speaking[0]->id,
			'topic' => $speaking[0]->topic,
			'img' => $path_img,
			'path' => $speaking[0]->path,
			'username' => $speaking[0]->username,
			'id' => $speaking[0]->id,
			'score' => $speaking[0]->score,
			'fluency' => $speaking[0]->fluency_and_coherence,
			'lexical' => $speaking[0]->lexical_resource,
			'grammatical' => $speaking[0]->grammar_range_and_acc,
			'pronunciation' => $speaking[0]->pronunciation,
			'expected_score' => $speaking[0]->expected_score,
			'current_course' => $speaking[0]->current_course,
			'created_at' => $speaking[0]->created_at,
			'th_sent_date' => $speaking[0]->th_sent_date
		];

				
		return ($check);
	}

	public static function check_submit(Request $request){

		$check_submit = DB::table('speaking')
		->where('id','=', $request->input('id'))
		->update(['status' => 'success',
			'score' => $request->input('score'),
			'fluency_and_coherence' => $request->input('fluency'),
			'lexical_resource' => $request->input('lexical'),
			'grammar_range_and_acc' => $request->input('grammatical'),
			'pronunciation' => $request->input('pronunciation'),
			'th_id' => $request->input('id'),
			'th_sent_date' => date('Y-m-d H:i:s')]);

		return ($check_submit);
	}

	public static function completed_speaking() {

		$completed_speaking = DB::table('speaking')
		->select('speaking.*','student.std_name')
		->leftjoin('student','student.std_id','=','speaking.std_id')
		->where([
			['speaking.status','=','success'],
			['speaking.th_id','=', Auth::user()->id]
		])
		->get();

		return ($completed_speaking);
	}

	public static function getTeacherName($id) {

		$teacher = DB::table('users')
				->select('name')
				->where('id', $id)
				->first();

		if(!empty($teacher)) {
			return $teacher->name;
		} else {
			return '';
		}
	}

}