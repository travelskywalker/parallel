@if($fullpage)
	@include('pages.section.index')
@else
<h5>Sections</h5>
	@if(count($sections) > 0)
		<table class="bordered highlight">
			<thead>
			  <tr>
			  	  @if(Auth::user()->access_id == 0)<th>School</th>@endif
			      <th>Section</th>
			      <th>Class</th>
			      <th>Teacher</th>
			      <th>Time From</th>
			      <th>Time To</th>
			      <th>Room</th>
			      <th>Students</th>
			      <th>Limit</th>
			      
			  </tr>
			</thead>

			<tbody>

				@foreach ($sections as $section)
				<tr class="data-row" onclick="showDetails('section',{{$section->id}})">
				@if(Auth::user()->access_id == 0)<td>{{$section->school_name}}</td>@endif
			    <td>{{$section->name}}</td>
			    <td>{{$section->class_name}}</td>
			    <td>{{$section->teacher_firstname}} {{$section->teacher_lastname}}</td>
			    <td>{{$section->timefrom}}</td>
			    <td>{{$section->timeto}}</td>
			    <td>{{$section->room}}</td>
			    <td>{{$section->student_count}}</td>
			    <td>{{$section->studentlimit}}</td>
			    
			  </tr>
				@endforeach
			</tbody>
		</table>

		@include('action-menu.menu',array( 'menus'=> ['print','add' ]) )
	@else
		No record in the database. Click <a href="/section/add">here</a> to add.
	@endif
@endif