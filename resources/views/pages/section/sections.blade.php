@if($fullpage)
	@include('pages.section.index')
@else
<h5>Sections</h5>
<div class="text-right col s3 offset-s9">
	@include('components.filter.academicyear')
</div>

<div id="page_data">
	@include('pages.section.sections-data')
</div>

	@include('action-menu.menu',array( 'menus'=> ['print','add' ]) )
	
@endif