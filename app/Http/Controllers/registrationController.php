<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class registrationController extends Controller
{
    public function index()
    {
   
    
    	return view('page.registration.registration');
    }





    public function valid(Request $req){
		
		
       $req->validate([

            'u_name'=>'required|unique:t_users',
            'u_password'=>'required|min:3',
            'uc_password'=>'required|same:u_password|min:3',
            'u_email'=>'required',
            
            'u_dob'=>'required',
            'u_type'=>'required',
            


            
        ]); 


//insert statrs

       //echo $req;

       DB::table('t_users')->insert([
    ['u_name' => $req->u_name,  
    'u_password' => $req->u_password ,
    'u_dob' => $req->u_dob ,
    'u_gender' => $req->u_gender,
    'u_email' => $req->u_email,
    'u_type' => $req->u_type
   
    


    ]
    
    
]);

//insert ends

       
       $req->session()->flash('msg', "✔ Your registration Successful");
        		return redirect()->route('registration.index');

		
		

	}
}
