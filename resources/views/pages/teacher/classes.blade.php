@if(count($classes) > 0)
	<table class="bordered highlight">
		<thead>
		  <tr>
		  	<th>Name</th>
		  	<th>Notes</th>
		  	<th>Description</th>
		  </tr>
		</thead>

		<tbody>

			@foreach ($classes as $class)
			<tr class="data-row" onclick="showDetails('classes',{{$class->id}})">
		    <td>{{$class->name}}</td>
		    <td>{{$class->notes}}</td>
		    <td>{{$class->description}}</td>
		  </tr>
			@endforeach
		</tbody>
	</table>

@else
	
	<div class="col s12" >No record available. click <a href="/classes/add">here</a> to add.</div>
@endif