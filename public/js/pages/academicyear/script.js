$('.add-ay').click(function(){
	openAddModal('/academicyears/add', 'academicyears');

	// initialize function
	init();
});

function init(){

	$('#academic_year').focusout(function(){
	});

	$('select#status').change(function(){
	});

}

function toggleAcademicStatus(){
	// prompt("Please enter your name", "Harry Potter");
}