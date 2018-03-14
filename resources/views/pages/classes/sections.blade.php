<table class="bordered highlight">
	<thead>
	  <tr>
	  	<th>Section</th>
	  	<th>Time</th>
	  	<th>Teacher</th>
	  	<th>Room</th>
	  </tr>
	</thead>

	<tbody>

		@foreach ($sections as $section)
		<tr class="data-row" onclick="showDetails('section',{{$section->id}})">
	    <td>{{$section->name}}</td>
	    <td>{{Carbon\Carbon::parse($section->timefrom)->format('h:i A')}} - {{Carbon\Carbon::parse($section->timeto)->format('h:i A')}}</td>
	    <td>{{$section->firstname}} {{$section->lastname}}</td>
	    <td>{{$section->room}}</td>
	  </tr>
		@endforeach
	</tbody>
</table>
