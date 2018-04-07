<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
	/**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'studentnumber', 'lrn', 'lis', 'firstname', 'middlename', 'lastname', 'gender', 'birthdate', 'birthplace', 'bloodtype', 'address', 'fathersname', 'mothersname', 'guardianname', 'emergencycontactnumber','guardianrelationship', 'nationality', 'religion', 'image', 'notes', 'description', 'status'
    ];


    public function sections(){
    	return $this->hasMany('App\Section');
    }

    public function admissions(){
    	return $this->hasMany('App\Admission');
    }
}
