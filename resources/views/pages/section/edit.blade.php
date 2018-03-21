<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>


<form id="edit_section_form" sendform-url="/section/{{$section->id}}/update">
	<div class="row">
    	<div class="col s12">
			<div class="input-field col s12">
			    <select id="classes_id" name="classes_id">
			      		@foreach($classes as $class)
			      			<option value="{{$class->id}}" @if($section->classes_id == $class->id) selected @endif>{{$class->name}}</option>
			      		@endforeach
			    </select>
			    <label>Class</label>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col s12">
	  		<div class="input-field col s8">
	          <input id="name" name="name" type="text" class="validate" value="{{$section->name}}">
	          <label for="name">Section Name</label>
			</div>
			<div class="col s4">
		  		<div class="input-field col s12">
		          <input id="studentlimit" name="studentlimit" type="number" class="validate" value="{{$section->studentlimit}}">
		          <label for="studentlimit">Student Limit</label>
				</div>
		  	</div>
	  	</div>
	</div>
	<div class="row">
    	<div class="col s12">
			<div class="input-field col s12">
			    <select id="teacher_id" name="teacher_id">
			    			<option value="" @if($section->teacher_id == null || $section->teacher_id == '') selected @endif disabled>select teacher </option>
			      		@foreach($teachers as $teacher)
			      			<option value="{{$teacher->id}}" @if($section->teacher_id == $teacher->id) selected @endif>{{$teacher->firstname}} {{$teacher->lastname}}</option>
			      		@endforeach
			    </select>
			    <label>Teacher</label>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col s12">
			<div class="col s4">
		  		<div class="input-field col s12">
		          <input id="room" name="room" type="text" class="validate" value="{{$section->room}}">
		          <label for="room">Room</label>
				</div>
		  	</div>
			<div class="col s4">
		  		<div class="input-field col s12">
		          <input id="timefrom" name="timefrom" type="text" class="timepicker" value="{{Carbon\Carbon::parse($section->timefrom)->format('h:i A')}}">
		          <label for="timefrom">Time From</label>
				</div>
		  	</div>
			<div class="col s4">
		  		<div class="input-field col s12">
		          <input id="timeto" name="timeto" type="text" class="timepicker" value="{{Carbon\Carbon::parse($section->timeto)->format('h:i A')}}">
		          <label for="timeto">Time To</label>
				</div>
		  	</div>
		</div>
	</div>
	
	<div class="row">
			<div class="col s12">
	          <div class="input-field col s12">
	            <textarea id="admission_notes" name="notes" class="materialize-textarea" data-length="120" value="{{$section->notes}}"></textarea>
	            <label for="admission_notes">Notes</label>
	          </div>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
	          <div class="input-field col s12">
	            <textarea id="admission_description" name="description" class="materialize-textarea" data-length="120" value="{{$section->description}}"></textarea>
	            <label for="admission_description">Description</label>
	          </div>
			</div>
		</div>

</form>