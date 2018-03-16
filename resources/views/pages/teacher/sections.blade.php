
@if(count($sections) > 0)
	<table class="bordered highlight">
		<thead>
		  <tr>
		  	<th>Section</th>
		  	<th>Time</th>
		  	<th>Room</th>
		  </tr>
		</thead>

		<tbody>

			@foreach ($sections as $section)
			<tr class="data-row" onclick="showDetails('section',{{$section->id}})">
		    <td>{{$section->name}}</td>
		    <td>{{Carbon\Carbon::parse($section->timefrom)->format('h:i A')}} - {{Carbon\Carbon::parse($section->timeto)->format('h:i A')}}</td>
		    <td>{{$section->room}}</td>
		  </tr>
			@endforeach
		</tbody>
	</table>

@else
	
	<div class="col s12" >No section available. click <a href="/section/add">here</a> to add.</div>
@endif