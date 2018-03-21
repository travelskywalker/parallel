
<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>


<form id="edit_teacher_form" sendform-url="/teacher/{{$teacher->id}}/update">
	<input type="hidden" name="image" id="image" @if($teacher->image == null) value="files/images/default/nophoto.jpeg" @endif>

	<div class="row">
		<div class="col s4">
			<div class="add-image-container" id="image_container" style="background:url('/{{$teacher->image}}')" activates="image_upload">please upload square photo to ensure image compatibility</div>
		</div>
		<div class="col s8">
			<div class="col s12">
		  		<div class="input-field col s6">
		          <input id="teachernumber" name="teachernumber" type="number" class="validate" value="{{$teacher->teachernumber}}">
		          <label for="teachernumber">Teacher Number</label>
				</div>
		  	</div>
		  	<div class="col s12">
		  			<div class="input-field col s6">
					<input id="licensenumber" name="licensenumber" type="number" class="validate" value="{{$teacher->licensenumber}}">
		          <label for="licensenumber">License Number</label>
				</div>
		  	</div>
			
		</div>
	</div>

	<div class="row">
		<div class="col s12">
	  		<div class="input-field col s4">
	          <input id="firstname" name="firstname" type="text" class="validate" value="{{$teacher->firstname}}">
	          <label for="firstname">First Name</label>
			</div>
			<div class="input-field col s4">
	          <input id="middlename" name="middlename" type="text" class="validate" value="{{$teacher->middlename}}">
	          <label for="middlename">Middle Name</label>
			</div>
			<div class="input-field col s4">
	          <input id="lastname" name="lastname" type="text" class="validate" value="{{$teacher->lastname}}">
	          <label for="lastname">Last Name</label>
			</div>
	  	</div>
	</div>
	
	
	<div class="row">
  			<div class="col s12">
		          <div class="input-field col s12">
		            <textarea id="teacher_notes" name="notes" class="materialize-textarea" data-length="120" value="{{$teacher->notes}}"></textarea>
		            <label for="teacher_notes">Notes</label>
		          </div>
  			</div>
  		</div>
  		<div class="row">
  			<div class="col s12">
		          <div class="input-field col s12">
		            <textarea id="teacher_description" name="description" class="materialize-textarea" data-length="120" value="{{$teacher->description}}"></textarea>
		            <label for="teacher_description">Description</label>
		          </div>
  			</div>
  		</div>

</form>

<form id="add_photo" style="display: none">
<input id="image_upload" container="image_container" form-input="image" name="image" fdata="add_photo" api="/temp/imageupload" type="file" accept="image/*">
</form>