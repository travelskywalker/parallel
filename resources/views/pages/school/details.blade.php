@if($fullpage)
	@include('pages.school.index')
@else



		<div class="row s12">
	      <div class="col s12 ">
	        <div class="card-panel detail-card">
	          <table>
	          	<tr>
	          		<td colspan="2" style="text-align: left">
						<div class="col s2">
							<img width="100" height="100" class="materialboxed" src="/{{$school->logo}}">
						</div>
						<div class="col s10">
							<h4>  {{$school->name}}</h4>
								@if($school->title1) <p>{{$school->title1}}</p> @endif
						  		@if($school->title2) <p>{{$school->title2}}</p> @endif
						</div>
	          		</td>
	          	</tr>
	          	<tr>
	          		<td>Administrator <i class="material-icons small">person</i></td>
	          		<td>{{$school->admin}}</td>
	          	</tr>
	          	<tr>
	          		<td>Email <i class="material-icons small">email</i></td>
	          		<td>{{$school->email}}</td>
	          	</tr>
	          	<tr>
	          		<td>Phone Number <i class="material-icons small">phone</i></td>
	          		<td>{{$school->phonenumber}}</td>
	          	</tr>
	          	<tr>
	          		<td>Mobile Number <i class="material-icons small">phone_iphone</i></td>
	          		<td>{{$school->mobilenumber}}</td>
	          	</tr>
	          	<tr>
	          		<td>Address <i class="material-icons small">location_on</i></td>
	          		<td>{{$school->address}}</td>
	          	</tr>
	          	<tr>
	          		<td>City<i class="material-icons small">location_city</i></td>
	          		<td>{{$school->city}}</td>
	          	</tr>

	          	@if(Auth::user()->access_id <= 2)
	          	<tr>
	          		<td>Notes <i class="material-icons small">note</i></td>
	          		<td>{{$school->notes}}</td>
	          	</tr>
	          	<tr>
	          		<td>Description <i class="material-icons small">description</i></td>
	          		<td>{{$school->description}}</td>
	          	</tr>
	          	@endif

	          </table>
	        </div>
	      </div>
	    </div>

		<div class="row s12">
			<div class="col s4">
				<div class="detail-card card hoverable s12">
					<div class="card-content">
						<span class="card-title">Students: {{count($students)}}</span>

						@if(count($students)<=0)
							<div>no student in record yet.</div>
							click <a href="/admission/new">here</a> for new admission.
						@else

							<ul class="collection staggered">
								@foreach ($students->slice(0,3) as $student)
								<li class="collection-item">{{$student->firstname}} {{$student->lastname}}</li>
								@endforeach
							</ul>

							@if(count($students) > 3)
								<a class="right" href="/student">see all</a>
							@else
								<a href="/admission/new" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-tooltip="new admission"><i class="material-icons">add</i></a>
							@endif
						@endif
					</div>


					
				</div>
			</div>
			<div class="col s4">
				<div class="detail-card card hoverable s12 ">
					<div class="card-content">
						<span class="card-title">Classes : {{count($classes)}}</span>

						@if(count($classes) <=0)
							<div>no class in record yet.</div>
							click <a href="/classes/add">here</a> to add
						@else

							<ul class="collection staggered">
								@foreach ($classes->slice(0,3) as $class)
								<li class="collection-item">{{$class->name}}</li>
								@endforeach
							</ul>

							@if(count($classes) > 3)
							<a class="right" href="/school/classes/{{$school->id}}">see all</a>
							@else
								<a href="/classes/add" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-tooltip="add class"><i class="material-icons">add</i></a>
							@endif
						@endif
					</div>
					
				</div>
			</div>

			<div class="col s4">
				<div class="detail-card card hoverable s12">
					<div class="card-content">
						<span class="card-title">Sections: {{count($sections)}}</span>
						@if(count($sections) <=0)
							<div>no section in record yet.</div>
							click <a href="/section/add">here</a> to add
						@else

							<ul class="collection staggered">
								@foreach ($sections->slice(0,3) as $section)
								<li class="collection-item">{{$section->name}}</li>
								@endforeach
							</ul>

							@if(count($sections) > 3)
								<a class="right" href="/school/section/{{$school->id}}">see all</a>
							@else
								<a href="/section/add" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-tooltip="add section"><i class="material-icons">add</i></a>
							@endif
						@endif
					</div>
					
				</div>
			</div>

			<div class="col s4">
				<div class="detail-card card hoverable s12">
					<div class="card-content">
						<span class="card-title">Teachers: {{count($teachers)}}</span>

						@if(count($teachers) <=0)
							<div>no teacher in record yet.</div>
							click <a href="/teacher/add">here</a> to add
						@else
			            	<ul class="collection staggered">
								@foreach ($teachers->slice(0,3) as $teacher)
								<li class="collection-item">{{$teacher->firstname}} {{$teacher->lastname}}</li>
								@endforeach
							</ul>

							@if(count($teachers) > 3)
								<a class="right" href="/teacher">see all</a>
							@else
								<a href="/teacher/add" class="btn-floating halfway-fab waves-effect waves-light tooltipped" data-tooltip="add teacher"><i class="material-icons">add</i></a>
							@endif
						@endif
					</div>
					
				</div>
			</div>

			
		</div>

	@include('action-menu.menu',array( 'menus'=> ['print','edit' ]) )

@endif