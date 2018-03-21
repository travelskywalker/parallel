loadIndex();

function init(){
	image_upload_init();

	$('#licensenumber').focusout(function(){
		checkLicenseNumber();
	});

	$('#teachernumber').focusout(function(){
		checkTeacherNumber();
	});

	$('select#school_id').change(function(){
		checkTeacherNumber();
		checkLicenseNumber();
	})
}

function checkTeacherNumber(){
	var url = '/s/teacher/'+$('#teacher_id').val()+'/'+$('#teachernumber').val()+'/'+$('#school_id').val()+'/findteachernumber';
	var _self = $('#teachernumber');

	if($('#teachernumber').val() == null || $('#teachernumber').val() == '') return;

	sendAPI('GET', url).then(function(response){

		if(response == true){
			// no admission in database
			$(_self).removeClass('valid').addClass('invalid');
			showToast(language.teachernumberexist);
		}else{

		}
	});
}

function checkLicenseNumber(){
	var url = '/s/teacher/'+$('#teacher_id').val()+'/'+$('#licensenumber').val()+'/findlicense';
	var _self = $('#licensenumber');

	if($('#licensenumber').val() == null || $('#licensenumber').val() == '') return;

	sendAPI('GET', url).then(function(response){

		if(response == true){
			// no admission in database
			$(_self).removeClass('valid').addClass('invalid');
			showToast(language.licensenumberexist);
		}else{

		}
	});
}