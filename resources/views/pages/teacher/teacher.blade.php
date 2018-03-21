@if($fullpage)
	@include('pages.teacher.index')
@else

<div class="row">
  <div class="col s12">
    <div class="card hoverable teacher-card">
    	<div class="card-content">
	    	<div class="row s12">
		      <div class="col s4">
		      	<div class="image-container" style="background: url('/{{$teacher->image}}')"></div>
		      </div>
		      <span class="activator"><i class="material-icons right">more_vert</i></span>
		      <div class="col s8">

		      	<div class="col s12 name">
		      		<h3 class="firstname">{{$teacher->firstname}}</h3>
		      		<h2 class="lastname">{{$teacher->lastname}}</h2>
		      	</div>
		      	<div class="col s12">
		      		Teacher Number: {{$teacher->teachernumber}}
		      	</div>
		      	<div class="col s12">
		      		License: {{$teacher->licensenumber}}
		      	</div>
		      </div>
		  	</div>
		 </div>

		 <div class="card-reveal">
	      <i class="material-icons right card-title">close</i>

	      	<div class="row s12">
	      		<div class="col s12">
	      			<span class="card-title">Notes</span>
	      			<p>{{$teacher->notes}}</p>
	      		</div>
	      		<div class="col s12">
	      			<span class="card-title">Description</span>
	      			<p>{{$teacher->description}}</p>
	      		</div>
	      	</div>
	    </div>

      </div>
    </div>
  </div>
</div>

<div class="card hoverable">
    <div class="card-tabs">
      <ul class="tabs tabs-fixed-width">
        <li class="tab col s3"><a href="#classes">Classes</a></li>
	    <li class="tab col s3"><a href="#sections">Sections</a></li>
      </ul>
    </div>
    <div class="card-content grey lighten-4">
      <div id="classes" class="tab-content">
	    	@include('pages.teacher.classes')
	    </div>
	    <div id="sections" class="tab-content">
	    	@include('pages.teacher.sections')
	    </div>
    </div>
  </div>
    

    	@include('action-menu.menu',array( 'menus'=> ['print','edit' ]) )

@endif