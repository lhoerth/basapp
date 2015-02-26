document.getElementById('buttons').style.display = 'block';

var main = function() {
    document.getElementById('ss').style.display = 'none';
    document.getElementById('nn').style.display = 'none';
    document.getElementById('uu').style.display = 'none';
    document.getElementById('buttons').style.display = 'none';
	
	// if they go back to this page, PHP will tick the radio button based on session,
	// and we can just use this yesnoCheck() function to populate the form correctly.
	yesnoCheck(); 
}

function yesnoCheck() {
	console.log("yesnoCheck()");
    if (document.getElementById('softwareBtn').checked) {
        document.getElementById('ss').style.display = 'block';
         document.getElementById('nn').style.display = 'none';
           document.getElementById('uu').style.display = 'none';
    
    }
    else if ((document.getElementById('networkBtn').checked)) {
     document.getElementById('ss').style.display = 'none';
         document.getElementById('nn').style.display = 'block';
           document.getElementById('uu').style.display = 'none';
    }
    else if ((document.getElementById('udBtn').checked)) {
     document.getElementById('ss').style.display = 'none';
         document.getElementById('nn').style.display = 'none';
           document.getElementById('uu').style.display = 'block';
    }
    
    document.getElementById('buttons').style.display = 'block';
   
}

$(document).ready(main);