<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>


	<form id="edit_class_form" sendform-url="/classes/{{$class->id}}/update">
		<div class="row">
			<div class="col s12">
		  		<div class="input-field col s12">
		          <input id="name" name="name" type="text" class="validate" value="{{$class->name}}">
		          <label for="name">Class Name</label>
				</div>
		  	</div>
		</div>
		<div class="row">
	    	<div class="col s12">
				<div class="input-field col s12">
				    <select id="teacher_id" name="teacher_id">
				      		@if(Auth::user()->access_id == 0)<option value="" disabled selected>select teacher</option>@endif
				      		@foreach($teachers as $teacher)
				      			<option value="{{$teacher->id}}" @if($class->teacher_id == $teacher->id) selected @endif>{{$teacher->firstname}} {{$teacher->lastname}}</option>
				      		@endforeach
				    </select>
				    <label>Teacher</label>
				</div>
			</div>
		</div>
		
		
		<div class="row">
	  			<div class="col s12">
			          <div class="input-field col s12">
			            <textarea id="admission_notes" name="notes" class="materialize-textarea" data-length="120" value="{{$class->notes}}"></textarea>
			            <label for="admission_notes">Notes</label>
			          </div>
	  			</div>
	  		</div>
	  		<div class="row">
	  			<div class="col s12">
			          <div class="input-field col s12">
			            <textarea id="admission_description" name="description" class="materialize-textarea" data-length="120" value="{{$class->description}}"></textarea>
			            <label for="admission_description">Description</label>
			          </div>
	  			</div>
	  		</div>
	</form>