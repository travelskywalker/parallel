@if($fullpage)
	@include('pages.admission.index')
@else
<h5>Admissions</h5>
<div class="text-right col s3 offset-s9">
	@include('components.filter.academicyear')
</div>

<div id="page_data">
	@include('pages.admission.admissions-data')
</div>

	@include('action-menu.menu',array( 'menus'=> ['print','add' ]) )
@endif
