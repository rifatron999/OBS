<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::get('/', 'PageController@home');
//Route::get('/page/login', 'PageController@login');
//Route::get('/page/admin', 'PageController@admin');

//Route::get('/page/user', 'PageController@user');

//Route::get('/login', ["uses"=>"LoginController@index"]);

//login #############################
Route::get('/login', 'loginController@index')->name('login.index');
Route::post('/login', 'loginController@valid');
//login ends

//registration 
Route::get('/registration','registrationController@index')->name('registration.index');
Route::post('/registration', 'registrationController@valid');
//registration ends

//home
Route::get('/home', 'homeController@index')->name('home.index');
// rahul home starts
Route::get('/home/noticeDetails/{n_id}', 'homeController@notice')->name('home.noticeDetails.notice');//rahul
Route::get('/home/allnoticeDetails', 'homeController@allnotice')->name('home.allnoticeDetails.allnotice');//rahul


//academic calender download //
Route::get('/home/download',function () {
	$file =public_path()."/Calendar.docx";

	$headers =array(
		'content-Type:application/docx',
	);
	return Response :: download($file, "Calendar.docx",$headers);

	});
//calender ends

// rahul home ends

//home ends

//portal starts
Route::group(['middleware'=>['session_check']], function(){

Route::get('/portal','portalController@index')->name('portal.index');

//profile starts******************************************************************
Route::get('/portal/profile','portalController@profile')->name('portal.profile');
Route::post('/portal/profile', 'portalController@updateProfile'); 

//profile ends*********************************************************************


//preReg starts

//cmn starts
Route::get('/portal/preRegistration','preRegController@index')->name('preReg.index'); //common for all

//cmn ends


//fac starts prereg



Route::get('/portal/preRegistration/faculty','preRegController@faculty')->name('preReg.faculty'); //faculty
Route::get('/portal/preRegistration/faculty/{c_register_id}', 'preRegController@updateFaculty')->name('preReg.updateFaculty');//faculty

//fac ends prereg



//std starts prereg
Route::get('/portal/preRegistration/student','preRegController@student')->name('preReg.student'); //student
Route::get('/portal/preRegistration/student/{c_faculty_id}', 'preRegController@updateStudent')->name('preReg.updateStudent');//student
//std ends prereg



//register starts prereg

Route::get('/portal/preRegistration/register/{c_admin_id}','preRegController@register')->name('preReg.register'); //register
Route::post('/portal/preRegistration/register/{c_admin_id}', 'preRegController@updateregister');//register

//register ends prereg


//preReg ends

//********************************************************************

//admin starts
Route::get('/portal/admin','adminController@index')->name('admin.index');
Route::get('/portal/addCategoryView','adminController@addCategoryView')->name('admin.addCategoryView');
Route::get('/portal/addBookView','adminController@addBookView')->name('admin.addBookView');
Route::get('/portal/admin/{u_id}','adminController@removeUser')->name('admin.removeUser');

Route::post('/portal/addCategoryView','adminController@addCategory');
Route::post('/portal/addBookView','adminController@addBook');
//admin ends


//customer stars
Route::get('/portal/customer','customerController@index')->name('customer.index');
Route::get('/portal/customer/bookListCategoryWise/{b_category}','customerController@bookListCategoryWise2')->name('customer.bookListCategoryWise');

Route::post('/portal/customer','customerController@bookListCategoryWise');
//customer ends

//******************************************************************************





//fac starts ####################################################

Route::get('/portal/faculty','facultyController@index')->name('faculty.index');

Route::get('/portal/faculty/tsf','facultyController@tsf')->name('faculty.tsf');
Route::get('/portal/faculty/tsf/insert','facultyController@tsfinsert')->name('faculty.tsf.insert');
Route::get('/portal/faculty/sectionDetails/{c_faculty_id}','facultyController@sectionDetails')->name('faculty.sectionDetails');
Route::get('/portal/faculty/sectionDetails/uploadSlide/{c_faculty_id}','facultyController@loadUploadSlide')->name('faculty.sectionDetails.uploadSlide');

Route::get('/portal/faculty/sectionDetails/removeSlide/{sli_id}','facultyController@removeSlide')->name('faculty.sectionDetails.removeSlide');

Route::get('/portal/faculty/sectionDetails/removeNotice/{n_id}','facultyController@removeNotice')->name('faculty.sectionDetails.removeNotice');

Route::get('/portal/faculty/sectionDetails/students/{CourseId}','facultyController@studentListGet')->name('faculty.sectionDetails.students');

/*Route::get('/portal/faculty/sectionDetails/students/getBysem','facultyController@studentListGetGetbySem')->name('faculty.sectionDetails.students.getBySem');*/


Route::post('/portal/faculty/tsf/insert', 'facultyController@insertTsf');
Route::post('/portal/faculty/tsf', 'facultyController@updateTsf');
Route::post('/portal/faculty/sectionDetails/{c_faculty_id}','facultyController@noticeInsert');
Route::post('/portal/faculty/sectionDetails/uploadSlide/{c_faculty_id}','facultyController@slideInsert');
Route::post('/portal/faculty/sectionDetails/students/{CourseId}','facultyController@gradeInsertoUpdate');
Route::post('/portal/faculty','facultyController@roomRequest');
//fac ends

























//tsfview starst
Route::get('/portal/tsfview/{t_name}','tsfViewController@index')->name('tsfview.index');

//tsfview ends

//Route::get('/portal/admin','adminController@index')->name('admin.index');

//Route::get('/portal/register','registerController@index')->name('register.index');

//Route::get('/portal/student','studentController@index')->name('student.index');

});
//portal ends


Route::get('/home/details/{sid}', 'HomeController@details')->name('home.details');
Route::get('/home/stdList', 'HomeController@show')->name('home.stdlist');
Route::get('/home/add', 'HomeController@add')->name('home.add');
//Route::get('/home/add', ["as"=>"home.add","uses"=>"HomeController@add"]);
Route::post('/home/add', 'HomeController@create');
Route::get('/home/edit/{sid}', 'HomeController@edit')->name('home.edit');
Route::post('/home/edit/{sid}', 'HomeController@update');
Route::get('/home/delete/{sid}', 'HomeController@delete')->name('home.delete');
Route::post('/home/delete/{sid}', 'HomeController@destroy');
Route::get('/logout', 'logoutController@index');

//Route::resource('accounts', 'AccountController');


