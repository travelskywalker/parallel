@if(count($classes) > 0)
	<table class="bordered highlight">
		<thead>
		  <tr>
		  	<th>Name</th>
		  	<th>Sections</th>
		    <th>Students</th>
		    <th>Male</th>
		    <th>Female</th>
		  </tr>
		</thead>

		<tbody>

			@foreach ($classes as $class)
			<tr class="data-row" onclick="showDetails('classes',{{$class->id}})">
		    <td>{{$class->name}}</td>
		    <td>{{$class->section_count}}</td>
			<td>{{$class->student_count}}</td>
			<td>{{$class->male_count}}</td>
			<td>{{$class->female_count}}</td>
		  </tr>
			@endforeach
		</tbody>
	</table>

@else
	
	<div class="col s12" >No record available. click <a href="/classes/add">here</a> to add.</div>
@endif