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


   











}
