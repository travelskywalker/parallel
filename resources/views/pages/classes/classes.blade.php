@if($fullpage)
	@include('pages.classes.index')
@else
<h5 >Classes</h5>
	@if(count($classes) >0)
		<table class="bordered highlight">
			<thead>
			  <tr>
			      @if(Auth::user()->access_id == 0)<th>School</th>@endif
			      <th>Class</th>
			      <th>Teacher</th>
			      <th>Sections</th>
			      <th>Students</th>
			      <th>Male</th>
			      <th>Female</th>
			  </tr>
			</thead>

			<tbody>

				@foreach ($classes as $class)
				<tr class="data-row" onclick="showDetails('classes',{{$class->id}})">
			    @if(Auth::user()->access_id == 0)<td>{{$class->school_name}}</td>@endif
			    <td>{{$class->name}}</td>
			    <td>{{$class->firstname}} {{$class->lastname}}</td>
			    <td>{{$class->section_count}}</td>
			    <td>{{$class->student_count}}</td>
			    <td>{{$class->female_count}}</td>
			    <td>{{$class->male_count}}</td>
			  </tr>
				@endforeach
			</tbody>
		</table>

		@include('action-menu.menu',array( 'menus'=> ['print','add' ]) )
		
	@else
		No record in the database. Click <a href="/classes/add">here</a> to add.
	@endif
@endif