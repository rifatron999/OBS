<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class preRegController extends Controller
{
    
  public function index(Request $req){

        
        	
        	if($req->session()->get('type') == 'faculty')
        	{
                 return redirect()->route('preReg.faculty');
        		//return view('page.portal.faculty.portal');
        	}
        	
        	if($req->session()->get('type') == 'admin')
        	{
        		//return redirect()->route('admin.index');
        	}
        	
        	if($req->session()->get('type') == 'register')
        	{
        		//return redirect()->route('register.index');
        	}
        	
        	if($req->session()->get('type') == 'student')
        	{
        		return redirect()->route('preReg.student');
        	}

        	else{
        		$req->session()->flash('msg', "illigal usertype or request!");
        		return redirect()->route('login.index');
        	    }

            

    }







 public function faculty(Request $request){
    	if($request->session()->get('type') == 'faculty'){
				//fetching logged facult's preReg starts

$facReg	= DB::table('t_course_register')->where('c_register_dept', $request->session()->get('dept'))
->where('c_register_status', 0)

->get();


$fList  = DB::table('t_tsf')->get();


//echo $facReg;
    		//echo $request->session()->get('dept');

 				 //fetching logged facult's preReg  ends

				 //facReg check starts
				 if(count($facReg) > 0)
				 {
				 	return view('page.portal.preReg.faculty.preReg',  ['facReg' => $facReg],['fList' => $fList]);
				 }
				 else 
				 {
				 	return redirect()->route('portal.index');
				 	//return view('page.portal.faculty.tsfSubmit');
				 }


				 //facReg check ends

		
		}
	else{
		$request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }


	}






		 public function updateFaculty($c_register_id,Request $req){
		
	
//update to t_course_register starts

DB::table('t_course_register')->where('c_register_id', $c_register_id)
->update([
	
		 
    'c_register_status' => 1
	
]);

//update to t_course_register ends
//getting course details from t_course_register starts

$newCourseRow	= DB::table('t_course_register')->where('c_register_id', $c_register_id)
				 
				 ->get();
//getting course details from t_course_register starts

//insert to t_course_faculty starts		

DB::table('t_course_faculty')->insert([
    ['c_faculty_name' => $newCourseRow[0]->c_register_name,  
    'c_faculty_dept' => $newCourseRow[0]->c_register_dept ,
    'c_faculty_semester' => $newCourseRow[0]->c_register_semester ,
    'c_faculty_section' => $newCourseRow[0]->c_register_section ,
    'c_faculty_faculty' => $req->session()->get('username'),
    'c_faculty_capacity' => 0
    
]
    
]);		 
//insert to t_course_faculty ends				 


	 	

		


		$req->session()->flash('msg', "✔ New Course Added To Your Portal");
        		return redirect()->route('preReg.faculty');
		

	}


//std preg cntrlr strts


public function student(Request $request){
        if($request->session()->get('type') == 'student'){
            
            
            
            
// $stuReg  = DB::table('t_course_student')->where('c_student_student',$req->session()->get('username')
// ->get();

// for($x=0;$x<count($stuReg);$x++)
// {
    
// }
                //fetching logged facult's preReg starts

$stuReg = DB::table('t_course_faculty')->whereBetween('c_faculty_capacity', [0, 39])
->get();




                 //facReg check starts
                 if(count($stuReg) > 0)
                 {
                    return view('page.portal.preReg.student.preReg',  ['stuReg' => $stuReg]);
                 }
                 else 
                 {
                    return redirect()->route('portal.index');
                    
                 }


                 //facReg check ends

        
        }
    else{
        $request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }


    }






         public function updateStudent($c_faculty_id,Request $req){
        
    
//update to t_course_register starts

   $stdSectionDetails = DB::table('t_course_faculty')->where('c_faculty_id', $c_faculty_id)
->get();
        // echo $stdSectionDetails;

//update to t_course_register ends

DB::table('t_course_faculty')->where('c_faculty_id', $c_faculty_id)
->update([
    
         
    'c_faculty_capacity' =>  $stdSectionDetails[0]->c_faculty_capacity + 1
    
]);
// //getting course details from t_course_register starts

// //insert to t_course_faculty starts      

    DB::table('t_course_student')->insert([
    [
    
    'c_student_name' => $stdSectionDetails[0]->c_faculty_name,  
    'c_student_dept' => $stdSectionDetails[0]->c_faculty_dept ,
    'c_student_courseId' => $stdSectionDetails[0]->c_faculty_id ,
    'c_student_semester' => $stdSectionDetails[0]->c_faculty_semester ,
    'c_student_section' => $stdSectionDetails[0]->c_faculty_section ,
    'c_student_faculty' => $stdSectionDetails[0]->c_faculty_faculty ,
    'c_student_student' => $req->session()->get('username') 
    
    
]
     ]);         
//insert to t_course_faculty ends                


        

        


        $req->session()->flash('msg', "✔ New Course Added To Your Portal");
                return redirect()->route('preReg.student');
        

    }
    




//std preg cntrlr ends


    //register prerag starts

    public function register($c_admin_id,Request $request){
        if($request->session()->get('type') == 'register'){
                //fetching logged register's preReg starts

$registerReg = DB::table('t_course_admin')->where('c_admin_id',$c_admin_id)
->get();
$s_semester = DB::table('t_semester')->get();
 


//echo $registerReg;
            //echo $request->session()->get('dept');

                 //fetching logged facult's preReg  ends

                 //registerReg check starts
                 if(count($registerReg) > 0)
                 {
                    return view('page.portal.preReg.register.preReg',  ['registerReg' => $registerReg, 's_semester' => $s_semester ]);
                 }
                 else 
                 {
                    return redirect()->route('portal.index');
                    //return view('page.portal.faculty.tsfSubmit');
                 }


                 //registerReg check ends

        
        }
    else{
        $request->session()->flash('msg', "illigal request!");
            return redirect()->route('login.index');
        }


    }



public function updateRegister(Request $req){


   // echo $req;
//get starts

$registerSectionList = DB::table('t_course_register')->where('c_register_name',$req->c_register_name)
->where('c_register_dept',$req->c_register_dept)
->where('c_register_semester',$req->c_register_semester)
->where('c_register_section',$req->c_register_section)
->get();
//get ends

echo $registerSectionList;

        if(count($registerSectionList) > 0)
        {
            //update statrs
DB::table('t_course_register')->where('c_register_name',$req->c_register_name)
->where('c_register_dept',$req->c_register_dept)
->where('c_register_semester',$req->c_register_semester)
->where('c_register_section',$req->c_register_section)->update([
    
         
    'c_register_status' => $req->c_register_status 
    
]);

            //update ends

        }
        else
        {
            //insert starts

         DB::table('t_course_register')->insert([
    [
    'c_register_name' => $req->c_register_name ,
    'c_register_dept' => $req->c_register_dept ,
    'c_register_semester' => $req->c_register_semester ,
    'c_register_section' => $req->c_register_section ,
    'c_register_status' => $req->c_register_status ,

    
]
    
]);
         //insert ends
        }


    

return back();

    }

   //register prerag ends









}
