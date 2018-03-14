<div class="col s3">
 <div class="input-field col">
    <select id="admission_gender" name="gender" disabled>
  		<option value="male" @if($student[0]->gender == 'male') selected @endif>male</option>
  		<option value="female" @if($student[0]->gender == 'female') selected @endif>female</option>
</select>
<label>Gender</label>
</div>
</div>
<div class="col s3">
	<div class="input-field col ">
  <input id="admission_birthdate" name="birthdate" type="text" class="datepicker birthdate" value="{{Carbon\Carbon::parse($student[0]->birthdate)->format('M d, Y')}}" disabled>
  <label for="admission_birthdate">Birthdate</label>
</div>
</div>
<div class="col s3">
	<div class="input-field col ">
  <input id="admission_birthplace" name="birthplace" type="text" class="validate birthdate" value="{{$student[0]->birthplace}}" disabled>
  <label for="admission_birthplace">Birth place</label>
</div>
</div>
<div class="col s3">
	<div class="input-field col ">
     <select id="admission_bloodtype" name="bloodtype" disabled>
      		<option value="" @if($student[0]->bloodtype == null) selected @endif >blood type</option>
      		<option value="O" @if($student[0]->bloodtype == 'O') selected @endif >O</option>
      		<option value="A" @if($student[0]->bloodtype == 'A') selected @endif>A</option>
      		<option value="B" @if($student[0]->bloodtype == 'B') selected @endif>B</option>
      		<option value="AB" @if($student[0]->bloodtype == 'AB') selected @endif>AB</option>
    </select>
    <label>Blood Type</label>
</div>
</div>
<div class="col s6">
<div class="input-field col s12">
<input id="admission_fathersname" name="fathers_name" type="text" class="validate" value="{{$student[0]->fathersname}}" disabled>
<label for="admission_fathersname">Father's Name</label>
</div>
</div>
<div class="col s6">
<div class="input-field col s12">
<input id="admission_mothersname" name="mothers_name" type="text" class="validate" value="{{$student[0]->mothersname}}" disabled>
<label for="admission_mothersname">Mother's Name</label>
</div>
</div>
<div class="col s4">
<div class="input-field col s12">
<input id="admission_guardianname" name="guardian_name" type="text" class="validate" value="{{$student[0]->guardianname}}" disabled>
<label for="admission_guardianname">Guardian Name</label>
</div>
</div>
<div class="col s4">
<div class="input-field col s12">
<input id="admission_emergencycontactnumber" name="emergencycontactnumber" type="number" class="validate" value="{{$student[0]->emergencycontactnumber}}" disabled>
<label for="admission_emergencycontactnumber">Emergency Contact</label>
</div>
</div>
<div class="col s4">
<div class="input-field col s12">
<input id="admission_guardianrelationship" name="guardianrelationship" type="text" class="validate" value="{{$student[0]->guardianrelationship}}" disabled>
<label for="admission_guardianrelationship">Guardian Relationship</label>
</div>
</div>
<div class="col s12">
<div class="input-field col s12">
<textarea id="admission_address" name="address" class="materialize-textarea" data-length="120" disabled >{{$student[0]->address}}</textarea>
<label for="admission_address">Address</label>
</div>
</div>
<div class="col s6">
<div class="input-field col s12">
<input id="admission_nationality" name="nationality" type="text" class="validate" value="{{$student[0]->nationality}}" disabled>
<label for="admission_nationality">Nationality</label>
</div>
</div>
<div class="col s6">
<div class="input-field col s12">
<input id="admission_religion" name="religion" type="text" class="validate" value="{{$student[0]->religion}}" disabled>
<label for="admission_religion">Religion</label>
</div>
</div>

<div class="col s12">
<div class="input-field col s12">
<textarea id="admission_notes" name="notes" class="materialize-textarea" data-length="120" disabled>{{$student[0]->notes}}</textarea>
<label for="admission_notes">Notes</label>
</div>
</div>

<div class="col s12">
<div class="input-field col s12">
<textarea id="admission_description" name="description" class="materialize-textarea" data-length="120" disabled>{{$student[0]->description}}</textarea>
<label for="admission_description">Description</label>
</div>
</div>