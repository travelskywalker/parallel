<div class="row error-container">
	<div class="col s12 error-message"></div>
	<div class="col s12 error-data"></div>
</div>

<form id="add_image_form" style="display: none">
<input id="image_upload" container="image_container" form-input="image" name="image" fdata="add_image_form" api="/temp/imageupload" type="file" accept="image/*">
</form>

<form id="admission_form">
	<input type="hidden" name="image" id="image" value="files/images/default/nophoto.jpeg">
	
</form>