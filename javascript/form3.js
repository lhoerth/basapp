var $soft= $('#software');
var $net= $('#network');
var $none= $('#uu');

$soft.addClass('hidden');
$net.addClass('hidden');
$none.addClass('hidden');

$('input[name="degree"]').on('click', function(){
		if ($('input:checked').val() == "software"){
                        show();
		    alert("beep");
		}
		else if($('input:checked').val() == "network"){
                        show();
			
		}else if($('input:checked').val() == "ud"){
                   show();
                }
	});

function show(){
    $('#software').removeClass('hidden');
    
}