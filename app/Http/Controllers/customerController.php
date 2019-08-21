<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class customerController extends Controller
{
	//index starts
	
	public function index(Request $request){
    	if($request->session()->get('type') == 'customer'){

$categoryList	= DB::table('t_category')->get();
$bookList	= DB::table('t_book')->get();

//echo $categoryList;


		return view('page.portal.customer.portal',  ['categoryList' => $categoryList],['bookList' => $bookList]);
		}
	else{
		$request->session()->flash('msg', "UNAUTHORIZED");
            return redirect()->route('login.index');
        }
	}

	//index ends


//bookListCategoryWise starts

	 public function bookListCategoryWise(Request $request){
    	if($request->session()->get('type') == 'customer'){

    		return redirect()->route('customer.bookListCategoryWise',$request->b_category);


	}
	else{
		$request->session()->flash('msg', "UNAUTHORIZED");
            return redirect()->route('login.index');
        }
	}
	//bookListCategoryWise ends




	//bookListCategoryWise2 starts

	 public function bookListCategoryWise2(Request $request){
    	if($request->session()->get('type') == 'customer'){

$bookListByCategory	= DB::table('t_book')->where('b_category', $request->b_category)
->get();

/*$facultySemList	= DB::table('t_semester')->get();*/

//echo $request;
//echo $bookListByCategory;

if(count($bookListByCategory) > 0){


		return view('page.portal.customer.bookListByCategory',  ['bookListByCategory' => $bookListByCategory]/*,['categoryList' => $categoryList]*/);
	}
	else
		{$request->session()->flash('msg', " ☹ THIS CATEGORY CURRENTY NOT AVAILABLE");
		 return back();
		}
	}
	else{
		$request->session()->flash('msg', "UNAUTHORIZED");
            return redirect()->route('login.index');
        }
	}
	//bookListCategoryWise2 ends

	//bookDetails starts

	 public function bookDetails($b_id,Request $request){
    	if($request->session()->get('type') == 'customer'){

$bookDetailsById	= DB::table('t_book')->where('b_id', $b_id)
->get();

/*$facultySemList	= DB::table('t_semester')->get();*/

/*echo $b_id;
echo $bookDetailsById;*/

if(count($bookDetailsById) > 0){


		return view('page.portal.customer.bookDetailsById',  ['bookDetailsById' => $bookDetailsById]/*,['categoryList' => $categoryList]*/);
	}
	else
		{$request->session()->flash('msg', " ☹ THIS BOOK IS CURRENTY NOT AVAILABLE");
		 return back();
		}

	}

	else{
		$request->session()->flash('msg', "UNAUTHORIZED");
            return redirect()->route('login.index');
        }
	}
	//bookDetails ends


	//addToCart starts

	 public function addToCart($b_id,Request $request){
    	if($request->session()->get('type') == 'customer'){

$bookDetailsById	= DB::table('t_book')->where('b_id', $b_id)
->get();
//echo $bookDetailsById;

if(count($bookDetailsById) > 0){


       DB::table('t_cart')->insert([
    [
    	'b_name' => $bookDetailsById[0]->b_name,
    	'b_price' => $bookDetailsById[0]->b_price,
    	'u_name' => $request->session()->get('username'),
    	'ca_status' => 0
   
    


    ]
    
    
]);

$request->session()->flash('msg', " ✔ ADDED TO CART");
		 return back();




	

	}
	else
		{$request->session()->flash('msg', " ☹ THIS BOOK IS CURRENTY NOT AVAILABLE");
		 return back();
		}
	}

	else{
		$request->session()->flash('msg', "UNAUTHORIZED");
            return redirect()->route('login.index');
        }
	}
	//addToCart ends


   
//myCart starts

	 public function myCart($u_name,Request $request){
    	if($request->session()->get('type') == 'customer'){

$myCart	= DB::table('t_cart')->where('u_name', $u_name)->where('ca_status', 0)
->get();
//echo $myCart;

if(count($myCart) > 0){


       
		return view('page.portal.customer.myCart',  ['myCart' => $myCart]/*,['categoryList' => $categoryList]*/);
	

	}
	else
		{$request->session()->flash('msg', " ☹ YOUR CART IS EMPTY");
		 return back();
		}
	}

	else{
		$request->session()->flash('msg', "UNAUTHORIZED");
            return redirect()->route('login.index');
        }
	}
	//myCart ends





//buy starts

	 public function buy($ca_id,Request $request){
    	if($request->session()->get('type') == 'customer'){


DB::table('t_cart')->where('u_name', $req->session()->get('username'))
->update([
    
         
    'ca_status' => 1 
   
    
]);
//echo $myCart;


		 return back();
		
	}

	else{
		$request->session()->flash('msg', "UNAUTHORIZED");
            return redirect()->route('login.index');
        }
	}
	//buy ends






}
