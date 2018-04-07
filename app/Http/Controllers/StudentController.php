<?php

namespace App\Http\Controllers;

use App\Student;
use App\School;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fullpage = true)
    {
        $user_school_id = Auth::user()->school_id;

        $students = Student::all();

        $students = DB::table('students')
                            ->select('students.*', 'schools.name as school_name')
                            ->leftJoin('admissions', 'admissions.student_id', '=', 'students.id')
                            ->leftJoin('schools', 'admissions.school_id', '=', 'schools.id')
                            ->when(Auth::user()->access_id != 0, function ($query) use ($user_school_id) {
                                return $query->where('admissions.school_id', $user_school_id);
                            })
                            ->orderBy('students.lastname','asc')
                            ->groupBy('students.id')
                            ->get();


        return view("pages.student.students")->with(['students'=>$students,'fullpage'=>$fullpage, 'page'=>'index']);
    }

    public function api_index(){
        return $this->index(false);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function show($id, $fullpage = true)
    {
        // $student = Student::find($id);

        $student = DB::table('students')
                            ->select('students.*','students.notes', 'students.description','students.image', 'schools.name as school_name', 'schools.id as school_id', 'classes.name as class_name', 'sections.timefrom', 'sections.timeto', 'sections.room', 'sections.name as section_name')
                            ->leftJoin('admissions', 'admissions.student_id','=','students.id')
                            ->leftJoin('schools', 'admissions.school_id', '=', 'schools.id')
                            ->leftJoin('classes', 'admissions.classes_id', '=', 'classes.id')
                            ->leftJoin('sections', 'admissions.section_id', '=', 'sections.id')
                            ->where('students.id','=', $id)
                            ->get();

        $admissions = DB::table('admissions')
                            ->select('students.id', 'classes.name as class_name', 'sections.*', 'sections.name as section_name', 'schools.name as school_name','admissions.*')
                            ->leftJoin('students', 'admissions.student_id','=','students.id')
                            ->leftJoin('schools', 'admissions.school_id', '=', 'schools.id')
                            ->leftJoin('classes', 'admissions.classes_id', '=', 'classes.id')
                            ->leftJoin('sections', 'admissions.section_id', '=', 'sections.id')
                            ->where('students.id','=', $id)
                            ->get();

        return view('pages.student.student')
                ->with([
                    'student'=>$student,
                    'admissions'=>$admissions,
                    'fullpage'=>$fullpage,
                    'page'=>'details'
                ]);
    }

    public function api_show($id){
        return $this->show($id, false);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::find($id);

        return view('pages.student.edit')->with(['student'=>$student]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validdatedData = $request->validate([
            // student details required
            'studentnumber' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'birthdate' => 'required',
            'fathersname' => 'required',
            'mothersname' => 'required',
            'guardianname' => 'required',
            'guardianrelationship' => 'required',
            'emergencycontactnumber' => 'required',
            'address' => 'required',
            'gender' => 'required',
        ]);

        $student = Student::find($id);

        if($request->image != $student->image){
            $image = app(\App\Http\Controllers\UploadController::class)->imageUpload('files/'.$request->school_id.'/images/student/'.$student->id.'/',$request->image);

            $request->replace(array('image' => $image));
        }

        $newbirthdate = \Carbon\Carbon::parse($request->birthdate);
        $request->merge(array('birthdate' => $newbirthdate));

        $student->update($request->all());

        return response()->json(['data'=>$student, 'message'=>'Student has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Student  $student
     * @return \Illuminate\Http\Response
     */
    public function destroy(Student $student)
    {
        //
    }


    // api functions
    public function getstudentbylrn($number){
        $student = Student::where('lrn','=', $number)->get();

        return response()->json(['data'=>$student]);
    }

    public function getstudentbylis($number){
        $student = Student::where('lis','=', $number)->get();

        return response()->json(['data'=>$student]);
    }
}
