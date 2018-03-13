@if($fullpage)
	@include('pages.classes.index')
@else

	<div class="row s12">
		<div class="col s2">
			<img width="100" height="100" class="materialboxed" src="/{{$school->logo}}">
		</div>
		<div>
			<h4>  {{$school->name}}</h4>
				@if($school->title1) <p>{{$school->title1}}</p> @endif
		  		@if($school->title2) <p>{{$school->title2}}</p> @endif
		</div>
	</div>

	<div class="row s12">
		<h4>{{$class->name}}</h4>
		@if($class->description) <div>{{$class->description}}</div> @endif
		@if($class->notes) <div><b>Notes:</b> {{$class->description}}</div> @endif
	</div> 

	<div class="row s12">
		<ul class="tabs">
	        <li class="tab col s3"><a class="active" href="#section">Sections</a></li>
	        <li class="tab col s3"><a href="#student">Students</a></li>
	        <li class="tab col s3"><a href="#teacher">Teacher</a></li>
	    </ul>

	    <div id="section" class="col s12">
	    	@include('pages.classes.sections')
	    </div>
	    <div id="student" class="col s12">
	    	@include('pages.classes.students')
	    </div>
	</div>

	@include('action-menu.menu',array( 'menus'=> ['print','edit' ]) )
@endif