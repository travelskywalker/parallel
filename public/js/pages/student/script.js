loadIndex();

function init(){
	image_upload_init();

	
	$('#student_number').focusout(function(){
		console.log('init')
		var _self=this;
		var studentid = $('#student_id').html();

		if($(this).val() == '') return 

		var url = '/api/student/'+$(this).val()+'/'+$('#student_school_id').val();

		sendAPI('GET', url).then(function(response){

			console.log(response.data[0].id);

			if(response.data.length > 0){
				if(response.data[0].id != studentid){
					$(_self).removeClass('valid').addClass('invalid');
					showToast(language.studentnumexist);
				}
			}
			
		});
	});
}
