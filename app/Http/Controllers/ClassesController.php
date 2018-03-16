<?php

namespace App\Http\Controllers;

use App\Section;
use App\Classes;
use App\School;
use App\Http\Resources\Classes as ClassesResources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class ClassesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($fullpage=true)
    {
        $user_school_id = Auth::user()->school_id;

        $classes = DB::table('classes as c')
            ->selectRaw('c.id,c.teacher_id, c.name, c.notes, c.description, c.status, schools.name as school_name, teachers.firstname, teachers.lastname, COUNT(DISTINCT(admissions.id)) as student_count, SUM(CASE WHEN students.gender = "male" THEN 1 ELSE 0 END) AS male_count, SUM(CASE WHEN students.gender = "female" THEN 1 ELSE 0 END) AS female_count, COUNT(DISTINCT(sections.id)) as section_count' )
            ->leftJoin('schools', 'c.school_id', '=', 'schools.id')
            ->leftJoin('teachers', 'teachers.id', '=', 'c.teacher_id')
            ->leftJoin('admissions', 'admissions.classes_id', '=', 'c.id')
            ->leftJoin('sections', 'admissions.section_id', '=', 'sections.id')
            ->leftJoin('students', 'admissions.student_id', 'students.id')  
            ->orderBy('schools.name','asc')
            ->orderBy('c.name','asc')
            ->groupBy('c.id')
            ->when(Auth::user()->access_id != 0, function ($query) use ($user_school_id) {
                return $query->where('c.school_id', $user_school_id);
            })
            ->get();

        return view('pages.classes.classes')->with(['classes'=>$classes, 'fullpage'=>$fullpage, 'page'=>'index']);
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
        $validatedData = $request->validate([
            'school_id' =>'required',
            'name' => 'required',
        ]);

        // create school data
        $class = Classes::create($request->all());

        return response()->json(['data'=>$class, 'message'=>'Class has been added']);
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
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function show($id, $fullpage = true)
    {
        // $class = Classes::find($id);

        $class = DB::table('classes')
                    ->select('classes.*', 'classes.school_id', 'teachers.firstname', 'teachers.lastname', 'teachers.id as teacher_id', 'schools.name as school_name', 'schools.title1 as schooltitle1', 'schools.title2 as schooltitle2', 'schools.logo as school_logo')
                    ->leftJoin('teachers', 'teachers.id', '=', 'classes.teacher_id')
                    ->leftJoin('schools', 'schools.id', '=', 'classes.school_id')
                    ->where('classes.id', '=' ,$id)
                    ->get();

                    // var_dump($class);

        // $school = School::find($class->school_id);

        $sections = DB::table('sections')
                        ->select('sections.*', 'teachers.firstname', 'teachers.lastname')
                        ->leftJoin('teachers', 'teachers.id', '=', 'sections.teacher_id')
                        ->where('sections.classes_id', $id)
                        ->orderBy('sections.timefrom')
                        ->get();

        $students = DB::table('students')
                        ->select('students.firstname', 'students.lastname', 'students.id', 'students.status', 'students.studentnumber', 'students.gender', 'sections.name as section_name')
                        ->leftJoin('admissions', 'admissions.student_id', '=', 'students.id')
                        ->leftJoin('sections', 'admissions.section_id', '=', 'sections.id')
                        ->where('admissions.classes_id', '=', $id)
                        ->orderBy('sections.name', 'asc')
                        ->orderBy('students.lastname', 'asc')
                        ->get();


        return view('pages.classes.class')->with([
                                                'class'=>$class, 
                                                'sections'=>$sections,
                                                'students'=>$students,
                                                'fullpage'=>$fullpage,
                                                'page'=>'index'
                                            ]);
    }

    public function api_show($id){
        return $this->show($id, false);
    }

    public function shownewclassesview($fullpage = true){

        $user_school_id = Auth::user()->school_id;
        
        $schools = DB::table('schools')
            ->select('schools.*')
            ->when(Auth::user()->access_id != 0, function ($query) use ($user_school_id) {
                return $query->where('schools.id', $user_school_id);
            })
            ->get();

            if(School::find($user_school_id)){
                $teachers = School::find($user_school_id)->teachers;
            }else{
                $teachers = [];
            }

        return view('pages.classes.add')->with(['schools'=>$schools, 'teachers'=>$teachers, 'fullpage'=>$fullpage, 'page'=>'add']);
    }

    public function api_shownewclassesview(){
        return $this->shownewclassesview(false);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function edit(Classes $classes)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Classes $classes)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Classes  $classes
     * @return \Illuminate\Http\Response
     */
    public function destroy(Classes $classes)
    {
        //
    }

    public function getsections($class_id){
        $sections = Section::where('classes_id', '=', $class_id)->get();

        return response()->json(['message'=>'success', 'data'=>$sections]);
    }


}
