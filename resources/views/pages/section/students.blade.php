@if(count($students) > 0)
	<table class="bordered highlight">
		<thead>
		  <tr>
		  	<th>Student Number</th>
		  	<th>Name</th>
		  	<th>Gender</th>
		  	<th>Status</th>
		  </tr>
		</thead>

		<tbody>

			@foreach ($students as $student)
			<tr class="data-row" onclick="showDetails('student',{{$student->id}})">
		    <td>{{$student->studentnumber}}</td>
		    <td>{{$student->lastname}}, {{$student->firstname}}</td>
		    <td>{{$student->gender}}</td>
		    <td>{{$student->status}}</td>
		  </tr>
			@endforeach
		</tbody>
	</table>
@else
	
	<div class="col s12" >No enrolled student. Click <a href="/admission/new">here</a> for new admission.</div>
@endif