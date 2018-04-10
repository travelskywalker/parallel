<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// school
Route::get('/school/list', 'SchoolController@index');
Route::post('/school/new', 'SchoolController@create');
Route::get('/school/{school_id}/classes', 'SchoolController@getclasses');
Route::get('/school/{school_id}/teachers', 'SchoolController@getteachers');
// teacher
Route::post('/teacher/new', 'TeacherController@create');

// student
Route::get('/student/{studentnumber}/{school_id}', 'UserController@getstudentbystudentnumber');
Route::get('/api/student/lrn/{number}', 'StudentController@getstudentbylrn');
Route::get('/api/student/lis/{number}', 'StudentController@getstudentbylis');

// class
Route::post('/class/new', 'ClassesController@create');


// section
Route::post('/section/new', 'SectionController@create');
Route::get('/section/{id}', 'SectionController@findData');

// user
Route::post('/user/add', 'UserController@create');
	// spa
	// Route::get('/spa/user/edit/{id}/{nav}', 'UserController@edit');

// access
Route::get('/access', 'AccessController@index');

// admission
Route::get('/admission/{admissionnumber}/{userschoolid}', 'AdmissionController@searchAdmissionData');
Route::post('/admission/new', 'AdmissionController@create');

// Route::get('/admissions', 'AdmissionController@api_index');

Route::post('/temp/imageupload', 'UploadController@tempImage');


Route::get('/system/academicyears/{school_id}', 'AcademicYearController@getAcademicYears');
Route::get('/system/academicyear/latest/{school_id}', 'AcademicYearController@getLatestAcademicYear');
Route::get('/system/academicyear/active/{school_id}', 'AcademicYearController@getActiveAcademicYear');