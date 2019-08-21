<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class adminController extends Controller
{
    


//index starts


     public function index(Request $request){
    	if($request->session()->get('type') == 'admin'){

$totalUserList	= DB::table('t_users')->get();

/*$facultySemList	= DB::table('t_semester')->get();*/

//echo $totalUserList;


		return view('page.portal.admin.portal',  ['totalUserList' => $totalUserList]/*,['facultySemList' => $facultySemList]*/);
		}
	else{
		$request->session()->flash('msg', "UNAUTHORIZED");
            return redirect()->route('login.index');
        }
	}
	//index ends



	//removeUser starts

public function removeUser($u_id,Request $request){
    	if($request->session()->get('type') == 'admin'){

$facultySlideList	= DB::table('t_users')->where('u_id', $u_id)
->delete();


/*$CourseNotice	= DB::table('t_course_notice')->where('n_course_id', $c_faculty_id)->orderBy('n_id', 'desc')
->get();*/


		 return back()->with('msg', "✔ USER REMOVED");
		}
	
	else{
		$request->session()->flash('msg', "UNAUTHORIZED");
            return redirect()->route('login.index');
        }
	}
	//removeUser ends





//*************    add category page starts       ************

	



	//addCategoryView starts


     public function addCategoryView(Request $request){
    	if($request->session()->get('type') == 'admin'){

$categoryList	= DB::table('t_category')->get();

/*$facultySemList	= DB::table('t_semester')->get();*/

//echo $categoryList;


		return view('page.portal.admin.addCategory',  ['categoryList' => $categoryList]/*,['facultySemList' => $facultySemList]*/);
		}
	else{
		$request->session()->flash('msg', "UNAUTHORIZED");
            return redirect()->route('login.index');
        }
	}
	//addCategoryView ends

//addCategory STARTS

	 public function addCategory(Request $req){
		
		
       $req->validate([

            
            'c_category'=>'required|max:15'
            
            


            
        ]); 


//insert statrs

       //echo $req;

       DB::table('t_category')->insert([
    ['c_category' => $req->c_category
   
    


    ]
    
    
]);

//insert ends

       
       $req->session()->flash('msg', "✔ New category added");
        		return back();

		
		

	}
	//addCategory ENDS






//*************    add category page ends       ************












}
