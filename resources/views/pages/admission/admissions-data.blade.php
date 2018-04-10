
@if(count($admissions) > 0)
		
	<table class="bordered highlight">
		<thead>
		  <tr>
		  	@if(Auth::user()->access_id == 0)<th>School</th>@endif
		  	<th>Date</th>
		  	<th>Name</th>
		     <th>Status</th>
		     <th>Academic Year</th>
		  </tr>
		</thead>

		<tbody>

			@foreach ($admissions as $admission)
			<tr class="data-row" onclick="showDetails('admission',{{$admission->id}})">
		    @if(Auth::user()->access_id == 0)<td>{{$admission->school_name}}</td>@endif
		    <td>{{Carbon\Carbon::parse($admission->date)->format('M d, Y')}}</td>
		    <td>{{$admission->firstname}} {{$admission->lastname}}</td>
		    <td>{{$admission->status}}</td>
		    <td>@if($admission->academicyear_id != null) {{Carbon\Carbon::parse($admission->from)->format('Y')}} - {{Carbon\Carbon::parse($admission->to)->format('Y')}} @endif</td>
		  </tr>
			@endforeach
		</tbody>
	</table>
	
@else
	No record in the database. Click <a href="/admission/new">here</a> for new admission.
@endif

