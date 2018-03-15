@if($fullpage)
	@include('pages.classes.index')
@else

	<div class="row s12">
		<div class="col s2">
			<img width="100" height="100" class="materialboxed" src="/{{$class[0]->school_logo}}">
		</div>
		<div>
			<h4>  {{$class[0]->school_name}}</h4>
				@if($class[0]->schooltitle1) <p>{{$class[0]->schooltitle1}}</p> @endif
		  		@if($class[0]->schooltitle2) <p>{{$class[0]->schooltitle2}}</p> @endif
		</div>
	</div>

	<div class="row s12">
		<h4>{{$class[0]->name}}</h4>
		<h5>Teacher: {{$class[0]->firstname}} {{$class[0]->lastname}}</h5>
		@if($class[0]->description) <div>{{$class[0]->description}}</div> @endif
		@if($class[0]->notes) <div><b>Notes:</b> {{$class[0]->description}}</div> @endif
	</div> 

	<div class="row s12">
		<ul class="tabs">
	        <li class="tab col s3"><a class="active" href="#section">Sections</a></li>
	        <li class="tab col s3"><a href="#student">Students</a></li>
	    </ul>

	    <div id="section" class="col s12 tab-content">
	    	@include('pages.classes.sections')
	    </div>
	    <div id="student" class="col s12 tab-content">
	    	@include('pages.classes.students')
	    </div>
	</div>

	@include('action-menu.menu',array( 'menus'=> ['print','edit' ]) )
@endif