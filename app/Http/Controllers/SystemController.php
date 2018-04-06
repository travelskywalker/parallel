<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\School;
use App\Student;
use App\Teacher;
use App\Classes;
use App\Section;
use App\AcademicYear;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class SystemController extends Controller
{
    public function showresult($key){

    	$schools = School::where('name','like', '%'. $key . '%')->get();

    	$students = Student::where('firstname', 'like', '%'. $key . '%')
    						->orWhere('middlename', 'like', '%'. $key . '%')
    						->orWhere('lastname', 'like', '%'. $key . '%')
    						->get();

    	$teachers = Teacher::where('firstname', 'like', '%'. $key . '%')
    						->orWhere('middlename', 'like', '%'. $key . '%')
    						->orWhere('lastname', 'like', '%'. $key . '%')
    						->get();

    	$classes = Classes::where('name', 'like', '%'. $key . '%')
    						->get();

    	$sections = Section::where('name', 'like', '%'. $key . '%')
    						->get();

    	return view('pages.system.search')->with([
											'schools'=>$schools,
											'students'=>$students,
											'teachers'=>$teachers,
											'classes'=>$classes,
											'sections'=>$sections,
										]);
    }

    public function getContacts(){
        $contacts = Student::all();

        return response()->json(['data'=>$contacts]);
    }

    public function accountDetails(){

        $account = DB::table('users')
                    ->selectRaw('users.*, accesses.name as access, schools.name as school')
                    ->leftJoin('accesses', 'users.access_id', '=', 'accesses.id')
                    ->leftJoin('schools', 'schools.id', '=', 'users.school_id')
                    ->where('users.id', Auth::user()->id)
                    ->get();

        $activeAY = AcademicYear::where('school_id', Auth::user()->school_id)->where('status', 'active')->get();

        return view('pages.account.details')->with(['account'=>$account, 'activeAY'=>$activeAY]);
    }
}
