<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>

<form id="edit_school_form" sendform-url="/school/{{$school->id}}/update">

	<div class="add-image-container" id="logo_container" activates="image_upload" style="background:url('/{{$school->logo}}')">please upload square photo to ensure image compatibility</div>
	<input type="hidden" name="logo" id="logo">
	<div class="row">
			<div class="col s12">
	  		<div class="input-field col s12">
	          <input id="school_name" name="name" type="text" class="validate" value="{{$school->name}}">
	          <label for="school_name">School Name</label>
			</div>
	  	</div>
	</div>
	<div class="row">
			<div class="col s12">
	  		<div class="input-field col s12">
	          <input id="title1" name="title1" type="text" class="validate" value="{{$school->title1}}">
	          <label for="title1">Title1</label>
			</div>
	  	</div>
	</div>
	<div class="row">
			<div class="col s12">
	  		<div class="input-field col s12">
	          <input id="title2" name="title2" type="text" class="validate" value="{{$school->title2}}">
	          <label for="title2">Title2</label>
			</div>
	  	</div>
	</div>
	<div class="row">
			<div class="col s6">
	  		<div class="input-field col s12">
	          <input id="admin" name="admin" type="text" class="validate" value="{{$school->admin}}">
	          <label for="admin" data-error="please enter valid email address">Admin Name</label>
			</div>
	  	</div>
	  	<div class="col s6">
	  		<div class="input-field col s12">
	          <input id="email" name="email" type="email" class="validate" value="{{$school->email}}">
	          <label for="email">Email</label>
			</div>
	  	</div>
	</div>
	<div class="row">
			<div class="col s6">
	  		<div class="input-field col s12">
	          <input id="phonenumber" name="phonenumber" type="number" class="validate" value="{{$school->phonenumber}}">
	          <label for="phonenumber">Phone</label>
			</div>
	  	</div>
	  	<div class="col s6">
	  		<div class="input-field col s12">
	          <input id="mobilenumber" name="mobilenumber" type="number" class="validate" value="{{$school->mobilenumber}}">
	          <label for="mobilenumber">Mobile</label>
			</div>
	  	</div>
	</div>
	<div class="row">
			<div class="col s12">
	          <div class="input-field col s12">
	            <textarea id="address" name="address" class="materialize-textarea" data-length="120" >{{$school->address}}</textarea>
	            <label for="address">Address</label>
	          </div>
			</div>
		</div>
		<div class="row">
			<div class="col s6">
	  		<div class="input-field col s12">
	          <input id="city" name="city" type="text" class="validate" value="{{$school->city}}">
	          <label for="city">City</label>
			</div>
	  	</div>
	</div>
	<div class="row">
			<div class="col s12">
	          <div class="input-field col s12">
	            <textarea id="admission_notes" name="notes" class="materialize-textarea" data-length="120" value="{{$school->notes}}"></textarea>
	            <label for="admission_notes">Notes</label>
	          </div>
			</div>
		</div>
		<div class="row">
			<div class="col s12">
	          <div class="input-field col s12">
	            <textarea id="admission_description" name="description" class="materialize-textarea" data-length="120" value="{{$school->description}}"></textarea>
	            <label for="admission_description">Description</label>
	          </div>
			</div>
		</div>
</form>

<form id="add_logo_form" style="display: none">
<input id="image_upload" container="logo_container" form-input="logo" name="image" fdata="add_logo_form" api="/temp/imageupload" type="file" accept="image/*" value="{{$school->logo}}">
</form>