var $fields = $('.show');
var $currentStudent = $('#sid');
var $sid = $('#studentId');

$fields.addClass('hidden');
$currentStudent.addClass('hidden');
	
$('input[name="student"]').on('click', function(){
	if ($('input:checked').val() == "cs"){
		$fields.fadeIn(400).removeClass('hidden');
		$currentStudent.fadeIn(400).removeClass('hidden');
		$sid.val("");		
	}
	else if($('input:checked').val() == "ns"){
		$fields.fadeIn(400).removeClass('hidden');
		$currentStudent.fadeOut(400).addClass('hidden');		
	}
});