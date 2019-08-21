<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class adminController extends Controller
{
    




     public function index(Request $request){
    	if($request->session()->get('type') == 'admin'){

/*$facultyCourseList	= DB::table('t_course_faculty')->where('c_faculty_faculty', $request->session()->get('username'))
->get();

$facultySemList	= DB::table('t_semester')->get();
*/
//echo $facultyList;


		return view('page.portal.admin.portal'/*,  ['facultyCourseList' => $facultyCourseList],['facultySemList' => $facultySemList]*/);
		}
	else{
		$request->session()->flash('msg', "UNAUTHORIZED");
            return redirect()->route('login.index');
        }
	}






}
