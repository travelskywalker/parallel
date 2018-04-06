<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>

<form id="add_academic_year" sendform-url="/academicyears/new">
	<div class="row s12">
	  	<div class="col s12"><h6>Academic Year Duration</h6></div>
	  	<div class="col s3">
			<div class="input-field col ">
		      <input id="academic_from" name="from" type="text" class="datepicker from">
		      <label for="academic_from">From</label>
			</div>
		</div>
		<div class="col s3">
			<div class="input-field col ">
		      <input id="academic_to" name="to" type="text" class="datepicker to">
		      <label for="academic_to">To</label>
			</div>
		</div>
	</div>
</form>