@if($fullpage)
	@include('pages.admin.index')
@else

<h5>Academic Year</h5>
<!-- check if there is active academic year -->
@if(count($activeAY) == 0 && count($academicyears) > 0)
	<div class="row s12">
		{{ __('messages.hasnoactiveAY') }}
	</div>
@endif
	@if(count($academicyears) <= 0)
		There is no open academic year yet. click the + button in the bottom right corner to open a new academic year.
	@else

		<table class="bordered highlight">
			<thead>
			  <tr>
			      <th>Academic Year</th>
			      <th>Duration</th>
			      <th>Status</th>
			  </tr>
			</thead>

			<tbody>
				@foreach ($academicyears as $academicyear)
				<tr class="data-row" onclick="">
			    <td>{{Carbon\Carbon::parse($academicyear->from)->format('Y')}} - {{Carbon\Carbon::parse($academicyear->to)->format('Y')}}</td>
			    <td>{{Carbon\Carbon::parse($academicyear->from)->format('M d, Y')}} - {{Carbon\Carbon::parse($academicyear->to)->format('M d, Y')}}</td>
			    <td>{{$academicyear->status}}</td>
			    <td width="40"><i class="material-icons data-edit-btn" title="edit" onclick="openEditModal('/academicyear/edit/{{$academicyear->id}}', 'academicyears')">edit</i></td>
			  </tr>
				@endforeach
			</tbody>
		</table>
	@endif

	<div class="fixed-action-btn horizontal" >
		<a class="btn-floating btn-large waves-effect btn-menu add-ay" title="add academic year">
		  <i class="large material-icons">add</i>
		</a>
	</div>


  <script src="/js/pages/academicyear/script.js"></script>
@endif