    function validateForm()
    {
        var a=document.forms["mockupbas"]["fname"].value;
        if (a == "" || a == null)
        {
            alert("You must enter a first name");
            return false;
        }
        
        var b=document.forms["mockupbas"]["lname"].value;
        if (b == "" || b == null)
        {
            alert("You must enter a last name");
            return false;
        }
        
        var c=document.forms["mockupbas"]["sid"].value;
        
        if(newStudent == false) {
            if(c.length != 9)
            {
                alert("This is not a valid SID");
                return false;
            }
        }
        
        var d=document.forms["mockupbas"]["email"].value;
        var atpos = d.indexOf("@");
        var dospos = d.lastIndexOf(".");
        if (d != "" || d != null)
        {
           if (atpos < 1 || dotpos < atpos + 2 || dotpos + 2 > d.length)
            {
                alert("This is not a valid email");
                return false;
            } 
        }
        
        var e=document.forms["mockupbas"]["software"];
        if (document.getElementById('software').checked)
        {
            var sDiv=document.createElement('div');
            
            
        }
        
        else if (document.getElementById('network').checked)
        {
            network.append();
        }
        
        else if (document.getElementById('ud').checked)
        {
            ud.append();
        }
        
        var f=document.forms["mockupbas"]["email"].value;
        if (document.getElementById('verify').unchecked)
        {
            alert("You must verify that your information is correct");
            return false;
        }
        return true;
    }
    
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
        
        $("#continue").onclick(function()
            {
              $("#new_div").append();
            });