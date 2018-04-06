<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\AcademicYear;

class AcademicYearController extends Controller
{
    public function show($fullpage = true){

    	$academicyear = AcademicYear::where('school_id', Auth::user()->school_id)->get();

    	$activeAY = AcademicYear::where('school_id', Auth::user()->school_id)->where('status', 'active')->get();

    	return view('pages.admin.academicyear')->with(['fullpage'=>$fullpage, 'page'=>'academicyear', 'academicyears'=>$academicyear, 'activeAY'=>$activeAY]);
    }

    public function api_show(){
    	return $this->show(false);
    }

    public function add(){
    	return view('pages.academicyear.add');
    }

    public function create(Request $request){

    	$validatedData = $request->validate([
    			'from'=>'required',
                'to'=>'required'
    	]);

        $request->from = \Carbon\Carbon::parse($request->from);
        $request->to = \Carbon\Carbon::parse($request->to);

    	$academicyear = AcademicYear::create([
                'from' => $request->from,
    			'to' => $request->to,
    			'school_id' => Auth::user()->school_id
    	]);

    	return response(['data'=>$academicyear, 'message'=>'Academic Year has been added']);

    }

    public function edit($id){

    	$academicyear = AcademicYear::find($id);

    	return view('pages.academicyear.edit')->with('academicyear', $academicyear);
    }

    public function update(Request $request, $id){

        $validatedData = $request->validate([
                'from'=>'required',
                'to'=>'required'
        ]);

        // $request->to = \Carbon\Carbon::parse($request->to);
        // $request->from = \Carbon\Carbon::parse($request->from);

    	$academicyear = AcademicYear::find($id);

        // set all academic year close
        if($request->status == 'active'){
            AcademicYear::where('school_id', '=', Auth::user()->school_id)
            ->update(['status'=>'close']);
        }

    	$academicyear->update([
            'status'=>$request->status,
            'from'=>\Carbon\Carbon::parse($request->from),
            'to'=>\Carbon\Carbon::parse($request->to)
        ]);

    	return response(['data'=>$academicyear, 'message'=>'Academic Year has been updated']);
    }

    public function hasActiveAY(){
    	$academicyear = AcademicYear::where('school_id', Auth::user()->school_id)->where('status', 'active');

    	return response()->json($academicyear);
    }

    public function getAcademicYear($school_id){
        // get active academic year
        $activeyear = AcademicYear::where('school_id', $school_id)->where('status', '=', 'active');


    }
}
