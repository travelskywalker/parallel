<div class="hidden" id="student_id">{{$student->id}}</div>

<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>

<form id="edit_student_form" sendform-url="/student/{{$student->id}}/update">
	<input type="hidden" name="image" id="image" value="{{$student->image}}">
	
	<div class="row">
	<div class="row">
		<div class="col s4">
			<div class="add-image-container" id="image_container" activates="image_upload" style="background: url('/{{$student->image}}')">please upload square photo to ensure image compatibility</div>
		</div>
		<div class="col s6">
			<div class="input-field col ">
	      <input id="student_number" name="studentnumber" type="number" class="validate" value="{{$student->studentnumber}}">
	      <label for="student_number">Student Number</label>
		</div>
	</div>
		</div>
		<div class="col s4">
			<div class="input-field col s12">
	      <input id="first_name" name="firstname" type="text" class="validate" value="{{$student->firstname}}">
	      <label for="first_name">First Name</label>
		</div>
		</div>
		<div class="col s4">
			<div class="input-field col s12">
	      <input id="middle_name" name="middlename" type="text" class="validate" value="{{$student->middlename}}">
	      <label for="middle_name">Middle Name</label>
		</div>
		</div>
		<div class="col s4">
			<div class="input-field col s12">
	      <input id="last_name" name="lastname" type="text" class="validate" value="{{$student->lastname}}">
	      <label for="last_name">Last Name</label>
		</div>
		</div>
		<div class="col s3">
	     <div class="input-field col">
		    <select id="gender" name="gender">
		      		<option value="male" @if($student->gender == 'male') selected @endif>Male</option>
		      		<option value="female" @if($student->gender == 'female') selected @endif>Female</option>
		    </select>
		    <label>Gender</label>
		</div>
		</div>
		<div class="col s3">
			<div class="input-field col ">
	      <input id="birthdate" name="birthdate" type="text" class="datepicker birthdate" value="{{Carbon\Carbon::parse($student->birthdate)->format('M d, Y')}}">
	      <label for="birthdate">Birthdate</label>
		</div>
		</div>
		<div class="col s3">
			<div class="input-field col ">
	      <input id="birthplace" name="birthplace" type="text" class="validate birthdate" value="{{$student->birthplace}}">
	      <label for="birthplace">Birth place</label>
		</div>
		</div>
		<div class="col s3">
			<div class="input-field col ">
	         <select id="bloodtype" name="bloodtype">
		      		<option value="" disabled @if($student->bloodtype == null || $student->bloodtype == '') selected @endif>select blood type</option>
		      		<option value="O" @if($student->bloodtype == 'O') selected @endif>O</option>
		      		<option value="A" @if($student->bloodtype == 'A') selected @endif>A</option>
		      		<option value="B" @if($student->bloodtype == 'B') selected @endif>B</option>
		      		<option value="AB" @if($student->bloodtype == 'AB') selected @endif>AB</option>
		    </select>
		    <label>Blood Type</label>
		</div>
		</div>
		<div class="col s6">
			<div class="input-field col s12">
	      <input id="fathersname" name="fathersname" type="text" class="validate" value="{{$student->fathersname}}">
	      <label for="fathersname">Father's Name</label>
		</div>
		</div>
		<div class="col s6">
			<div class="input-field col s12">
	      <input id="mothersname" name="mothersname" type="text" class="validate" value="{{$student->mothersname}}">
	      <label for="mothersname">Mother's Name</label>
		</div>
		</div>
		<div class="col s4">
			<div class="input-field col s12">
	      <input id="guardianname" name="guardianname" type="text" class="validate" value="{{$student->guardianname}}">
	      <label for="guardianname">Guardian Name</label>
		</div>
		</div>
		<div class="col s4">
			<div class="input-field col s12">
	      <input id="emergencycontactnumber" name="emergencycontactnumber" type="number" class="validate" value="{{$student->emergencycontactnumber}}">
	      <label for="emergencycontactnumber">Emergency Contact</label>
		</div>
		</div>
		<div class="col s4">
			<div class="input-field col">
	      <input id="guardianrelationship" name="guardianrelationship" type="text" class="validate" value="{{$student->guardianrelationship}}">
	      <label for="guardianrelationship">Guardian Relationship</label>
		</div>
		</div>
		<div class="col s12">
	      <div class="input-field col s12">
	        <textarea id="address" name="address" class="materialize-textarea" data-length="120">{{$student->address}}</textarea>
	        <label for="address">Address</label>
	      </div>
		</div>
		<div class="col s6">
			<div class="input-field col s12">
	      <input id="nationality" name="nationality" type="text" class="validate" value="{{$student->nationality}}">
	      <label for="nationality">Nationality</label>
		</div>
		</div>
		<div class="col s6">
			<div class="input-field col s12">
	      <input id="religion" name="religion" type="text" class="validate" value="{{$student->religion}}">
	      <label for="religion">Religion</label>
		</div>
		</div>
		<div class="col s12">
	      <div class="input-field col s12">
	        <textarea id="notes" name="notes" class="materialize-textarea" data-length="120">{{$student->notes}}</textarea>
	        <label for="notes">Notes</label>
	      </div>
		</div>
		<div class="col s12">
	      <div class="input-field col s12">
	        <textarea id="description" name="description" class="materialize-textarea" data-length="120">{{$student->description}}</textarea>
	        <label for="description">Description</label>
	      </div>
		</div>
	</div>
</form>

<form id="add_image_form" style="display: none">
<input id="image_upload" container="image_container" form-input="image" name="image" fdata="add_image_form" api="/temp/imageupload" type="file" accept="image/*">
</form>