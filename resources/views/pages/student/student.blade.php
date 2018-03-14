@if($fullpage)
	@include('pages.student.index')
@else

	

<div class="form-details">
		<div class="row">
				<div class="col s4">
					<div class="image-container materialboxed" style="background:url('/{{$student[0]->image}}')"></div>
				</div>
				<div class="col s8">
			  		<div class="input-field col s8">
			          <input id="student_school" type="text" class="validate" value="{{$student[0]->school_name}}" disabled>
			          <label for="student_school">School</label>
					</div>
					<div class="input-field col s4">
			          <input id="admission_student_id" name="student_id" type="text" class="validate" value="{{$student[0]->studentnumber}}" disabled>
			          <label for="admission_student_id">Student Number</label>
					</div>
			  	</div>
				<div class="col s8">
			  		<div class="input-field col s6">
			          <input id="admission_student_id" name="student_id" type="text" class="validate" value="{{$student[0]->class_name}}" disabled>
			          <label for="admission_student_id">Class</label>
					</div>
					<div class="input-field col s6">
					  <input id="section" type="text" class="validate" value="{{$student[0]->section_name}}" disabled>
			          <label for="section">Section</label>
					</div>
			  	</div>
			  	<div class="col s8">
			  		<div class="input-field col s6">
			          <input id="time" type="text" class="validate" value="{{Carbon\Carbon::parse($student[0]->timefrom)->format('h:i A')}} - {{Carbon\Carbon::parse($student[0]->timeto)->format('h:i A')}}" disabled>
			          <label for="time">Time</label>
					</div>
					<div class="input-field col s6">
					  <input id="room" type="text" class="validate" value="{{$student[0]->room}}" disabled>
			          <label for="room">Room</label>
					</div>
			  	</div>
			<div class="col s4">
				<div class="input-field col s12">
	          <input id="admission_first_name" name="first_name" type="text" class="validate" value="{{$student[0]->firstname}}" disabled>
	          <label for="admission_first_name">First Name</label>
			</div>
			</div>
			<div class="col s4">
				<div class="input-field col s12">
	          <input id="admission_middle_name" name="middle_name" type="text" class="validate" value="{{$student[0]->middlename}}" disabled>
	          <label for="admission_middle_name">Middle Name</label>
			</div>
			</div>
			<div class="col s4">
				<div class="input-field col s12">
	          <input id="admission_last_name" name="last_name" type="text" class="validate" value="{{$student[0]->lastname}}" disabled>
	          <label for="admission_last_name">Last Name</label>
			</div>
			</div>



			<div class="col s12">
		      <ul class="tabs">
		        <li class="tab col s3"><a class="active" href="#about">About</a></li>
		        <li class="tab col s3"><a href="#admission">Admission</a></li>
		      </ul>

		      <div id="about" class="col s12 tab-content">
		    	@include('pages.student.about-details')
		    </div>
		    <div id="admission" class="col s12 tab-content">
		    	<div class="col s12">
		    		<table class="bordered highlight">
						<thead>
						  <tr>
						      <th>Date</th>
						      <th>Class</th>
						      <th>Section</th>
						      <th>Status</th>
						  </tr>
						</thead>

						<tbody>
							@foreach ($admissions as $admission)
							<tr class="data-row row-" data-id="" onclick="">
								<td>{{Carbon\Carbon::parse($admission->date)->format('M d, Y')}}</td>
								<td>{{$admission->class_name}}</td>
								<td>{{$admission->section_name}}</td>
								<td>{{$admission->status}}</td>
						  </tr>
							@endforeach
						</tbody>
					</table>
		    	</div>
		    </div>
		    </div>



			          

	</div>
</div>

@include('action-menu.menu',array( 'menus'=> ['print','edit' ]) )
@endif