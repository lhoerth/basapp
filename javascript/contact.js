var newStudent = false;
    var $currentStudent = $('#sid');
    var $fields = $('.show');
    var $sidLengthSpan = $('#sid-length');
    var $sid = $('#studentId');
    var $sidLength = $('#sid-length');
    
    $fields.addClass('hidden');
    $currentStudent.addClass('hidden');


        
        $('input[name="student"]').on('click', function(){
		if ($('input:checked').val() == "cs"){
                        showAll();
			$sid.val("");
			
		}
		else if($('input:checked').val() == "ns"){
                        show();
			$currentStudent.fadeOut(400).addClass('hidden');
			
		}
	});
        
        function showAll() {
            $fields.fadeIn(400).removeClass('hidden');
	    $currentStudent.fadeIn(400).removeClass('hidden');
        }
        
        function show(){
            $fields.fadeIn(400).removeClass('hidden');
        }
        