@if($fullpage)
	@include('pages.section.index')
@else
	
	<div class="row s12">
		<div class="col s2">
			<img width="100" height="100" class="materialboxed" src="/{{$section[0]->school_logo}}">
		</div>
		<div>
			<h4>  {{$section[0]->school_name}}</h4>
				@if($section[0]->schooltitle1) <p>{{$section[0]->schooltitle1}}</p> @endif
		  		@if($section[0]->schooltitle2) <p>{{$section[0]->schooltitle2}}</p> @endif
		</div>
	</div>

	<div class="row s12">
		<h5>{{$section[0]->class_name}}</h5>

		<h4>{{$section[0]->name}}</h4>

		<div class="col s4">
			<h5>Teacher: {{$section[0]->firstname}} {{$section[0]->lastname}}</h5>
		</div>
		<div class="col s4">
			<h5>Time: {{Carbon\Carbon::parse($section[0]->timefrom)->format('h:i A')}} - {{Carbon\Carbon::parse($section[0]->timeto)->format('h:i A')}}</h5>
		</div>
		<div class="col s4 right">
			<h5>Room: {{$section[0]->room}}</h5>
		</div>

		<div class="col s12">
			@if($section[0]->description) <div>{{$section[0]->description}}</div> @endif
			@if($section[0]->notes) <div><b>Notes:</b> {{$section[0]->description}}</div> @endif
		</div>
	</div> 

	<div class="row s12">
		<ul class="tabs">
	        <li class="tab col s3"><a href="#student">Students</a></li>
	    </ul>

	    <div id="student" class="col s12 tab-content">
	    	@include('pages.section.students')
	    </div>
	</div>



	@include('action-menu.menu',array( 'menus'=> ['print','edit' ]) )
@endif