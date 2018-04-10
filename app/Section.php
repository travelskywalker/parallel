<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
	protected $fillable = ['name', 'academicyear_id', 'school_id','teacher_id', 'studentlimit', 'classes_id', 'timeto', 'timefrom', 'room', 'notes', 'description', 'status'];

    public function classes(){
    	return $this->hasOne('App\Classes');
    }

    public function teacher(){
    	return $this->hasOne('App\Teacher');
    }
}
