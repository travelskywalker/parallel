<label>Academic Year</label>
<select id="ay_filter" class="browser-default" >
	@foreach($academicyears as $academicyear)
    	<option value="{{$academicyear->id}}" @if($academicyear_id == $academicyear->id) selected @endif>{{Carbon\Carbon::parse($academicyear->from)->format('Y')}} - {{Carbon\Carbon::parse($academicyear->to)->format('Y')}}</option>
    @endforeach
  </select>