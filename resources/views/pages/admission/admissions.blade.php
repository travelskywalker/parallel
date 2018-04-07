@if($fullpage)
	@include('pages.admission.index')
@else
<h5>Admissions</h5>
<div class="text-right col s3 offset-s9">
	<label>Academic Year</label>
	<select id="ay_filter" class="browser-default" >
		@foreach($academicyears as $academicyear)
	    	<option value="{{$academicyear->id}}" @if($academicyear_id == $academicyear->id) selected @endif>{{Carbon\Carbon::parse($academicyear->from)->format('Y')}} - {{Carbon\Carbon::parse($academicyear->to)->format('Y')}}</option>
	    @endforeach
	  </select>
</div>

<div id="page_data">
	@include('pages.admission.admissions-data')
</div>

	@include('action-menu.menu',array( 'menus'=> ['print','add' ]) )
@endif
