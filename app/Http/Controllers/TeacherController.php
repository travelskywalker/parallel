<?php

namespace App\Http\Controllers;

use App\Teacher;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fullpage=true)
    {   

        $user_school_id = Auth::user()->school_id;

        $teachers = DB::table('teachers')
            ->select('teachers.id', 'teachers.image' ,'teachers.teachernumber', 'teachers.firstname', 'teachers.lastname', 'schools.name as school_name', 'teachers.notes', 'teachers.description', 'teachers.status', 'teachers.school_id')
            ->leftJoin('schools', 'teachers.school_id', '=', 'schools.id')
            ->when(Auth::user()->access_id != 0, function ($query) use ($user_school_id) {
                return $query->where('teachers.school_id', $user_school_id);
            })
            ->get();

        return view('pages.teacher.teachers')->with(['teachers'=>$teachers, 'fullpage'=>$fullpage, 'page'=>'index']);
    }

    public function api_index(){
        return $this->index(false);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        // validate data
        $validatedData = $request->validate([
            'school_id' => 'required',
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
        ]);

        // create school data
        $teacher = Teacher::create($request->all());

        if($request->image != null){
            $image = app(\App\Http\Controllers\UploadController::class)->imageUpload('files/'.$request->school_id.'/images/teacher/'.$teacher->id.'/',$request->image);

            $teacher->update(['image'=> $image]);
        };

        return response()->json(['data'=>$teacher, 'message'=>'Teacher has been added']);
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

    public function licensenumberexist($id, $licensenumber){
        $licenseExist = Teacher::where('licensenumber', $licensenumber)->where('id', '!=', $id)->exists();

        return response()->json($licenseExist);
    }

    public function teachernumberexist($id, $teachernumber, $school_id){
        $numberExist = Teacher::where('teachernumber', $teachernumber)->where('school_id', $school_id)->where('id', '!=', $id)->exists();

        return response()->json($numberExist);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function show($id, $fullpage = true)
    {

        // return $id;
        $teacher = Teacher::find($id);

        $sections = Teacher::find($id)->section;

        // $classes = Teacher::find($id)->classes;
        $classes = DB::table('classes')
                    ->selectRaw('classes.*, COUNT(DISTINCT(admissions.id)) as student_count, SUM(CASE WHEN students.gender = "male" THEN 1 ELSE 0 END) AS male_count, SUM(CASE WHEN students.gender = "female" THEN 1 ELSE 0 END) AS female_count, COUNT(DISTINCT(sections.id)) as section_count')
                    ->leftJoin('admissions', 'admissions.classes_id', '=', 'classes.id')
                    ->leftJoin('sections', 'sections.id', '=', 'admissions.section_id')
                    ->leftJoin('students', 'students.id', '=', 'admissions.student_id')
                    ->where('classes.teacher_id', '=', $id)
                    ->groupBy('classes.id')
                    ->get();


        return view('pages.teacher.teacher')->with(['teacher' => $teacher, 'sections' => $sections, 'classes' => $classes, 'fullpage'=>$fullpage, 'page'=>'teacher']);
    }

    public function api_show($id){
        return $this->show($id, false);
    }

    public function shownewteacher($fullpage=true){

        $user_school_id = Auth::user()->school_id;
        $schools = DB::table('schools')
            ->select('schools.*')
            ->when(Auth::user()->access_id != 0, function ($query) use ($user_school_id) {
                return $query->where('schools.id', $user_school_id);
            })
            ->get();


        return view('pages.teacher.add')->with(['fullpage'=>$fullpage, 'page'=>'add', 'schools'=>$schools]);
    }

    public function api_shownewteacher(){
        return $this->shownewteacher(false);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::find($id);

        return view('pages.teacher.edit')->with(['teacher'=>$teacher]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // validate data
        $validatedData = $request->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
        ]);

        $teacher = Teacher::find($id);

        $teacher->update($request->all());

        return response()->json(['message'=>'Teacher has been updated']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Teachers  $teachers
     * @return \Illuminate\Http\Response
     */
    public function destroy(Teachers $teachers)
    {
        //
    }
}
