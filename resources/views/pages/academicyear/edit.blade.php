<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>

<form id="edit_academic_year" sendform-url="/academicyear/update/{{$academicyear->id}}">
	<div class="row s12">
	  	<div class="col s12"><h6>Academic Year Duration</h6></div>
	  	<div class="col s3">
			<div class="input-field col ">
		      <input id="academic_from" name="from" type="text" class="datepicker from" value="{{Carbon\Carbon::parse($academicyear->from)->format('M d, Y')}}">
		      <label for="academic_from">From</label>
			</div>
		</div>
		<div class="col s3">
			<div class="input-field col ">
		      <input id="academic_to" name="to" type="text" class="datepicker to" value="{{Carbon\Carbon::parse($academicyear->to)->format('M d, Y')}}">
		      <label for="academic_to">To</label>
			</div>
		</div>
	  	<div class="input-field col s12">
		    <select id="status" name="status">
	      			<option value="active" @if($academicyear->status == 'active') selected @endif>Active</option>
	      			<option value="close" @if($academicyear->status == 'close') selected @endif>Close</option>
		    </select>
		    <label>Status</label>
		</div>
	</div>
</form>